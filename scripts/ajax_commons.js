import { addItemToTask, setItemCompleted, deleteItem } from './ajax_item.js';
import { switchToEdit, switchToDisplay, changeItemDescription, changeTaskTitle } from './ajax_text_edit.js';
import { deleteTask } from './ajax_task.js';

export function encodeForAjax(data) {
    return Object.keys(data).map(function(k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

export function logServerResponse() {
    console.log("Server Response:");
    console.log(JSON.parse(this.responseText));
}

export function show(element) {
    element.style.display = 'block';
}

export function hide(element) {
    element.style.display = 'none';
}

/**
 * @deprecated sync requests
 */
export function getCurrentUser() {
    let request = new XMLHttpRequest();
    let username;
    request.onload = function() {
        username = JSON.parse(this.responseText);
    }
    request.open("post", "action_get_username.php", false); // false -> not async
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(); // TODO check better way to do sync request

    return username;
}

export function createItemNode(item) {
    let node = document.createElement("li");
    node.classList.add('todo');
    let str = '<input class="todo__state" type="checkbox"/>';
    str = str.concat('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 25 25" class="todo__icon">');
    str = str.concat('<use xlink:href="#todo__box" class="todo__box"></use><use xlink:href="#todo__check" class="todo__check"></use><use xlink:href="#todo__circle" class="todo__circle"></use></svg>');
    str = str.concat('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 10" class="todo__icon todo__icon_line">');
    str = str.concat('<use xlink:href="#todo__line" class="todo__line"></use></svg>');
    str = str.concat('<div id="li@' + item.item_id + '" class="todo__text" >');
    str = str.concat('<span class="item-display">' + item.description + '</span>');
    str = str.concat('<input type="text" class="item-edit" style="display:none"/></div>');
    str = str.concat('<a id="delete-item@' + item.item_id + '" class="fa-circular-grey"><i class="fa fa-trash" aria-hidden="true"></i></a>');

    node.innerHTML = str;

    addListenersToItemNode(node, item);

    return node;
}

function addListenersToItemNode(node, item) {
    let checkboxNode = node.getElementsByClassName('todo__state')[0];
    checkboxNode.onclick = setItemCompleted.bind(checkboxNode);

    let displayNode = node.getElementsByClassName('item-display')[0];
    displayNode.onclick = switchToEdit.bind(displayNode);

    let inputNode = node.getElementsByClassName('item-edit')[0];
    inputNode.addEventListener('focusout', switchToDisplay.bind(inputNode, changeItemDescription));
    
    let deleteNode = node.querySelector("a[id^='delete-item@" + item.item_id + "']");
    deleteNode.onclick = deleteItem.bind(deleteNode);
}

export function createTaskNode(task, items) {
    let divNode = document.createElement('div');
    divNode.classList.add('masonry-item');
    let articleNode = document.createElement('article');
    articleNode.classList.add('rnd-corners', 'shadow-cards');
    divNode.appendChild(articleNode);

    // Task's title
    let titleNode = document.createElement('div');
    titleNode.id = "update-title@" + task.task_id;
    titleNode.classList.add('todo__title');
    let titleInnerHtml = '<span class="item-display">' + task.title + '</span>';
    titleInnerHtml = titleInnerHtml.concat('<input type="text" class="item-edit" style="display:none"/>');
    titleNode.innerHTML = titleInnerHtml;
    articleNode.appendChild(titleNode);

    // Task's list
    let ulNode = document.createElement('ul');
    ulNode.id = "ul@" + task.task_id;
    articleNode.appendChild(ulNode);

    // List's items
    for (let i = 0; i < items.length; i++) {
        let item = items[i];
        let itemNode = createItemNode(item);
        ulNode.appendChild(itemNode);
    }

    // Add Form to Add Item
    let addItemFormNode = document.createElement('li');
    addItemFormNode.classList.add("todo");
    let formNode = document.createElement('form');
    formNode.id = "form@" + task.task_id;
    formNode.innerHTML = '<input type="text" placeholder="Add Item..." name="description" required="">';
    formNode.onsubmit = addItemToTask.bind(formNode);
    addItemFormNode.appendChild(formNode);
    ulNode.appendChild(addItemFormNode);

    // Add Nav
    let navNode = document.createElement('nav');
    navNode.id = "info-nav";
    articleNode.appendChild(navNode);

    // Add Task Button
    let buttonNode = document.createElement('button');
    buttonNode.classList.add("addSubList");
    buttonNode.innerHTML = '<i class="fa fa-plus-circle"></i> Add Sub-List';
    navNode.appendChild(buttonNode);

    // Add Close Anchor/Button
    let anchorNode = document.createElement('a');
    anchorNode.id = "delete-task@" + task.task_id;
    anchorNode.classList.add('shadow-cards', 'fa-circular-grey');
    anchorNode.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    articleNode.appendChild(anchorNode);

    addListenersToTaskNode(divNode, task);

    return divNode;
}

function addListenersToTaskNode(node, task) {
    let iconNode = node.querySelector("a[id^='delete-task@']");
    iconNode.onclick = deleteTask.bind(iconNode);

    let titleDisplayNode = node.querySelector("div.todo__title .item-display");
    titleDisplayNode.onclick = switchToEdit.bind(titleDisplayNode);
    
    let titleEditNode = node.querySelector("div.todo__title .item-edit");
    titleEditNode.addEventListener('focusout', switchToDisplay.bind(titleEditNode, changeTaskTitle));    
}