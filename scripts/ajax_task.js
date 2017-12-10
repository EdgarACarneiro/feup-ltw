import { encodeForAjax, logServerResponse, createItemNode, createTaskNode } from './ajax_commons.js';


function submitTask() {
    this.blur();
    let title = document.getElementById('addTask_title').value;
    let description = document.getElementById('addTask_item').value;
    let duedate = document.getElementById('addTask_date').value;

    let priorityNode = this.getElementsByClassName('active')[0];
    let priority = priorityNode.className.match(/priority-(\d)/)[1];

    addTask(title, priority, duedate, description);
    
    return false;
}

function addTask(title, priority, duedate, description) {
    let request = new XMLHttpRequest();
    request.onload = addTaskListener;
    request.open("post", "action_add_task.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({
        title: title,
        priority: priority,
        date: duedate,
        description: description
    }));
}

function addTaskListener() {
    let [task, items] = JSON.parse(this.responseText);

    console.log(task);
    console.log(items);    
}

window.addEventListener('load', function() {
    var form = document.getElementById('addTask').getElementsByTagName('form')[0];
    form.onsubmit = submitTask.bind(form);
});