$(document).ready(function(){$(".title").keyup(function(){var f=$(".title").val();f=f.replace(/ /g,"-");f=f.toLowerCase();var d={á:"a",à:"a",ã:"a",â:"a",å:"a",ä:"a",æ:"a",ç:"c",ð:"d",é:"e",è:"e",ê:"e",ë:"e",í:"i",ì:"i",î:"i",ï:"i",ó:"o",ò:"o",õ:"o",ø:"o",ö:"o",ú:"u",ù:"u",û:"u",ü:"u",ñ:"n",ý:"y","&":"-","%":"-","$":"-","@":"-","!":"-",'"':"-","#":"-","?":"-","<":"-",">":"-","»":"-","«":"-","+":"-","*":"-","-":"-",":":"-",";":"-","|":"-","\\":"-","/":"-","'":"-","`":"-","^":"-","~":"-","º":"-","ª":"-"};var e=f.split("");for(var c=0,a=e.length;c<a;c++){e[c]=d[e[c]]||e[c]}f=e.join("");var b=f;$(".url").val(b)})});