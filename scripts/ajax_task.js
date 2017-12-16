import { encodeForAjax, logServerResponse } from './utils.js';
import { createTaskNode } from './nodes.js';

function submitTask() {
    let title = document.getElementById('addTask_title').value;
    let description = document.getElementById('addTask_item').value;
    let category = document.getElementById('addTask_category').value;
    let duedate = document.getElementById('addTask_date').value;

    let priorityNode = this.getElementsByClassName('active')[0];
    let priority = priorityNode.className.match(/priority-(\d)/)[1];

    addTask(title, priority, category, duedate, description, parentTask_ID);

    clearAddTaskForm();

    return false;
}

function addTask(title, priority, category, duedate, description, parent_task) {
    let request = new XMLHttpRequest();
    request.onload = addTaskListener;
    request.open("post", "./actions/action_add_task.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({
        title: title,
        priority: priority,
        category: category,
        date: duedate,
        description: description,
        parent_task: parent_task
    }));
}

function addTaskListener() {
    let [task, items] = JSON.parse(this.responseText);

    let taskNode = createTaskNode(task, items);
    if (task.parent_task == null) {
        let tasksListNode = document.getElementById('tasks-list');
        tasksListNode.appendChild(taskNode);
    } else {
        let parentTaskNode = document.getElementById('update-title@' + task.parent_task).parentElement;
        let articleTask = taskNode.firstChild;
        articleTask.classList.remove("shadow-cards");
        articleTask.children["info-nav"].remove();
        parentTaskNode.insertBefore(articleTask, parentTaskNode.children["info-nav"]);
    }
}

function clearAddTaskForm() {
    Array.from(document.getElementById("addTask").children[0].children).forEach(element => {
        if (element.type != "submit") {
            element.value = "";
        }
        element.blur();
    });
    parentTask_ID = null;
    hover_form = false;

    let priorityNode = document.getElementById('select_priority').getElementsByClassName('priority-0')[0];
    priorityNode.click();
}

export function deleteTask(event) {
    let id = this.id.match(/^delete-task@(\d+)/)[1];
    event.preventDefault();
    if (this.parentNode.parentNode.tagName == 'DIV') {
        this.parentNode.parentNode.remove();
    } else {
        this.parentNode.remove();
    }

    let request = new XMLHttpRequest();
    request.onload = logServerResponse;
    request.open("post", "./actions/action_delete_task.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ task_id: id }));

    event.stopPropagation();
}

function updateTaskPriority() {
    let task = JSON.parse(this.responseText);
    var categoryElements = document.querySelectorAll("div[id^='update-title@" + task.task_id + "'] i")[0];
    let lastPriority = task.priority - 1;
    if (lastPriority < 0) {
        lastPriority = 3;
    }
    categoryElements.classList.remove("priority-" + lastPriority);
    categoryElements.classList.add("priority-" + task.priority);
}

export function changeTaskPriority() {
    let priority = this.classList[2];
    let priority_Number = priority.substr(priority.indexOf("-") + 1, priority.length);
    priority_Number++;
    if (priority_Number > 3) {
        priority_Number = 0;
    }
    priority = "priority-" + priority_Number.toString();
    let id = this.parentNode.id.substr(this.parentNode.id.indexOf("@") + 1, this.parentNode.id.length);

    let request = new XMLHttpRequest();
    request.onload = updateTaskPriority;
    request.open("post", "./actions/action_update_priority.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({
        task_id: id,
        priority: priority_Number
    }));

    event.stopPropagation();
}

window.addEventListener('load', function() {
    var form = document.getElementById('addTask').getElementsByTagName('form')[0];
    form.onsubmit = submitTask.bind(form);

    var deleteTaskIcons = document.querySelectorAll("a[id^='delete-task@']");
    Array.from(deleteTaskIcons).forEach(element => {
        element.onclick = deleteTask.bind(element);
    });

    var categoryElements = document.querySelectorAll('div.todo__title i');
    Array.from(categoryElements).forEach(element => {
        element.onclick = changeTaskPriority.bind(element);
    });
});