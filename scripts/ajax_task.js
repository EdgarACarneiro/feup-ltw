import { encodeForAjax, createTaskNode, createItemNode } from 'ajax_commons.js';

function submitTask(user, form) {
    form.blur();
    let title = document.getElementById('addTask_title').value;
    let description = document.getElementById('addTask_item').value;
    let duedate = document.getElementById('addTask_date').value;

    let priorityNode = form.getElementsByClassName('active')[0];
    let priority = priorityNode.className.match(/priority-(\d)/)[1];

    addTask(user, title, priority, duedate, description);
    
    return false;
}

function addTask(user, title, priority, duedate, description) {
    let request = new XMLHttpRequest();
    request.onload = addTaskListener;
    request.open("post", "action_add_task.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(commons.encodeForAjax({
        creator: user, title: title,
        priority: priority, date: duedate,
        description: description
    }));
}

function addTaskListener() {
    let [task, items] = JSON.parse(this.responseText);

    console.log(task);
    console.log(items);    
}