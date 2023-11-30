// show password
/*const eye = document.querySelector(".feather-eye");
const eyeoff = document.querySelector(".feather-eye-off");
const passwordField = document.querySelector("input[type=password]");

eye.addEventListener("click", () => {
    eye.style.display = "none";
    eyeoff.style.display = "block";
    passwordField.type = "text";
});

eyeoff.addEventListener("click", () => {
    eyeoff.style.display = "none";
    eye.style.display = "block";
    passwordField.type = "password";
});*/

// show password level
const pwdInput = document.getElementById("pwd");
const pwdLog = document.getElementById("pwdLog");
const pwdBlock = document.getElementById("pwdBlock");
const block1 = document.getElementById("block1");
const block2 = document.getElementById("block2");
const block3 = document.getElementById("block3");
const eyePwd = document.getElementById("eyePwd");
const eyePwdConfirm = document.getElementById("eyePwdConfirm");
let pwdValue = "";
let pwdConfirmValue = "";

pwdInput.addEventListener("input", check_pwd);

let regMedium = new RegExp('(?=.*[a-zA-Z0-9])(?=.*?[!@#$&*~%]).{8,30}');
let regStrong = new RegExp('(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[!@#$&*~%]).{8,30}');

function check_pwd(e) {
    pwdValue = e.target.value;
    pwdLog.style.color = "red";
    pwdLog.textContent = "From 8 to 30 characters at least 1 uppercase letter, 1 lowercase letter, 1digit and 1 special character";
    check_pwd_pwdConfirm();
    if (regStrong.test(pwdValue)) {
        pwdLog.style.display = "none";
        block1.style.display = "inline-block";
        block2.style.display = "inline-block";
        block3.style.display = "inline-block";
        return true;
    }
    pwdLog.style.display = "inline-block";
    if (regMedium.test(pwdValue)) {
        block1.style.display = "inline-block";
        block2.style.display = "inline-block";
        block3.style.display = "none";
        return false;
    }
    if (pwdValue.length < 8) {
        pwdLog.textContent = "Password's length should more than 8";
        block1.style.display = "none";
        block2.style.display = "none";
        block3.style.display = "none";
        return false;
    }
    block1.style.display = "inline-block";
    block2.style.display = "none";
    block3.style.display = "none";
    return false;
}

// verifier password and password confirm are the same
const pwdConfirm = document.getElementById("pwdConfirm");
const pwdConfirmLog = document.getElementById("pwdConfirmLog");
pwdConfirm.addEventListener("input", check_pwdConfirm);

function check_pwdConfirm(e) {
    pwdConfirmValue = e.target.value;
    check_pwd_pwdConfirm();
}

function check_pwd_pwdConfirm() {
    if (pwdConfirmValue !== pwdValue) {
        pwdConfirmLog.style.color = "red";
        pwdConfirmLog.textContent = "Password and password confirm should be the same";
        return false;
    }
    pwdConfirmLog.style.color = "white";
    pwdConfirmLog.textContent = "";
    return true;
}
