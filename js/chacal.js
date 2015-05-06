function verificaLogin(){
  
  var check = true;
  sms = "";
  if(document.getElementById("siape").value == ""){
		sms += "Digite o siape!<br>";
  	check = false;
	}
  
  if(document.getElementById("senha").value == ""){
      sms += "Digite o login!";
  		check = false;
  }
    document.getElementById("alertas").innerHTML = "<div class='alert alert-danger' role='alert'>"+sms+"</div>";
    return check; 
}