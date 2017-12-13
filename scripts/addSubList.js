let parentTask_ID;

function setParentTask(e) {
    parentTask_ID = this.offsetParent.children[0].id;
    parentTask_ID = parentTask_ID.substr(parentTask_ID.indexOf("@") + 1, parentTask_ID.length);
    console.log("Parent Task: ", parentTask_ID);
    document.getElementById("addTask_item").focus();
    e.stopPropagation();
}

window.addEventListener('load', function() {
    let addSubListNodes = document.querySelectorAll('button.addSubList');
    Array.from(addSubListNodes).forEach(element => {
        element.onclick = setParentTask.bind(element);
    });
});