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