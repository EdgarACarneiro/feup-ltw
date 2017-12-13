let hover_form = false;

document.getElementById("addTask").firstElementChild.onmouseover = function() {
    hover_form = true;
};

document.getElementById("addTask").firstElementChild.onfocus = function() {
    document.getElementById("addTask_item").focus();
};

document.getElementById("addTask").firstElementChild.onmouseout = function() {
    hover_form = false;
};

function clearAddTaskForm() {
    Array.from(document.getElementById("addTask").children[0].children).forEach(element => {
        element.value = "";
        element.blur();
    });
    parentTask_ID = null;
    hover_form = false;

    let priorityNode = document.getElementById('select_priority').getElementsByClassName('priority-0')[0];
    priorityNode.click();
}

Array.from(document.getElementById("addTask").firstElementChild.children).forEach(element => {
    element.onfocus = function() {
        Array.from(element.parentElement.children).forEach(element => {
            element.style.display = "block";
        });
    };
    element.onblur = function() {
        if (!hover_form) {
            element.parentElement.style.height = "";
            Array.from(element.parentElement.children).forEach(element => {
                element.style.display = "";
            });
            clearAddTaskForm();
        }
    };
    element.onmouseover = function() {
        hover_form = true;
    };
    element.onmouseout = function() {
        hover_form = false;
    };
});

Array.from(document.getElementById('select_priority').getElementsByTagName("i")).forEach(element => {
    element.onclick = function() {
        document.getElementById("select_priority").getElementsByClassName("active").item(0).classList.remove("active");
        element.classList.add("active");
    };
});