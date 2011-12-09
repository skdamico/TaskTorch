$(document).ready(function() {
    var workspaceId = $("#workspace-id").val();
    var timeout = 0;
    var optionsVisible = true;


    function limitChars($text, limit, $count) {
        var text = $text.val();
        var textlength = text.length;

        if(textlength > limit) {
            $text.val(text.substr(0,limit));
            $count.html($text.val().length + '/' + limit);
            return false;
        }
        else {
            $count.html($text.val().length + '/' + limit);
            return true;
        }
    }

    function initPost(selector) {
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
            cursorAt: { cursor: "move", top: 70, left: 70 },
            start: function(event, ui) {
                optionsVisible = false;
            },
            stop: function(event, ui) {
                optionsVisible = true;
            }
        });
        
        selector.hover(
            function() {
                if(timeout != 0) clearTimeout(timeout);
                
                var $post = this;
                timeout = setTimeout(function() {
                    timeout = 0;  
                    

                    if(optionsVisible) {
                        $('.options', $post).slideDown(200);
                    }
                },
                500);
            },
            function() {
                if(timeout != 0) clearTimeout(timeout);

                var $post = this;
                
                timeout = setTimeout(function() {
                    timeout = 0;
                    $(".options", $post).slideUp(200);
                },
                400);
            }
        );

        // initialize toolbar options
        $('.options #edit', selector).click(function() {
            // add input box to post-it
            // on blur, save
            var $this_element = $(this).parent().parent();
            var $content = $('.content .display', $this_element);

            var post_content = $content.html();
            $content.html("<textarea class='temp'></textarea>");
            var $tmp_ta = $('.temp', $content);
            $tmp_ta.val(post_content);

            $tmp_ta.keyup(function() {
                limitChars($tmp_ta, 140, $('.content .char-count', $this_element));
            });
            $tmp_ta.focus();

            $tmp_ta.blur(function() {
                var new_content = $(this).val();
                $.post("/stickyspaces/posts/update/"+$this_element.attr('data-id'), {
                    "data[Post][content]": new_content
                },
                function(data) {
                    $content.html(new_content);
                    $('.content .char-count', $this_element).html("");
                });
            });
        });

        $('.options #color', selector).click(function() {
            // allow user to pick and preview color for post
            // pick out of 6 to 8 colors
        });

        $('.options #delete', selector).click(function() {
            var $this_element = $(this).parent().parent();

            $.post("/stickyspaces/posts/remove/"+$this_element.attr('data-id'), null, function(data) {
                $this_element.effect("fold", {}, 500, function() { $this_element.remove(); });
            });
        });
    }

    // initialize any prepopulated posts
    initPost($(".workspace-content .item"));

    $(".workspace-tools .post").draggable({ 
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
            if(ui.helper.hasClass("tool")) {
                var posLeft = ui.helper.offset().left - $(this).offset().left;
                var posTop = ui.helper.offset().top - $(this).offset().top;

                $(this).append(ui.helper.clone().
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
                            initPost($currentItem);
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

});
