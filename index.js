function verifierRadio() {
    var radios = document.getElementsByName('reponses');
    var estSelectionne = 0;

    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            estSelectionne = i+1;
            break;
        }
    }

    if (estSelectionne != 0) {
        if (bonnereponse($question) == estSelectionne){
            console.log("Bonne réponse")
        }
    } else {
        console.log("Mauvaise réponse")
    }
}