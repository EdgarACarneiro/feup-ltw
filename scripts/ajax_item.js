import { encodeForAjax, logServerResponse, createItemNode, createTaskNode } from './ajax_commons.js';


export function addItemToTask() {
    let task = this.id.match(/@(\d+)/)[1];
    let inputNode = this.lastElementChild;
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

    return false; // prevent default action
}

function addItemListener() {
    let item = JSON.parse(this.responseText);
    let list = document.getElementById("ul@" + item.task_id);
    let listItem = createItemNode(item);
    list.insertBefore(listItem, list.lastElementChild);
}

export function setItemCompleted() {
    let textDiv = this.parentNode.getElementsByClassName('todo__text')[0];
    let id = textDiv.id.match(/@(\d+)/)[1];
    let checked = this.checked;

    let request = new XMLHttpRequest();
    request.onload = logServerResponse;
    request.open("post", "action_check_item.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ item_id: id, completed: checked ? 1 : 0 }));

    return true; // allow default action
}

export function deleteItem(event) {
    let id = this.id.match(/^delete-item@(\d+)/)[1];
    event.preventDefault();
    this.parentNode.remove();

    let request = new XMLHttpRequest();
    request.onload = logServerResponse;
    request.open("post", "action_delete_item.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ item_id: id }));
}

window.addEventListener('load', function() {
    var checkboxes = document.getElementById('tasks-list').getElementsByClassName('todo__state');
    Array.from(checkboxes).forEach(element => {
        element.onclick = setItemCompleted.bind(element);
    });

    var inputItems = document.querySelectorAll("form[id^='form@']");
    [].slice.call(inputItems).forEach(element => {
        element.onsubmit = addItemToTask.bind(element);
    });

    var trashIcons = document.querySelectorAll("a[id^='delete-item@']");
    Array.from(trashIcons).forEach(element => {
        element.onclick = deleteItem.bind(element);
    });
});