import { encodeForAjax, logServerResponse } from './utils.js';

function registerUser() {
    let username = this.querySelector('input[type="text"]').value;
    
    // return false;
}

function registerUserRequest(username, password, email) {
    let request = new XMLHttpRequest();
    request.onload = logServerResponse;
    request.open("post", "action_register_user.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({
        username: username,
        password: password,
        email: email
    }));
}

window.addEventListener('load', function() {
    var form = document.getElementById('sign-up');
    form.onsubmit = registerUser.bind(form);

    var deleteTaskIcons = document.querySelectorAll("a[id^='delete-task@']");
    Array.from(deleteTaskIcons).forEach(element => {
        element.onclick = deleteTask.bind(element);
    });
});