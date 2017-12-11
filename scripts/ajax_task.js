import { encodeForAjax, logServerResponse, createItemNode, createTaskNode } from './ajax_commons.js';

function submitTask() {
    let title = document.getElementById('addTask_title').value;
    let description = document.getElementById('addTask_item').value;
    let duedate = document.getElementById('addTask_date').value;

    let priorityNode = this.getElementsByClassName('active')[0];
    let priority = priorityNode.className.match(/priority-(\d)/)[1];

    addTask(title, priority, duedate, description);

    this.blur();
    clearAddTaskForm();

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

    let taskNode = createTaskNode(task, items);
    let tasksListNode = document.getElementById('tasks-list');

    tasksListNode.appendChild(taskNode);
}

function clearAddTaskForm() {
    document.getElementById('addTask_title').value = "";
    document.getElementById('addTask_item').value = "";
    document.getElementById('addTask_date').value = "";

    let priorityNode = document.getElementById('select_priority').getElementsByClassName('priority-0')[0];
    priorityNode.click();
}

export function deleteTask(event) {
    let id = this.id.match(/^delete-task@(\d+)/)[1];
    event.preventDefault();
    this.parentNode.remove();

    let request = new XMLHttpRequest();
    request.onload = logServerResponse;
    request.open("post", "action_delete_task.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ task_id: id }));

    event.stopPropagation();
}

window.addEventListener('load', function() {
    var form = document.getElementById('addTask').getElementsByTagName('form')[0];
    form.onsubmit = submitTask.bind(form);

    var deleteTaskIcons = document.querySelectorAll("a[id^='delete-task@']");
    Array.from(deleteTaskIcons).forEach(element => {
        element.onclick = deleteTask.bind(element);
    });
});