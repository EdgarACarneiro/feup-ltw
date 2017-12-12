function showSignIn() {
    let grad_color = "linear-gradient(#80E3D1, #53C5B9)"

    document.getElementById("sign-up").style.display = "none";
    document.getElementById("sign-in").style.display = "inline-block";
    document.getElementsByClassName("sign-up-btn")[0].style.background = "none";
    document.getElementsByClassName("sign-in-btn")[0].style.background = grad_color;
}

function showSignUp() {
    let grad_color = "linear-gradient(#80E3D1, #53C5B9)"

    document.getElementById("sign-in").style.display = "none";
    document.getElementById("sign-up").style.display = "inline-block";
    document.getElementsByClassName("sign-in-btn")[0].style.background = "none";
    document.getElementsByClassName("sign-up-btn")[0].style.background = grad_color;
}

window.addEventListener('load', function() {
    var sign_in_btn = document.getElementsByClassName("sign-in-btn")[0];
    sign_in_btn.addEventListener('click', showSignUp);

    var sign_up_btn = document.getElementsByClassName("sign-up-btn")[0];
    sign_up_btn.addEventListener('click', showSignIn);
});