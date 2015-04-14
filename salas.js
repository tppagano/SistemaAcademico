
function verifica() {
    var preenchido = true;
    var msg;
   if (document.getElementById("numero").value == "") {
        msg="O campo número deve ser preenchido!\n";
        preenchido = false;
    }
    if (document.getElementById("capacidade").value == "") {
        msg+="O campo capacidade deve ser preenchido!\n";
        preenchido = false;
    }
    if (document.getElementById("cat").value == "Selecione") {
        msg+="O campo categoria deve ser preenchido!\n";
        preenchido = false;
    }
    if (document.getElementById("sel_pav").value == "Selecione") {
        msg+="O campo número deve ser preenchido!\n";
        preenchido = false;
    }
    return preenchido;
}
