function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function requestListener () {
    if (this.status == 200) {
        document.getElementsByTagName('html').innerHTML = this.responseText;
        console.log(this.responseText);
    }
}

function addItemToTask(form) {
    let input = form.firstChild;
    let itemText = input.value.trim();
    if (itemText.length == 0) {
        return false;
    }

    let task = input.id.match(/@(\d+)/)[1]; // regex FTW

    let request = new XMLHttpRequest();
    request.onload = requestListener;
    request.open("post", "action_add_item.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({task_id: task, description: itemText}));

    console.log({itemText, task});
    return false; // preventing event from bubbling up
}

function showSearchResult(value) {
    console.log("Searching for: " + value);
}