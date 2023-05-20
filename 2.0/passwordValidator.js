const colorOK = "blanchedalmond";
const colorError = "red";
document.getElementById("confirm").disabled = true;
document.getElementById("confirm").style.opacity = 0.3;

const passwordHandler = function(e){ 
    if(isPasswordValid(e.target)){
        e.target.style.borderTop = "transparent";
        e.target.classList.add("fadeOKanimation");
    }else{
        e.target.classList.remove("fadeOKanimation")
        e.target.style.borderBottomColor = colorError;
        e.target.style.borderTop = "transparent";
    }
    checkForm();
}

let pwd = document.getElementById("passwordInput");
pwd.addEventListener('input', passwordHandler);

const emailHandler = function(e){
    checkForm();
}

let email = document.getElementById("emailInput");
email.addEventListener('input', emailHandler);

var showingPassword = false;
function showPassword(id){
    showingPassword = !showingPassword;
    let e = document.getElementById(id);
    if(showingPassword)
        e.type = "text"
    else
        e.type = "password"
}

function isPasswordValid(e){
    lowerCase = false;
    upperCase = false;
    digit = false;

    s = e.value;
    if(s.length < 8){
        e.classList.remove("fadeOKanimation")
        e.style.borderColor = colorError;
        e.style.borderTop = "transparent";
        return;
    }
    for(let i = 0; i < s.length; i++){
        if(s.charAt(i) == s.charAt(i).toLowerCase()){
            lowerCase = true;
        }
        if(s.charAt(i) == s.charAt(i).toUpperCase() && s.charAt(i) >= "A" && s.charAt(i) <= "Z"){
            upperCase = true;
        }
        if(s.charAt(i) >= '0' && s.charAt(i) <= '9') {
            digit = true;
        }
    }
    return lowerCase && upperCase && digit;
}

function checkForm(){
    let pwd = isPasswordValid(document.getElementById("passwordInput"));
    let isEmailValid = document.getElementById("emailInput").value
            .toLowerCase()
            .match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)

    let confirm = document.getElementById("confirm");
    if(pwd && isEmailValid){
        confirm.disabled = false;
        confirm.style.opacity = 1;
    }else{
        confirm.disabled = true;
        confirm.style.opacity = 0.3;
    }
}