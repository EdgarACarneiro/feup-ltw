function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function requestListener () {
    console.log(this.responseText);
}

function addItemToTask(form) {
    let input = form.firstChild;
    let description = input.value.trim();
    if (description.length == 0) {
        return false;
    }

    let task_id = input.id.match(/@(\d+)/)[1]; // regex FTW

    let request = new XMLHttpRequest();
    request.onload = requestListener;
    let url = "action_add_item.php";
    url += "?task_id=" + task_id;
    url += "&description=" + description;
    request.open("POST", url, true);
    request.send();

    console.log({description, task_id});
    return false; // preventing event from bubbling up
}

function showSearchResult(value) {
    console.log("Searching for: " + value);
}