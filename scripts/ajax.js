function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function addItemToTask(form) {
    let task = form.id.match(/@(\d+)/)[1];
    let inputNode = form.lastElementChild;
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
        let listItem = createItemNode(item);
        list.insertBefore(listItem, list.lastElementChild);
    } else {
        console.log("Error receiving response text from server");
    }
}

function setItemCompleted(checkbox) {
    let lastSibling = checkbox.parentNode.lastChild.previousSibling;
    let id = lastSibling.id.match(/@(\d+)/)[1];
    let checked = checkbox.checked;

    let request = new XMLHttpRequest();
    request.onload = logThisItem;
    request.open("post", "action_check_item.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({item_id: id, completed: checked ? 1 : 0}));

    return true;
}

function logThisItem() {
    console.log(JSON.parse(this.responseText));
}

function createItemNode(item) {
    let node = document.createElement("li");
    node.classList.add('todo');
    let str = '<input class="todo__state" type="checkbox"/>';
    str = str.concat('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 25 25" class="todo__icon">');
    str = str.concat('<use xlink:href="#todo__box" class="todo__box"></use><use xlink:href="#todo__check" class="todo__check"></use><use xlink:href="#todo__circle" class="todo__circle"></use></svg>');
    str = str.concat('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 10" class="todo__icon todo__icon_line">');    
    str = str.concat('<use xlink:href="#todo__line" class="todo__line"></use></svg>');    
    str = str.concat('<div id="li@' + item.item_id + '" class="todo__text" >' + item.description + '</div>');

    node.innerHTML = str;

    return node;
}

// function editItem(itemDiv) {
//     let text = itemDiv.innerHTML;
//     let id = itemDiv.id.match(/@(\d+)/)[1];

//     let inputNode = document.createElement('input');
//     inputNode.value = text;
//     inputNode.onsubmit = () => console.log(this);
    
//     let formNode = document.createElement('form');
//     formNode.appendChild(inputNode);

//     itemDiv.innerHTML = "";
//     itemDiv.appendChild(formNode);

//     return true;
// }


// function addBlankTask(username) {
//     let request = new XMLHttpRequest();
//     request.onload = addTaskListener;
//     request.open("post", "action_add_task.php", true);
//     request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     request.send(encodeForAjax({creator: username}));

//     return false; // preventing event from bubbling up
// }
// function addTaskListener() {
//     if (this.status == 200) {
//         let tasksList = document.getElementById('tasks-list');
//         let task = JSON.parse(this.responseText);

//         tasksList.insertBefore(createTaskNode(), tasksList.lastChild);

//         console.log("New Task!");
//         console.log(task);
//     }
// }
// function createTaskNode() {
//     let task = document.createElement('div');
//     task.classList.add('masonry-item');

//     let subNode = document.createElement('article');
//     subNode.classList.add('rnd-corners', 'shadow-cards');
//     subNode.innerHTML = "<h2>New Task</h2>"

//     task.appendChild(subNode);

//     // TODO improve this
//     return task;
// }

function showSearchResult(value) {
    // TODO
    console.log("Searching for: " + value);
}