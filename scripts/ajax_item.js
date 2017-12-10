import { encodeForAjax, logServerResponse, createItemNode, createTaskNode } from './ajax_commons.js';


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
    request.send(encodeForAjax({ task_id: task, description: itemText }));

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
    let textDiv = checkbox.parentNode.getElementsByClassName('todo__text')[0];
    let id = textDiv.id.match(/@(\d+)/)[1];
    let checked = checkbox.checked;

    let request = new XMLHttpRequest();
    request.onload = logServerResponse;
    request.open("post", "action_check_item.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ item_id: id, completed: checked ? 1 : 0 }));

    return true;
}