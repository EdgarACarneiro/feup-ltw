function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function addItemToTask(form) {
    let task = form.id.match(/@(\d+)/)[1];
    let inputNode = form.firstChild;
    let itemText = inputNode.value.trim();
    if (itemText.length == 0) {
        return false;
    }

    inputNode.value = "";
    
    let request = new XMLHttpRequest();
    request.onload = addItemListener;
    request.open("post", "action_add_item.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({task_id: task, description: itemText}));

    return false; // preventing event from bubbling up
}

function addItemListener() {
    if (this.status == 200) {
        let item = JSON.parse(this.responseText);
        let list = document.getElementById("ul@" + item.task_id);
        let listItem = document.createElement("li");
        listItem.innerHTML = item.description;
        list.insertBefore(listItem, list.lastChild);
    } else {
        console.log("Error receiving response text from server");
    }
}

function showSearchResult(value) {
    console.log("Searching for: " + value);
}