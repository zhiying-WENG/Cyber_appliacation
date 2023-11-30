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
pwdInput.addEventListener("change", check_pwd);

/* const selectElement = document.querySelector(".ice-cream");
const result = document.querySelector(".result");

selectElement.addEventListener("change", (event) => {
    result.textContent = `You like ${event.target.value}`;
}); */

//let regWeak = new RegExp('(?=.*[0-9])(?=.*[a-zA-Z]).{8,30}');
//let regMedium = new RegExp('(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9]).{8,30}');
//let regStrong = new RegExp('(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^a-zA-Z0-9]).{8,30}');
//let regWeak = new RegExp('(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}')
//let regMedium1 = new RegExp('(?=.*\\d)(?=.*?[!@#$&*~%]).{8,30}');
//let regMedium2 = new RegExp('(?=.*[a-zA-Z])(?=.*?[!@#$&*~%]).{8,30}');
let regMedium = new RegExp('(?=.*[a-zA-Z0-9])(?=.*?[!@#$&*~%]).{8,30}');
let regStrong = new RegExp('(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[!@#$&*~%]).{8,30}');
function check_pwd(e) {
    pwdValue = e.target.value;
    //pwdBlock.style.display = "flex";
    //pwdBlock.style.flexFlow = "row nowrap";
    //pwdBlock.style.alignItems = "stretch";
    pwdLog.style.color = "red";
    pwdLog.textContent = "From 8 to 30 characters at least 1 uppercase letter, 1 lowercase letter, 1digit and 1 special character";
    check_pwd_pwdConfirm();
    if (regStrong.test(pwdValue)) {
        pwdLog.style.color = "grey";
        block1.style.display = "inline";
        block2.style.display = "inline";
        block3.style.display = "inline";
        return true;
    }
    if (regMedium.test(pwdValue)) {
        block1.style.display = "inline";
        block2.style.display = "inline";
        block3.style.display = "none";
        return false;
    }
    if (pwd.length < 8) {
        pwdLog.textContent = "Password's length should more than 8";
        block1.style.display = "none";
        block2.style.display = "none";
        block3.style.display = "none";
        return false;
    }
    block1.style.display = "inline";
    block2.style.display = "none";
    block3.style.display = "none";
    return false;
}
// verifier password and password confirm are the same
const pwdConfirm = document.getElementById("pwdConfirm");
const pwdConfirmLog = document.getElementById("pwdConfirmLog");
pwdConfirm.addEventListener("change", check_pwdConfirm);
function check_pwdConfirm(e) {
    pwdConfirmValue = e.target.value;
    check_pwd_pwdConfirm();
}

function check_pwd_pwdConfirm() {
    //pwdConfirmLog.textContent = "pwd:" + pwdValue + "pwdConfirm" + pwdConfirmValue;
    if (pwdConfirmValue != pwdValue) {
        pwdConfirmLog.style.color = "red";
        pwdConfirmLog.textContent = "Password and password confirm should be the same";
        return false;
    }
    pwdConfirmLog.style.color = "white";
    pwdConfirmLog.textContent = "";
    return ture;
}
// eye
eyePwd.addEventListener("click", eye_change(e));
function eye_change(e) {
    pwdLog.textContent += pwdInput;
    if (pwdInput.type == "password") {
        pwdInput.type = "text";
        e.target.src = "/img/eye.jpg";
    } else {
        pwdInput.type = "password";
        e.target.src = "/img/eyeOff.jpg";
    }
}
/* let flag = 0;
eyePwd.onclick = function () {
    if (flag == 0) {
        input.type = 'text';
        eyes.src = "/img/eye.jpg";
        flag = 1;
    } else {
        input.type = 'password';
        eyes.src = "/img/eyeOff.jpg";
        flag = 0;
    }
} */