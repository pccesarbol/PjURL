/**
 * Autenticar usuário
 * autor: Paulo Augusto
 * Data: 18/05/2013
 * **/
function autenticarUsuario(frm){
   if(frm.login.value == ""){
       alert('Atenção! Informe seu nome de usuário é obrigatório.');
       frm.login.focus();
       return false;
       
   }else if(frm.senha.value == ''){
       alert('Atenção! Informe a sua senha é obrigatório.');
       frm.senha.focus();
       return false;
       
   }else{
       if(confirm('Atenção! Deseja entrar no sistema?')){
           frm.submit();
       }
   } 
}

/**
 * Chamando tela principal
 * **/
function home(frm){
    frm.acao.value = 'HOME';
    frm.submit();
}

/**
 * Manter usuários
 * **/
function manterUsuario(frm){
    frm.acao.value = 'MANTER_USUARIO';
    frm.submit();
}

/**
 * Chamando tela de incluir novo usuário
 * **/
function incluirNovoUsuario(frm){
    frm.acao.value = 'INCLUIR_NOVO_USUARIO';
    frm.submit();
}

/**
 * salvar a inclusão do novo usuários
 * **/
function salvarInclusão(frm){
    if(frm.login.value == ''){
        alert('Atenção! O seu nome de usuário (login) é obrigatório.');
        frm.login.focus();     
         
    }else if(frm.perfil.value == ''){
        alert('Atenção! Selecione um dos perfis é obrigatório.');
        frm.perfil.focus();        
        
    }else if(frm.senha.value == ''){
        alert('Atenção! A sua senha é obrigatória.');
        frm.senha.focus();
        
    }else if(frm.confirmarSenha.value == ''){
        alert('Atenção! Redigite a sua senha é obrigatório.');
        frm.confirmarSenha.focus();
        
    }else if(frm.senha.value != frm.confirmarSenha.value){
        alert('Atenção! A senha confirmada não esta igual a senha digitada.');
        frm.senha.focus();
        
    }else{
        if(confirm('Atenção! Deseja salvar a inclusão do novo usuários?')){
            frm.acao.value = 'SALVAR_INCLUSAO';
            frm.submit();
        }
    }
}

/**
 * Excluir usuário
 * Autor: Paulo Augusto
 * Data: 18/05/2013
 * **/
function excluirUsuario(frm, id){
    if(confirm('Atenção! Deseja excluir o usuário selecionado?')){
        frm.acao.value      = 'EXCLUIR_USUARIO';
        frm.idUsuario.value = id;
        frm.submit();
    }
}


/**
 * Excluir usuário
 * Autor: Paulo Augusto
 * Data: 18/05/2013
 * **/
function editarUsuario(frm, id){
    if(confirm('Atenção! Deseja editar os dados do usuário selecionado?')){
        frm.acao.value      = 'EDITAR_DADOS_USUARIO';
        frm.idUsuario.value = id;
        frm.submit();
    }
}

/**
 * Salvar alteração
 * Autor: Paulo Augusto
 * Data: 18/05/2013
 * **/
function salvarAlteracao(frm){
     if(frm.login.value == ''){
        alert('Atenção! O seu nome de usuário (login) é obrigatório.');
        frm.login.focus();     
         
    }else if(frm.perfil.value == ''){
        alert('Atenção! Selecione um dos perfis é obrigatório.');
        frm.perfil.focus();        
        
    }else if(frm.senha.value == ''){
        alert('Atenção! A sua senha é obrigatória.');
        frm.senha.focus();
        
    }else if(frm.confirmarSenha.value == ''){
        alert('Atenção! Redigite a sua senha é obrigatório.');
        frm.confirmarSenha.focus();
        
    }else if(frm.senha.value != frm.confirmarSenha.value){
        alert('Atenção! A senha confirmada não esta igual a senha digitada.');
        frm.senha.focus();
        
    }else{
        if(confirm('Atenção! Deseja salvar a alteração dos dados do usuários?')){
            frm.acao.value = 'SALVAR_ALTERACAO';
            frm.submit();
        }
    }
}

/**
 * Chamar tela de gerenciamento de urls
 * **/
function manterURL(frm){
    frm.acao.value = 'GERENCIAR_URL';
    frm.submit();
}

