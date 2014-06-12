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
            success: function()
            {
                $("."+tr).fadeOut(
                        'slow', 
                        function()
                            {
                                $("."+tr).remove();
                            }
                );
            }
        }
        );
    }
    );
}
);