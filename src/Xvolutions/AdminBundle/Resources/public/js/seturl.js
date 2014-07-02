$(document).ready(function()
{
    $('.title').keyup(function() {
        var title = $('.title').val();
        title = title.replace(/ /g, "-");
        title = title.toLowerCase();
        var charMap = {
            á: 'a',
            à: 'a',
            ã: 'a',
            â: 'a',
            å: 'a',
            ä: 'a',
            æ: 'a',
            ç: 'c',
            ð: 'd',
            é: 'e',
            è: 'e',
            ê: 'e',
            ë: 'e',
            í: 'i',
            ì: 'i',
            î: 'i',
            ï: 'i',
            ó: 'o',
            ò: 'o',
            õ: 'o',
            ø: 'o',
            ö: 'o',
            ú: 'u',
            ù: 'u',
            û: 'u',
            ü: 'u',
            ñ: 'n',
            ý: 'y'
        };
        var str_array = title.split('');
        for (var i = 0, len = str_array.length; i < len; i++) {
            str_array[ i ] = charMap[ str_array[ i ] ] || str_array[ i ];
        }
        ;
        title=str_array.join('');

        var url = '/' + title + '/';

        $('.url').val(url);
    });
});