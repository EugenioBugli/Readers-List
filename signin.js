function CheckForm() {
    if(document.form.surname.value=="") {
        alert("Inserisci il Cognoome");
        return false;
    }
    if(document.form.name.value=="") {
        alert("Inserisci il Nome");
        return false;
    }
    if(document.forms.firstpw.value != document.forms.secondpw.value) {
        alert("La conferma della Password non è corretta");
        return false;
    }
    return true;
}
function ClickPassword() {
    alert("La Password deve essere composta da ");
}

function showPasswords(){
    var p1 = document.form.firstpw;
    var p2 = document.form.secondpw;
    if (p1.type === "password") {
        p1.type = "text";
        p2.type = "text";
    } else {
        p1.type = "password";
        p2.type = "password";
    }
}

const colorOK = "Green";
const colorError = "Red";
const minimumAge = 12;

//live email validation
var validEmailRegex = "[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+[.][a-zA-Z0-9]+";
const email = document.form.mail;
const emailHandler = function(e) {
    if(!e.target.value.match(validEmailRegex)){
        e.target.style.borderColor = colorError;
    }else{
        e.target.style.borderColor = colorOK;
    }
}
email.addEventListener('input', emailHandler);
//email.addEventListener('propertychange', emailHandler); // for IE8
//email.addEventListener('change', emailHandler);
/////////
//name validation
const iname = document.form.name;
const nameHandler = function(e){
    if(e.target.value != ""){
        e.target.style.borderColor = colorOK;
    }else{
        e.target.style.borderColor = colorError;
    }
}
iname.addEventListener('input', nameHandler);
/////////
//surname validation
const isname = document.form.surname;
isname.addEventListener('input', nameHandler);
/////////
//birth date validation
const bdate = document.form.birth;
const bdateHandler = function(e){
    var dateEntered = new Date(e.target.value);
    var ageDifMs = Date.now() - dateEntered;
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    if(Math.abs(ageDate.getUTCFullYear() - 1970) >= minimumAge){
        e.target.style.borderColor = colorOK;
    }else{
        e.target.style.borderColor = colorError;
    }
}
bdate.addEventListener('input', bdateHandler);
/////////
//username validation

/////////
//password validation
const pwd1 = document.form.firstpw;
const pwd2 = document.form.secondpw;

var isPasswordValid = true;

const passwordHandler = function(e){
    lowerCase = false;
    upperCase = false;
    digit = false;

    const hover = document.getElementById("pwd-hover-text");
    var message = "Your password must contain at least:";

    s = e.target.value;
    if(s.length < 8){
        message = "Your password must be at least 8 characters long";
        hover.innerHTML = message;
        e.target.style.borderColor = colorError;
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
    hover.innerHTML = message;
    if(lowerCase && upperCase && digit){
        hover.style.display = 'none';
        e.target.style.borderColor = colorOK;
        isPasswordValid = true;
    }else{
        e.target.style.borderColor = colorError;
        isPasswordValid = false;
    }
}

const confirmHandler = function(e){
    if(e.target.value == pwd1.value){
        e.target.style.borderColor = colorOK;
    }else{
        e.target.style.borderColor = colorError;
    }
}

pwd1.addEventListener('input', passwordHandler);
pwd2.addEventListener('input', confirmHandler);
/////////


// window.onload is optional since it depends on the way in which you fire events
window.onload = function(){
    // selecting the elements for which we want to add a tooltip
    const target = document.form.firstpw;
    const hover = document.getElementById("pwd-hover-text");

    var hovering = false;
    
    // change display to 'block' on mouseover
    target.addEventListener('mouseover', () => {
        hovering = true;
        if(!isPasswordValid)
            hover.style.display = 'block';
    }, false);
    
    // change display to 'none' on mouseleave
    target.addEventListener('mouseleave', () => {
        hover.style.display = 'none';
    }, false);
}

//nationality validation :
isNationality = document.form.nationality;
