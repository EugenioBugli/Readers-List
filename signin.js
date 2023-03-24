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

const passwordHandler = function(e){
    lowerCase = false;
    upperCase = false;
    digit = false;

    s = e.target.value;
    if(s.length < 8){
        e.target.style.borderColor = colorError;
        return;
    }
    for(let i = 0; i < s.length; i++){
        if(s.charAt(i) == s.charAt(i).toLowerCase()){
            lowerCase = true;
        }
        if(s.charAt(i) == s.charAt(i).toUpperCase()){
            upperCase = true;
        }
        if(s.charAt(i) >= '0' && s.charAt(i) <= '9') {
            digit = true;
        }
    }
    if(lowerCase && upperCase && digit){
        e.target.style.borderColor = colorOK;
    }else{
        e.target.style.borderColor = colorError;
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