$(document).ready(function()
{
    $('#xvolutions_adminbundle_page_title').keyup(function() {
        var title = $('#xvolutions_adminbundle_page_title').val();
        title = title.replace(/ /g, "-");

        var charMap = {
            à: 'a', è: 'e', é: 'e', ä: 'a', ë: 'e', ö: 'o', â: 'a', À: 'A', É: 'E', È: 'E', í: 'i', Í: 'I'
        };
        var str_array = title.split('');
        for (var i = 0, len = str_array.length; i < len; i++) {
            str_array[ i ] = charMap[ str_array[ i ] ] || str_array[ i ];
        }
        ;
        title=str_array.join('');

        var url = '/' + title.toLowerCase() + '/';

        $('#xvolutions_adminbundle_page_url').val(url);
    });
});