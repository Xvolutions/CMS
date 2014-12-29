//var allTags = document.body.getElementsByTagName('xvolutions_adminbundle_*');
//var tmp = document.body.document.getElementsByTagName("input");
//var ids = [];
//for (var tg = 0; tg< allTags.length; tg++) {
//    var tag = allTags[tg];
//    if (tag.id) {
//        ids[tag.id] = document.getElementById(tag.id).value;
//     }
//}
//console.log(tmp);
//document.getElementById('save').name = document.getElementById('save').name + '/' + (JSON.stringify(ids));


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
            data[inputs[i].id.replace('xvolutions_adminbundle_page_','')] = inputs[i].value;
        }
        for (var i = 0; i < textareas.length; i++)
        {
            data[textareas[i].id.replace('xvolutions_adminbundle_page_','')] = textareas[i].value;
        }
        for (var i = 0; i < selects.length; i++)
        {
            data[selects[i].id.replace('xvolutions_adminbundle_page_','')] = selects[i].value;
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
