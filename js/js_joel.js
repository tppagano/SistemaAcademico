
/** 
	funções em Javascript devem ser escritas, recomendo que cada pessoas criei nessa mesma pasta arquivos  do arquivo js.js diferentes. 
	Para na hora de der os commits no github não haver problemas.

	Depois que criarem lembrem de referenciar essas os arquivo. js no arquivo head.html.


	Esta já pode ser considera a minha =)
*/


/** Função padrão para validação em js*/

function semestre(){
	flag = true;
	// Pega o id do que se quer conferir e faz a verificação.
	if(document.getElementById("sem").value == ""){
		/** Essa parte escreve na diva "vpav", que esta vazia no html! Um alert já customizado via Bootstrao!
			Voces precisam apenas mudar a div em questão e o aviso*/
		document.getElementById("vsem").innerHTML = "<div class='alert alert-danger' role='alert'>Digite um semestre válido\nEx: 2015.1</div>";
		flag = false;
	}else{
		document.getElementById("vsem").innerHTML = "";
	}		
				
	return flag;
}

function semestre_rm(){
	flag = true;
	// Pega o id do que se quer conferir e faz a verificação.
	if(document.getElementById("sem_rm").value == "Selecione..."){
		/** Essa parte escreve na diva "vpav", que esta vazia no html! Um alert já customizado via Bootstrao!
			Voces precisam apenas mudar a div em questão e o aviso*/
		document.getElementById("vsem").innerHTML = "<div class='alert alert-danger' role='alert'>Selecione um semestre\nEx: 2015.1</div>";
		flag = false;
	}else{
		document.getElementById("vsem").innerHTML = "";
	}			
				
	return flag;
}

function semestre_alt(){
	flag = true;
	// Pega o id do que se quer conferir e faz a verificação.
	if(document.getElementById("sem_alt").value == "Selecione..."){
		/** Essa parte escreve na diva "vpav", que esta vazia no html! Um alert já customizado via Bootstrao!
			Voces precisam apenas mudar a div em questão e o aviso*/
		document.getElementById("vsem1").innerHTML = "<div class='alert alert-danger' role='alert'>Selecione um semestre\nEx: 2015.1</div>";
		flag = false;
	}else{
		document.getElementById("vsem1").innerHTML = "";
	}

	if(document.getElementById("sem_alt_new").value == ""){
		/** Essa parte escreve na diva "vpav", que esta vazia no html! Um alert já customizado via Bootstrao!
			Voces precisam apenas mudar a div em questão e o aviso*/
		document.getElementById("vsem2").innerHTML = "<div class='alert alert-danger' role='alert'>Digite um semestre\nEx: 2015.1</div>";
		flag = false;
	}else{
		document.getElementById("vsem2").innerHTML = "";
	}		
				
	return flag;
}

function turma_alt(){
	flag = true;

	if(document.getElementById("turma").value == ""){
		document.getElementById("vturma1").innerHTML = "<div class='alert alert-danger' role='alert'>Digite um nome para tumra\nEx: T01</div>";
		flag = false;
	}else{
		document.getElementById("vturma1").innerHTML = "";
	}

	if(document.getElementById("siape").value == ""){

		document.getElementById("vturma2").innerHTML = "<div class='alert alert-danger' role='alert'>Digite o siape do professor resposável pela turma</div>";
		flag = false;
	}else{
		document.getElementById("vturma2").innerHTML = "";
	}
				
	return flag;
}
