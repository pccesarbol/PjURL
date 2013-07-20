/**
 * Autor: Paulo Augusto
 * Data: 20/05/2013
 * Exibir tela de incluir urls
 * **/
function exibirIncluirUrl(frm){
   frm.acao.value = 'INCLUIR_NOVA_URL';
   frm.submit();
}

/**
 * Autor: Paulo Augusto
 * Data: 20/05/2013
 * Salvar inclusão das urls
 * **/
function salvarInclusaoURL(frm){
   if(frm.url.value == ''){
       alert('Atenção! Informe a url é obrigatório.');
       frm.url.focus();
   }else if(frm.maquina.value == ''){
       alert('Atenção! Informe a estação de trabalho é obrigatório.');
       frm.maquina.focus();
   }else if(frm.url.value == ''){
       alert('Atenção! Informe a url é obrigatório.');
       frm.url.focus();
       
   }else{
      if(confirm('Atenção! Deseja salvar a inclusão da nova URL?')){
          frm.acao.value = 'SALVAR_INCLUSAO_URL';
          frm.submit();
      } 
   }
}

/**
 * Voltar tela anterior
 * Autor:Paulo Augusto
 * Data: 20/05/2013
 * **/
function gerenciarUrl(frm){
    frm.acao.value = 'TELA_MANTER_URL';
    frm.submit();
}

/**
 * Autor: Paulo Augusto
 * Data: 20/05/2013
 * Excluir url
 * **/
function excluirUrl(frm, id){
    if(confirm('Atenção! Deseja excluir a url selecionada?')){
        frm.acao.value  = 'EXCLUIR_URL';
        frm.idUrl.value = id;
        frm.submit();
    }
}

/**
 * Autor: Paulo Augusto
 * Data: 20/05/2013
 * Editar os dados da URL
 * **/
function editarUrl(frm, id){
     if(confirm('Atenção! Deseja editar os dados da url selecionada?')){
        frm.acao.value  = 'EDITAR_URL';
        frm.idUrl.value = id;
        frm.submit();
    }
}

/**
 * Autor: Paulo Augusto
 * Data: 20/05/2013
 * Salvar alteração dos dados da url
 * **/
function salvarAlteracaoURL(frm){
    if(frm.url.value == ''){
       alert('Atenção! Informe a url é obrigatório.');
       frm.url.focus();
   }else if(frm.maquina.value == ''){
       alert('Atenção! Informe a estação de trabalho é obrigatório.');
       frm.maquina.focus();
   }else if(frm.url.value == ''){
       alert('Atenção! Informe a url é obrigatório.');
       frm.url.focus();
       
   }else{
      if(confirm('Atenção! Deseja salvar a alteração dos dados da URL?')){
          frm.acao.value = 'SALVAR_ALTERACAO_URL';
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