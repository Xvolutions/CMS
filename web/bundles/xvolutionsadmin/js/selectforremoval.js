var selected = new Array();
var url = 'undefined';
function SelectForRemoval(id) {
    if (document.getElementById(id).checked) {
        selected.push(id);
    } else {
        var tmp = selected.indexOf(id);
        selected.splice(tmp, 1);
    }
    if (url === 'undefined') {
        url = document.getElementById('RemoveMany').href;
    }
    document.getElementById('RemoveMany').href = url + '/' + (JSON.stringify(selected));
}