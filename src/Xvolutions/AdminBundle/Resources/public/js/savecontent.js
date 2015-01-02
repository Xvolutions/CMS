$(document).ready(function()
{
    $('a.btn.btn-info.btn-sm.save').click(function()
    {
        var url = $(this).attr('name');
        var inputs = document.getElementsByTagName("input");
        var textareas = document.getElementsByTagName("textarea");
        var selects = document.getElementsByTagName("select");
        var data = {};
        for (var i = 0; i < inputs.length; i++)
        {
            if(inputs[i].id.match('xvolutions_adminbundle_page_')) {
                data[inputs[i].id.replace('xvolutions_adminbundle_page_','')] = inputs[i].value;
            } else {
                data[inputs[i].id.replace('xvolutions_adminbundle_blogpost_','')] = inputs[i].value;
            }
        }
        for (var i = 0; i < textareas.length; i++)
        {
            if(textareas[i].id.match('xvolutions_adminbundle_page_')) {
                data[textareas[i].id.replace('xvolutions_adminbundle_page_','')] = tinyMCE.get(textareas[i].id).getContent();
            } else {
                data[textareas[i].id.replace('xvolutions_adminbundle_blogpost_','')] = tinyMCE.get(textareas[i].id).getContent();
            }
        }
        for (var i = 0; i < selects.length; i++)
        {
            if(selects[i].id.match('xvolutions_adminbundle_page_')) {
                data[selects[i].id.replace('xvolutions_adminbundle_page_','')] = selects[i].value;
            } else {
                data[selects[i].id.replace('xvolutions_adminbundle_blogpost_','')] = selects[i].value;
            }
        }
        $.ajax(
        {
            type: "POST",
            url: url,
            data: JSON.stringify(data),
            async: true,
            cache: false,
            success: function(data, result )
            {
                var text= result;
                $("#text").text(text);
                $("#status").fadeIn(
                        'slow',
                        function()
                        {
                            $("#status").css("display","block");
                            $("#status").delay(1500);
                            $("#status").fadeOut(
                                'slow',
                                function()
                                {
                                    $("#status").slideUp(1500);
                                }
                            );
                        }
                );
            },
            dataType: "json"
        }
        );
    }
    );
});
