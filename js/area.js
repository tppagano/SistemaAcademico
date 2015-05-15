

function testa_cadastro(){
    var x =confirm('SORRY! VOCÊ NÃO ESTÁ CADASTRADO. DESEJA SE CADASTRAR?');
    if(x){
        window.location= 'CadastroAluno.php';
    }
}


jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
    });
});


jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
    });
});

function busca_aluno(str){
   
    
       if (str == "") {

        document.getElementById("quantidade").innerHTML = "";
        return;
    } else {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();

        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


                document.getElementById("status").innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET", "retorna_aluno.php?q=" + str, true);
        xmlhttp.send();
    }
}


function busca_terminalidade(term){
   
   window.location="status_usuario.php?q="+term;
}

function ano() {
    var ano = 2011;
    var semestre = 1;
    var option = "<option></option>";
    while (ano <= 2014) {

        option += "<option value='" + $ano + "." + $semestre + "' >" + $ano + "." + $semestre + "</option>";


        if (semestre == 2) {
            semestre = 1;
            ano++;
        } else {
            semestre = 2;
        }
    }
}

function select_altera(alt){
    if(alt==1){
        window.location= "alterarAluno.php?q=1";
    }else if(alt==2){
        window.location= "alterarAluno.php?q=2";
    }
}
function user_alter_dados(id,tipo){
  
        window.location= 'alterarAluno.php?id='+id+"&tipo="+tipo;
  
     
}

function tipoUsuario(tipo) {
    if (tipo == 1) {
        location.reload();
    }
    else if (tipo == 2) {
        document.getElementById("do_aluno").innerHTML = "\
                    <form action='facade_cadastro_admin.php' method='post' enctype='multipart/form-data' onsubmit='return subAdmin();'>" +
                "<div id='val_nome'>Nome: <br>" +
                "<input type='text' id='nome' name='nome' style='width:220px; height:22px ;'/>" +
                " </div> <br>" +
                "<div id='val_nome'>Nº Identificação: <br>" +
                "<input type='text' id='identificacao' name='identificacao' style='width:220px; height:22px ;'/>" +
                " </div> <br>" +
                "<div id='val_centro'>Centro: <br>" +
                "<input type='text' id='centro' name='centro' style='width:220px; height:22px ;'/>" +
                " </div> <br>" +
                "<div id='val_titulo'>Título: <br>" +
                "<input type='text' id='titulo' name='titulo' style='width:220px; height:22px ;'/>" +
                " </div> <br>" +
                "<div id='val_ingresso'>Ingresso: <br>" +
                "<input type='text' id='ingresso' name='ingresso' style='width:220px; height:22px ;'/>" +
                " </div> <br>" +
                "</select>" +
                " </div>" +
                " <br>" +
                "<div id='login' style='position:absolute; top: 20%; left: 30%'>  " +
                " <fieldset style='width: 250px; height: 200px;'>Definição de Login " +
                "<br><br><label  style='position: absolute; top:40px; left:20px'>Usuario</label><br>" +
                "<input type='text' name='usuario' id='usuario' value='Usuário'  maxlength='50'    style='position: absolute; top:70px; left:20px'/><br><br>" +
                "<label style='position: absolute; top:100px; left:20px'>Senha</label><br>" +
                "<input type='password' name='senha' value='123456' maxlength='50'   style='position: absolute; top:120px; left:20px'/></fieldset>" +
                "  </div> "+
        "<div style='position:absolute; top: 20%; left: 65%'> " +
                "<label>Foto Cadastro</label><br>"+
        "<input type='file' id='foto' name='foto' >" +
                "<br><br>" +
                "<input  align='center'  border='1'type='submit' id='Cadastrar' style='font-size: 16px'  name='Cadastrar' value='Confirmar Cadastro' />" +
                "</div></form>";

    }
}

//####################################################### CONFIGURAÇÃO RESPONSIVA DA PÁGINA ################################################





//############################################################################################################################


function excluir_area(str) {

    var link = str;
    var equalPosition = link.indexOf('#'); //Get the position of '='
    var str = link.substring(equalPosition + 1); //Split the string and get the number.

    if (str == "") {

        document.getElementById("prog").innerHTML = "";
        return;
    } else {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();

        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


                document.getElementById("areas").innerHTML = xmlhttp.responseText;


            }
        }

        xmlhttp.open("GET", "excluir.php?q=" + str, true);
        xmlhttp.send();
    }
}
function cadastra_term() {

    var str = document.getElementById("c_terminalidade").value;



    if (str == "") {

        document.getElementById("prog").innerHTML = "";
        return;
    } else {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();

        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


                document.getElementById("term").innerHTML = xmlhttp.responseText;


            }
        }

        xmlhttp.open("GET", "cadastrar_termin.php?q=" + str, true);
        xmlhttp.send();
    }
}
function cadastra_area() {

    var str = document.getElementById("area_nome").value;
    var sigla = document.getElementById("area_sigla").value;


    if (str == "") {

        document.getElementById("prog").innerHTML = "";
        return;
    } else {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();

        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

 document.getElementById("areas").innerHTML = xmlhttp.responseText;


            }
        }

        xmlhttp.open("GET", "cadastra_area.php?q=" + str+"&s="+sigla, true);
        xmlhttp.send();
    }
}
function alterar(str) {

     document.getElementById("term_altera").innerHTML = " <label>Digite o novo nome da Terminalidade e click em <b>ALTERAR</b><br> Alterar: "+str+"<br><br></label>\n\
                    <input type='text' name='nova_term' value='Digite o novo nome' onfocus="+"this.value='';"+">" +
            "<input type='hidden' name='term_antiga' value='"+str+"'>"+
            "<input type='submit' value='ALTERAR'>";

}
function alterar_area(area) {
    
      document.getElementById("area_altera").innerHTML = " <label>Digite o novo nome da Terminalidade e click em <b>ALTERAR</b><br> Alterar: "+area+"<br><br></label>\n\
             <input type='text' name='nova_area' value='Digite o novo nome da área' onfocus="+"this.value='';"+">" +
             "<input type='text' name='nova_sigla' value='Digite o novo nome da sigla' onfocus="+"this.value='';"+">" +
            "<input type='hidden' name='area_antiga' value='"+area+"'>"+         
            "<input type='submit' value='ALTERAR'>";


}


//#######################################################################################################################################
function sub() {

    var nome = document.getElementById('nome').value;
    var matricula = document.getElementById('matricula').value;
    var ingresso = document.getElementById('ingresso').value;
    var terminalidade = document.getElementById('terminalidade').value;
    var mesage = "";
    var cont = 4;

    flag = false;

    if (nome == "") {

        mesage += "Por favor insira um nome \n";

        cont--;
    }
    if (matricula == "") {
        mesage += "Por favor insira uma Matrícula \n";
        cont--;
    }
    if (ingresso == "") {
        mesage += "Por favor insira uma data de ingresso \n";
        cont--;
    }
    if (terminalidade == "") {
        mesage += "Por favor escolha uma terminalidade \n";
        cont--;
    }



    if (cont < 4) {
        alert(mesage);
    } else {

        flag = true;
    }


    return flag;
}
function subAdmin() {

    var nome = document.getElementById('nome').value;
    var centro = document.getElementById('centro').value;
    var titulo = document.getElementById('titulo').value;
    var ingresso = document.getElementById('ingresso').value;
    var identificacao = document.getElementById('identificacao').value;
    var usuario = document.getElementById('usuario').value;
    var senha = document.getElementById('senha').value;
    var mesage = "";
    var cont = 7;

    flag = false;

    if (nome == "") {

        mesage += "Por favor insira um nome \n";

        cont--;
    }
    if (centro == "") {
        mesage += "Por favor insira o  centro a que faz parte \n";
        cont--;
    }
    if (titulo == "") {
        mesage += "Por favor insira o seu maior título dentro da universidade \n";
        cont--;
    }
    if (ingresso == "") {
        mesage += "Por favor escolha o período de ingresso \n";
        cont--;
    }
    if (identificacao == "") {
        mesage += "Por favor escolha o seu número de identificação na instituição \n";
        cont--;
    }
    if (usuario == "") {
        mesage += "Por favor escolha o seu nome de usuário para acessar sua conta\n";
        cont--;
    }
    if (senha == "") {
        mesage += "Por favor escolha uma senha para acessar sua conta \n";
        cont--;
    }



    if (cont < 7) {
        alert(mesage);
    } else {

        flag = true;
    }


    return flag;
}
//####################################################### MENU #####################################################################   
function menu() {

    var menu = document.getElementById('menu').innerHTML =
            "  <nav  > " +
            "<ul><li>" +
            " <ul class='menu' id='menu1' >" +
            " </li>" +
            "<li><a> CADASTRO</a>" +
            " <ul><li> <a    href= 'CadastroAluno.php'   > CADASTRO ALUNO</a></li>" +
            " <li><a href='alterar_terminalidade_aluno.php' > ALTERAR TERMINALIDADE </a>" +
            "</li>" +
            " <li><a href='../Sistema_Academico/area_conhecimento.php' > AREA DE CONHECIMENTO </a>" +
            "</li>" +
            " </ul>" +
            "</li>" +
            "<li><a href= '../contatos.php' > FALE CONOSCO</a>" +
            "</li>" +
            "</ul>" +
            " </nav>" +
            " <div style='position: relative;top: 50px;  left:65%'>" +
            
            " <ul class='menu2'>" +
            "<li>  <a href='https://www.facebook.com/groups/153257128113545/' ><img  src='../../imagens/facebook2.jpg' style='width: 60px; height: 50px' /></a></li>" +
            "<li>  <a href='https://twitter.com/SILVPROJECT' ><img   src='../../imagens/twitter.png' style='width: 60px; height: 50px '/></a></li>" +
            "<li><a href = '../login.php'><b><i>LOGIN</i></b></a></li>" +
            "</ul>" +
            "</div>"
            ;

    var segundo = new Number();
    segundo = 60;
    var minuto = new Number();
    minuto = 59;
    var texto = new Number();
    texto = 11;

    if ((segundo - 1) >= 0) {
        segundo--;

        if (segundo == 0 && (minuto - 1) >= 0) {
            minuto--;
            segundo = 60;
        } else if (segundo >= 10) {
            texto = minuto + "m " + segundo + "s";
        } else if (segundo < 10) {
            texto = minuto + "m 0" + segundo + "s";
        }
        if (minuto == 0 && segundo == 0) {
            alert('SUA SESSÃO EXPIROU');
            setTimeout("window.location='../logout.php'", 5000);
        }
        tempo.innerText = texto;
        setTimeout('menu();', 1000);

    }


}



function menuAdmin() {

    var menu = document.getElementById('menu').innerHTML =
            "  <nav  > " +
            "<ul><li>" +
            " <ul class='menu' id='menu1' >" +
            " </li>" +
            "<li><a> CADASTRO</a>" +
            " <ul><li> <a    href= '../admin/CriaUsuario.php'   > NOVO USUARIO</a></li>" +
           
            " </ul>" +
            "</li>" +
            "<li><a> GERENCIAR</a>" +
            " <ul>\n\
                <li> <a    href= '../admin/terminalidade.php'   > Terminalidades</a></li>" +
                "<li> <a    href= '../admin/status_usuario.php'   > Alunos</a></li>" +
                "<li> <a    href= '../admin/alterarAluno.php'   > Alterar Usuário</a></li>" +
           
            " </ul>" +
            "</li>" +
            "<li><a href= 'contatos.php' > FALE CONOSCO</a>" +
            "</li>" +
            "</ul>" +
            " </nav>" +
            " <div style='position: relative;top: 50px;  left:65%'>" +
            " <label type='button' name='Contato'  class='user-name' style='position: absolute; left: -20%; top: -25px;'> Bem vindo!<br>" + nome +"</br></label>"+
            " <ul class='menu2'>" +
            "<li>  <a href='https://www.facebook.com/groups/153257128113545/' ><img  src='../../imagens/facebook2.jpg' style='width: 60px; height: 50px' /></a></li>" +
            "<li>  <a href='https://twitter.com/SILVPROJECT' ><img   src='../../imagens/twitter.png' style='width: 60px; height: 50px '/></a></li>" +
            "<li><a href = '../logout.php'>sair</a></li>" +
            "</ul>" +
            "</div>"
   
            ;

   

}
  
  function sessao(){
       var segundo = new Number();
    segundo = 60;
    var minuto = new Number();
    minuto = 59;
    var texto = new Number();
    texto = 11;

    if ((segundo - 1) >= 0) {
        segundo--;

        if (segundo == 0 && (minuto - 1) >= 0) {
            minuto--;
            segundo = 60;
        } else if (segundo >= 10) {
            texto = minuto + "m " + segundo + "s";
        } else if (segundo < 10) {
            texto = minuto + "m 0" + segundo + "s";
        }
        if (minuto == 0 && segundo == 0) {
            alert('SUA SESSÃO EXPIROU');
            setTimeout("window.location='../logout.php'", 5000);
        }
        tempo.innerText = texto;
        setTimeout('menu();', 1000);

    }

  }
function menu_exterior() {

         var menu = document.getElementById('menu').innerHTML =
            "  <nav  > " +
            "<ul><li>" +
            " <ul class='menu' id='menu1' >" +
            " </li>" +
            "<li><a> CADASTRO</a>" +
            " <ul><li> <a    href= 'aluno/CadastroAluno.php'   > CADASTRO ALUNO</a></li>" +
            " <li><a href='aluno/alterar_terminalidade_aluno.php' > ALTERAR TERMINALIDADE </a>" +
            "</li>" +
            " </ul>" +
            "</li>" +
            "<li><a href= 'contatos.php' > FALE CONOSCO</a>" +
            "</li>" +
            "</ul>" +
            " </nav>" +
            " <div style='position: relative;top: 50px;  left:65%'>" +
            " <ul class='menu2'>" +
            "<li>  <a href='https://www.facebook.com/groups/153257128113545/' ><img  src='../imagens/facebook2.jpg' style='width: 60px; height: 50px' /></a></li>" +
            "<li>  <a href='https://twitter.com/SILVPROJECT' ><img   src='../imagens/twitter.png' style='width: 60px; height: 50px '/></a></li>" +
            "<li><a href = 'login.php'><b><i>LOGIN</i></b></a></li>" +
            "</ul>" +
            "</div>"
            ;


    var segundo = new Number();
    segundo = 60;
    var minuto = new Number();
    minuto = 59;
    var texto = new Number();
    texto = 11;

    if ((segundo - 1) >= 0) {
        segundo--;

        if (segundo == 0 && (minuto - 1) >= 0) {
            minuto--;
            segundo = 60;
        } else if (segundo >= 10) {
            texto = minuto + "m " + segundo + "s";
        } else if (segundo < 10) {
            texto = minuto + "m 0" + segundo + "s";
        }
        if (minuto == 0 && segundo == 0) {
            alert('SUA SESSÃO EXPIROU');
            setTimeout("window.location='../logout.php'", 5000);
        }
        tempo.innerText = texto;
        setTimeout('menu();', 1000);

    }


}
  