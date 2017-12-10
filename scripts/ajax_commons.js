export function encodeForAjax(data) {
    return Object.keys(data).map(function(k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

export function logServerResponse() {
    console.log("Server Response:");
    console.log(JSON.parse(this.responseText));
}

/**
 * @deprecated sync requests
 */
export function getCurrentUser() {
    let request = new XMLHttpRequest();
    let username;
    request.onload = function () {
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
    str = str.concat('<div id="li@' + item.item_id + '" class="todo__text" >' + item.description + '</div>');
    str = str.concat('<a class="fa-circular-grey" href=""><i class="fa fa-trash" aria-hidden="true"></i></a>');

    node.innerHTML = str;

    return node;
}

export function createTaskNode(task, items) {
    let divNode = document.createElement('div');
    divNode.classList.add('masonry-item');
    let articleNode = document.createElement('article');
    articleNode.classList.add('rnd-corners', 'shadow-cards');
    divNode.appendChild(articleNode);

    // Task's title
    let titleNode = document.createElement('h2');
    titleNode.appendChild(document.createTextNode(task.title));
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

    // Add Task Button
    let buttonNode = document.createElement('button');
    buttonNode.innerHTML = '<i class="fa fa-plus-circle"></i> Add Sub-List';
    articleNode.appendChild(buttonNode);

    // Add Close Anchor/Button
    let anchorNode = document.createElement('a');
    anchorNode.classList.add('shadow-cards', 'fa-circular-grey');
    anchorNode.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    divNode.appendChild(anchorNode);

    return divNode;
}