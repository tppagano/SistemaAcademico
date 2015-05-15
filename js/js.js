
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

function pavilhao2(){
	flag = true;
	// Pega o id do que se quer conferir e faz a verificação.
	if(document.getElementById("pvCE").value == "Selecione"){
		/** Essa parte escreve na diva "vpav", que esta vazia no html! Um alert já customizado via Bootstrao!
			Voces precisam apenas mudar a div em questão e o aviso*/
		document.getElementById("vpvCE").innerHTML = "<div class='alert alert-danger' role='alert'>Selecione um pavilhao</div>";
		flag = false;
	}	
	if(document.getElementById("pvE2").value == ""){
		/** Essa parte escreve na diva "vpav", que esta vazia no html! Um alert já customizado via Bootstrao!
			Voces precisam apenas mudar a div em questão e o aviso*/
		document.getElementById("vpvE2").innerHTML = "<div class='alert alert-danger' role='alert'>Digite um novo nome</div>";
		flag = false;
	}			
				
	return flag;
}

function pavilhao3(){
	flag = true;
	// Pega o id do que se quer conferir e faz a verificação.
	if(document.getElementById("pdel").value == "Selecione"){
		/** Essa parte escreve na diva "vpav", que esta vazia no html! Um alert já customizado via Bootstrao!
			Voces precisam apenas mudar a div em questão e o aviso*/
		document.getElementById("vpdel").innerHTML = "<div class='alert alert-danger' role='alert'>Selecione um pavilhao</div>";
		flag = false;
	}				
				
	return flag;
}



function addsms(id,sms){
	id.innerHTML = "<div class='alert alert-danger' role='alert'>"+sms+"</div>";
}

function sair(f){
	document.getElementById(f).submit();
}