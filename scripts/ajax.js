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

function addBlankTask(username) {
    let request = new XMLHttpRequest();
    request.onload = addTaskListener;
    request.open("post", "action_add_task.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({creator: username}));

    return false; // preventing event from bubbling up
}

function addTaskListener() {
    if (this.status == 200) {
        let tasksList = document.getElementById('tasks-list');
        let task = JSON.parse(this.responseText);

        tasksList.insertBefore(createTaskNode(), tasksList.lastChild);

        console.log("New Task!");
        console.log(task);
    }
}

function createTaskNode() {
    let task = document.createElement('div');
    task.classList.add('masonry-item');

    let subNode = document.createElement('article');
    subNode.classList.add('rnd-corners', 'shadow-cards');
    subNode.innerHTML = "<h2>New Task</h2>"

    task.appendChild(subNode);

    // TODO improve this
    return task;
}

function showSearchResult(value) {
    // TODO
    console.log("Searching for: " + value);
}