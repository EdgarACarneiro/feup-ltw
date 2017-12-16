import { encodeForAjax } from './utils.js';

function registerUser() {
    let username = this.querySelector('input[type="text"]').value;
    let email = this.querySelector('input[type="email"]').value;

    let passwordNodes = this.querySelectorAll('input[type="password"]');
    let password = passwordNodes[0].value;
    if (password == passwordNodes[1].value) {
        registerUserRequest(username, email, password);
    }
    
    return false;
}

function registerUserRequest(username, email, password) {
    let request = new XMLHttpRequest();
    request.onload = processRegisterStatus;
    request.open("post", "./actions/action_register.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({
        username: username,
        email: email,
        password: password
    }));
}

function processRegisterStatus() {
    let response;
    try {
        response = JSON.parse(this.responseText);
    } catch(e) {
        console.log("Username already exists");
        return false;
    }

    if (response.indexOf("SUCCESS") === 0) {
        window.location.replace("index.php");
        return true;
    } else {
        return false;
    }
}

window.addEventListener('load', function() {
    var form = document.getElementById('sign-up');
    form.onsubmit = registerUser.bind(form);

    var deleteTaskIcons = document.querySelectorAll("a[id^='delete-task@']");
    Array.from(deleteTaskIcons).forEach(element => {
        element.onclick = deleteTask.bind(element);
    });
});