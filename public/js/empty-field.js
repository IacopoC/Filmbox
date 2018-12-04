/* Funzione per avviso campo vuoto ricerca film*/
function emptyField() {
    var field;
    field = document.getElementById("film-field").value;
    if (field == "") {
    	document.getElementById("alert-message").innerHTML = "Compila il campo soprastante per effettuare una ricerca";
        return false;
    };
}   