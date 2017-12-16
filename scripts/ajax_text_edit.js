import { encodeForAjax, logServerResponse, hide, show } from './utils.js';

export function switchToEdit() {
    hide(this);
    let inputNode = this.parentNode.querySelector('input');;
    show(inputNode);
    inputNode.value = this.innerHTML;
    inputNode.focus();
}

export function switchToDisplay(updateFunction) {
    hide(this);
    let displayNode = this.parentNode.querySelector('span');;
    show(displayNode);
    displayNode.innerHTML = this.value;

    let item_id = this.parentNode.id.match(/@(\d+)/)[1];

    updateFunction(item_id, this.value);
}

export function changeItemDescription(id, itemText) {
    let request = new XMLHttpRequest();
    request.onload = logServerResponse;
    request.open("post", "./actions/action_change_item.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({
        item_id: id,
        description: itemText
    }));
}

export function changeTaskTitle(id, title) {
    let request = new XMLHttpRequest();
    request.onload = logServerResponse;
    request.open("post", "./actions/action_change_task.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({
        task_id: id,
        title: title
    }));
}

window.addEventListener('load', function() {
    var allDisplayElements = document.querySelectorAll('.item-display');
    var itemsEditElements = document.querySelectorAll('div.todo__text .item-edit');
    var titleEditElements = document.querySelectorAll('div.todo__title .item-edit');

    Array.from(allDisplayElements).forEach(function(element) {
        element.onclick = switchToEdit.bind(element);
    });

    Array.from(itemsEditElements).forEach(function(element) {
        element.addEventListener('focusout', switchToDisplay.bind(element, changeItemDescription));
    });

    Array.from(titleEditElements).forEach(function(element) {
        element.addEventListener('focusout', switchToDisplay.bind(element, changeTaskTitle));
    });
});