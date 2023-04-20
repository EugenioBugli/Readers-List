const colorOK = "blanchedalmond";
const colorError = "red";

const passwordHandler = function(e){
    lowerCase = false;
    upperCase = false;
    digit = false;
    
    var message = "Your password must contain at least:";

    s = e.target.value;
    if(s.length < 8){
        e.target.classList.remove("fadeOKanimation")
        message = "Your password must be at least 8 characters long";
        e.target.style.borderColor = colorError;
        e.target.style.borderTop = "transparent";
        isPasswordValid = false;
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
    if(!lowerCase){
        message += "<br>- one lower case character.";
    }
    if(!upperCase){
        message += "<br>- one upper case character.";
    }
    if(!digit){
        message += "<br>- one number.";
    }
    //hover.innerHTML = message;
    if(lowerCase && upperCase && digit){
        e.target.style.borderTop = "transparent";
        isPasswordValid = true;
        e.target.classList.add("fadeOKanimation");
    }else{
        e.target.classList.remove("fadeOKanimation")
        e.target.style.borderBottomColor = colorError;
        e.target.style.borderTop = "transparent";
        isPasswordValid = false;
    }
}

let pwd = document.getElementById("passwordInput");
pwd.addEventListener('input', passwordHandler);

var showingPassword = false;
function showPassword(id){
    showingPassword = !showingPassword;
    let e = document.getElementById(id);
    if(showingPassword)
        e.type = "text"
    else
        e.type = "password"
}