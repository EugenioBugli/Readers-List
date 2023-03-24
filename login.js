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
function ValidateEmail() {
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!document.form.mail.value.match(validRegex)) {
        alert("Invalid email address!");
        return false;   
    }
    alert("Valid email address!");
    return true;
}

//live email validation
var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9]+$/;
const source = document.getElementById('emailInput');
const result = document.getElementById('result');

const inputHandler = function(e) {
    if(!document.form.mail.value.match(validRegex)){
        source.style.borderColor = "red";
    }else{
        source.style.borderColor = "green";
    }
}

source.addEventListener('input', inputHandler);
source.addEventListener('propertychange', inputHandler);
source.addEventListener('change', inputHandler);
/////////