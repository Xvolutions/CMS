var selected=new Array();var name="undefined";function SelectForRemoval(b){if(document.getElementById(b).checked){selected.push(b)}else{var a=selected.indexOf(b);selected.splice(a,1)}if(name==="undefined"){name=document.getElementById("RemoveMany").name}document.getElementById("RemoveMany").name=name+"/"+(JSON.stringify(selected))};