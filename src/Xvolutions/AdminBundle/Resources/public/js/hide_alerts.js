$(document).ready(function()
{
    $('.alert').delay(2500);
    $('.alert').fadeOut(
        'slow',
        function()
        {
            $(".alert").css("display","none");
        }
    );
});