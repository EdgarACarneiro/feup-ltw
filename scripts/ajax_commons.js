export function encodeForAjax(data) {
    return Object.keys(data).map(function(k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

export function logServerResponse() {
    console.log("Server Response:");
    console.log(JSON.parse(this.responseText));
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

export function createTaskNode(task) {
    // echo '<div class="masonry-item">';
    // echo '<article class="rnd-corners shadow-cards">';

    // listToDoList($project, false);

    // foreach (getChildTasks($project['task_id']) as $subtask) {
    //     listToDoList($subtask, true);
    // }

    // echo '<button><i class="fa fa-plus-circle"></i> Add Sub-List</button>';
    // echo '</article>';
    // echo '<a href="" class="shadow-cards fa-circular-grey">
    //         <i class="fa fa-times" aria-hidden="true"></i></a>';
    // echo '</div>';

    let node = document.createElement("div");
    node.classList.add('masonry-item');

    // TODO

    return node;
}
