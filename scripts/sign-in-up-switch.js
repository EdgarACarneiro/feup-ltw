function showSignIn() {
    let grad_color = "linear-gradient(#80E3D1, #53C5B9)"

    document.getElementById("sign-up").style.display = "none";
    document.getElementById("sign-in").style.display = "inline-block";
    document.getElementById("sign-up-btn").style.background = "none";
    document.getElementById("sign-in-btn").style.background = grad_color;
}

function showSignUp() {
    let grad_color = "linear-gradient(#80E3D1, #53C5B9)"

    document.getElementById("sign-in").style.display = "none";
    document.getElementById("sign-up").style.display = "inline-block";
    document.getElementById("sign-in-btn").style.background = "none";
    document.getElementById("sign-up-btn").style.background = grad_color;
}

window.addEventListener('load', function() {
    var sign_in_btn = document.getElementById("sign-in-btn");
    sign_in_btn.addEventListener('click', showSignIn);

    var sign_up_btn = document.getElementById("sign-up-btn");
    sign_up_btn.addEventListener('click', showSignUp);
});