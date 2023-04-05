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
    if(document.form.nationality.value=="") {
        alert("Inserisci la tua Nazionalità");
        return false;
    }
    if(document.form.username.value=="") {
        alert("Inserisci il tuo username");
        return false;
    }
    if(document.form.email.value=="") {
        alert("Inserisci la tua email");
        return false;
    }
    if(document.form.firstpw.value=="") {
        alert("Inserisci la tua password");
        return false;
    }
    if(document.form.secondpw.value=="") {
        alert("Inserisci la conferma della tua password");
        return false;
    }
    return true;
}
function ClickPassword() {
    alert("La Password deve essere composta da ");
}

//live email validation
var validEmailRegex = "[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+[.][a-zA-Z0-9]+";
const email = document.getElementById('emailInput');

const emailHandler = function(e) {
    if(!document.form.mail.value.match(validEmailRegex)){
        email.style.borderColor = "red";
    }else{
        email.style.borderColor = "green";
    }
}

email.addEventListener('input', emailHandler);
email.addEventListener('propertychange', emailHandler);
email.addEventListener('change', emailHandler);
/////////