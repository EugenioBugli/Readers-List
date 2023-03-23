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