$(document).ready(function() {
    $( "#workspace-dialog" ).dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: {
            "Add": function() {
                var name = $('#workspace-dialog #name').val();
                if(name != null && name != '') {
                    $.post('/workspaces/add', {"data[Workspace][name]": name }, function(data) {
                        // append to list of workspaces
                        var newWorkspace = $('.workspaces li').first().clone();
                        $(".label", newWorkspace).html(name);
                        $(".workspace", newWorkspace).attr("href", "/workspaces/edit/"+data);
                        $('.add-workspace').parent().before(newWorkspace);
                        newWorkspace.show("drop", null, 400);
                    });
                }

                $( this ).dialog( "close" );
            },
            Cancel: function() {
                $( this ).dialog( "close" );
            }
        }
    });
    // add new workspace
    $('.add-workspace').click(function() {
        $( "#workspace-dialog" ).dialog('open');    
    });

});
