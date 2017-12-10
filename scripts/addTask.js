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

Array.from(document.getElementById("addTask").firstElementChild.children).forEach(element => {
    element.onfocus = function() {
        element.parentElement.style.height = "7.5em";
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
        }
    };
    element.onmouseover = function() {
        hover_form = true;
    };
    element.onmouseout = function() {
        hover_form = false;
    };
});

Array.from(document.getElementsByTagName("i")).forEach(element => {
    element.onclick = function() {
        document.getElementById("select_priority").getElementsByClassName("active").item(0).classList.remove("active");
        element.classList.add("active");
    };
});