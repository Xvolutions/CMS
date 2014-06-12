var selected = new Array();
var name = 'undefined';
function SelectForRemoval(id) {
    if (document.getElementById(id).checked) {
        selected.push(id);
    } else {
        var tmp = selected.indexOf(id);
        selected.splice(tmp, 1);
    }
    if (name === 'undefined') {
        name = document.getElementById('RemoveMany').name;
    }

    document.getElementById('RemoveMany').name = name + '/' + (JSON.stringify(selected));
}