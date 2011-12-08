$(document).ready(function() {
    var workspaceId = $("#workspace-id").val();



    function initWorkspaceDrag(selector) {
        selector.draggable({
            revert: function(droppable) {
                if(droppable === false) {
                    // revert object
                    return true;
                }
                else {
                   // not reverting, update position
                   $.post("/stickyspaces/posts/update/"+$(this).attr('data-id'), {
                       "data[Post][position_x]": $(this).position().left, 
                       "data[Post][position_y]": $(this).position().top});

                   return false;
                }
            },
            cursor: "move",
            stack: ".item",
            cursorAt: { cursor: "move", top: 70, left: 70 }
        });
    }


    $(".workspace-tools .tool").draggable({ 
        revert: "invalid",
        helper: "clone",
        cursor: "move",
        cursorAt: { cursor: "move", top: 70, left: 70 },
        stack: ".tool"
    });

    $(".workspace-content").droppable({
        accept: function(d) {
            if(d.hasClass("tool") || d.hasClass("item"))
                return true;
        },
        activeClass: "dropping",
        hoverClass: "dropping",
        tolerance: "fit",
        drop: function(event, ui) {
            // new tool!
            if($(ui.helper).hasClass("tool")) {
                var posLeft = ui.helper.position().left - $(this).offset().left;
                var posTop = ui.helper.position().top - $(this).offset().top;

                $(this).append($(ui.helper).clone().
                    removeClass("ui-draggable-dragging").
                    css({"position": "absolute", "left": posLeft, "top": posTop }));

                // add to db!
                $.post("/stickyspaces/posts/add", 
                        { "data[Post][position_x]": posLeft, 
                          "data[Post][position_y]": posTop, 
                          "data[Post][user_id]": 1,
                          "data[Post][workspace_id]": workspaceId },
                        function(data) {
                            if(data == null || data == '') {
                                $('workspace-content .tool').removeAll();
                                return;
                            }

                            //initialize new item
                            $currentItem = $(".workspace-content .tool");

                            $currentItem.attr('data-id', data); 
                            $currentItem.addClass("item");
                            $currentItem.removeClass("ui-draggable tool");
                            initWorkspaceDrag($currentItem);
                        }
                );
            }
        }
    });

    // initialize trash droppable
    $(".workspace-tools .trash").droppable({
        accept: ".item",
        hoverClass: "dropping",
        drop: function(event, ui) {
            // delete item
            $(ui.draggable).effect("fold", {}, 400, function() {
                $.post("/stickyspaces/posts/remove/"+$(this).attr('data-id'), null, function(data) {
                    $(ui.draggable).remove();
                });
            });
        }
    });

    // initialize any prepopulated posts
    initWorkspaceDrag($(".workspace-content .item"));
});
