
/** 
	funções em Javascript devem ser escritas, recomendo que cada pessoas criei nessa mesma pasta arquivos  do arquivo js.js diferentes. 
	Para na hora de der os commits no github não haver problemas.

	Depois que criarem lembrem de referenciar essas os arquivo. js no arquivo head.html.


	Esta já pode ser considera a minha =)
*/


/** Função padrão para validação em js*/

function pavilhao(){
	flag = true;
	// Pega o id do que se quer conferir e faz a verificação.
	if(document.getElementById("pav").value == ""){
		/** Essa parte escreve na diva "vpav", que esta vazia no html! Um alert já customizado via Bootstrao!
			Voces precisam apenas mudar a div em questão e o aviso*/
		document.getElementById("vpav").innerHTML = "<div class='alert alert-danger' role='alert'>Digite um nome</div>";
		flag = false;
	}			
				
	return flag;
}


function addsms(id,sms){
	id.innerHTML = "<div class='alert alert-danger' role='alert'>"+sms+"</div>";
}