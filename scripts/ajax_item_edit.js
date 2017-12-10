import { encodeForAjax, logServerResponse, createItemNode, createTaskNode } from './ajax_commons.js';


function show(element) {
    element.style.display = 'block';
}

function hide(element) {
    element.style.display = 'none';
}

export function switchToEdit() {
    hide(this);
    let inputNode = this.nextSibling.nextSibling;
    show(inputNode);
    inputNode.value = this.innerHTML;
    inputNode.focus();
}

export function switchToDisplay() {
    hide(this);
    let displayNode = this.previousSibling.previousSibling;
    show(displayNode);
    displayNode.innerHTML = this.value;

    let itemId = this.parentNode.id.match(/@(\d+)/)[1];

    changeItemDescription(itemId, this.value);
}

function changeItemDescription(itemId, itemText) {
    let request = new XMLHttpRequest();
    request.onload = logServerResponse;
    request.open("post", "action_change_item.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({
        item_id: itemId, description: itemText
    }));
}

window.addEventListener('load', function () {
    var list_items_display = document.getElementsByClassName('li-item-display');
    var list_items_edit = document.getElementsByClassName('li-item-edit');

    Array.from(list_items_display).forEach(function(element) {
        element.onclick = switchToEdit.bind(element);
    });
    
    Array.from(list_items_edit).forEach(function(element) {
        element.addEventListener('focusout', switchToDisplay.bind(element));
    });
});