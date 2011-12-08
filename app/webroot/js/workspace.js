$(document).ready(function() {
    $(".workspace-tools .tool").draggable({ 
        revert: "invalid",
        helper: "clone",
        cursorAt: { cursor: "move", top: 150, left: 70 },
        snap: false
    });

    $(".workspace-content").droppable({
        accept: function(d) {
            if(d.hasClass("tool") || d.hasClass("item"))
                return true;
        },
        activeClass: "dropping",
        hoverClass: "dropping",
        drop: function(event, ui) {
            if($(ui.draggable).clone().hasClass("tool")) {
                $(this).append($(ui.draggable).clone());
                $(".workspace-content .tool").addClass("item");
                $(".item").removeClass("ui-draggable tool");
                $(".item").draggable({
                    revert: 'invalid',
                    cursorAt: { cursor: "move", top: 70, left: 70 } 
                });
            }
        }
    });
        //create a draggable post
        //only droppable in workspace
});
