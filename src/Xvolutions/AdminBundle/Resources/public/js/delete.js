$(document).ready(function()
{
    $('table td a.btn.btn-danger.btn-xs').click(function()
    {
        var url = $(this).attr('name');
        var tr = $(this).parent().parent().attr('class');
        $.ajax(
        {
            type: "DELETE",
            url: url,
            async: true,
            cache: false,
            success: function( result )
            {
                var text= result;
                $("#status").fadeIn(
                        'slow',
                        function()
                        {
                            $("#status").text(text);
                            $("#status").css("display","block");
                        }
                );
                $("."+tr).fadeOut(
                        'slow', 
                        function()
                            {
                                $("."+tr).remove();
                            }
                );
            },
            statusCode: {
                400: function( result ) {
                    var text= result;
                    $("#status").text(text);
                    $("#status").fadeIn(
                            'slow',
                            function()
                            {
                                $("#status").css("display","block");
                            }
                    );
                }
            }
        }
        );
    }
    );

    $('a.btn.btn-danger.btn-sm').click(function()
    {
        var url = $(this).attr('name');
        var tmp_tr = url.substring(url.indexOf("[")+1,url.indexOf("]"));
        var tmp_tr = tmp_tr.replace(/"/g,'');
        var tr = tmp_tr.split(",");
        $.ajax(
        {
            type: "DELETE",
            url: url,
            async: true,
            cache: false,
            success: function( result )
            {
                var text= result;
                $("#status").fadeIn(
                        'slow',
                        function()
                        {
                            $("#status").text(text);
                            $("#status").css("display","block");
                        }
                );
                for ( var i in tr) {
                    $(".tr"+tr[i]).fadeOut(
                        'slow', 
                        function()
                            {
                                $(".tr"+tr[i]).remove();
                            }
                    );
                }
                
            },
            statusCode: {
                400: function( result ) {
                    var text= result;
                    $("#status").text(text);
                    $("#status").fadeIn(
                            'slow',
                            function()
                            {
                                $("#status").css("display","block");
                            }
                    );
                }
            }
        }
        );
    }
    );
}
);