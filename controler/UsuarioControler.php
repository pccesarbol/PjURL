<?php

    //-- adicionando as classe --//
    include '../dao/AutenticarUsuarioDAO.php';
    include 'Util.php';
    
    
    //-- Definindo as variaveis --//
    $acao = $_POST['acao'];
   
    //-- Definindo os redirecionamentos --//
    $FORWARD_TELA_PRINCIPAL  = '../views/TelaPrincipal.php';
    $FORWARD_MANTER_USUARIOS = '../views/ManterUsuario.php';
    $FORWARD_INCLUIR_USUARIO = '../views/IncluirUsuario.php';
    $FORWARD_EDITAR_DADOS_USUARIO = '../views/AlterarDadosUsuario.php';
    $FORWARD_GERENCIAR_URL        = '../views/GerenciarURL.php';
        
    /**
     * Autor: Paulo Augusto
     * Data: 18/05/2013 as 11hs16min
     * Autenticar usuário no sistema
     * **/
    if($acao == 'AutenticarUsuario'){
         //tratamento de excessoes
        try {
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            
            $dao   = new AutenticarUsuarioDAO();

            $res = $dao->autenticarUsuario($login, $senha);
            if($res >= 1){
                //-- Chamar a tela principal do sistema --//
                redirecionar($FORWARD_TELA_PRINCIPAL, 0);
                
            }else{
                //-- msg de erro na sessão --//
                echo '<br/>erro autenticacao';
            } 
            
        }
        catch (Exception $e) {
            //se der erro mostra na tela
            //
            echo '<br/>não autentiquei o usuário pc.';
            //echo $e->getMessage();
        }
    }
    
    /**
     * Voltando para HOME
     * Autor: Paulo Augusto
     * Data: 18/05/2013
     * **/
    if($acao == 'HOME'){
        redirecionar($FORWARD_TELA_PRINCIPAL, 0);
    }
    
    /**
     * Chamando a tela de manter usuários
     * Autor: Paulo Augusto
     * Data: 18/05/2013
     * **/
    if($acao == 'MANTER_USUARIO'){
        //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);
        unset($_SESSION["idUsuario"]);
        
        //-- exibe a tela de mante usuários --//
        redirecionar($FORWARD_MANTER_USUARIOS, 0);
    }
    
    /**
     * Chamar a tela de inclusão de usuário
     * Autor: Paulo Augusto
     * Data: 18/05/2013
     * **/
    if($acao == 'INCLUIR_NOVO_USUARIO'){
        //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);
        
        redirecionar($FORWARD_INCLUIR_USUARIO, 0);
    }
    
    /**
     * Salvar a inclusão do novo usuário
     * Autor: Paulo Augu
     * Data: 18/05/2013
     * **/
    if($acao == 'SALVAR_INCLUSAO'){
        //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);
        
        //-- pegando os campos da tela --/
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $perfil= $_POST['perfil'];
        $data  = date('d/m/y H:i:s');
        
        //-- Criando um objeto da classe autenticar usuariio dao--//
        $dao = new AutenticarUsuarioDAO();
        
        //-- Salvando a inclusão do novo usuário  --//
        if(!$dao->jaCadastradoUsuario($login)){
            //-- Salvar o novo usuário --//
            if($dao->salvarInclusao($login, $senha, $perfil, $data)){
                  
                  $_SESSION['msgSucesso'] = 'Atenção! O novo usuário foi salvo com sucesso.';
                  redirecionar($FORWARD_MANTER_USUARIOS, 0);
            
            }else{
                 $_SESSION['msgErro'] = 'Atenção! Não foi posível salvar o novo usuário. Operação inválido.';
                 redirecionar($FORWARD_INCLUIR_USUARIO, 0);            
            }
        
        }else{
            //-- msg de erro para o usuário  -//
            $_SESSION['msgErro'] = 'Atenção! O usuário informado já esta cadastrado no sistema. Operação inválido.';
            redirecionar($FORWARD_INCLUIR_USUARIO, 0);
        }
    }
    
    /**
     * Excluir usuário
     * Autor: Paulo Augusto
     * Data: 18/05/2013
     * **/
    if($acao == 'EXCLUIR_USUARIO'){
        //-- Pegandoo id do usuário --//
        $idUsuario = $_POST['idUsuario'];
        
        //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);
        
        //-- Criando um objeto da classe autenticar usuariio dao--//
        $dao = new AutenticarUsuarioDAO();
        
        if($dao->excluirUsuario($idUsuario)){
            $_SESSION['msgSucesso'] = 'Atenção! O usuário selecionado foi excluído com sucesso.';
            redirecionar($FORWARD_MANTER_USUARIOS, 0);
                  
        }else{
            $_SESSION['msgErro'] = 'Atenção! Não foi posível excluir o usuário selecionado. Operação inválido.';
            redirecionar($FORWARD_INCLUIR_USUARIO, 0);    
        }
        
        redirecionar($FORWARD_MANTER_USUARIOS, 0);
    }
    
    /**
     * Autor: Paulo Augusto
     * Data: 18/05/2013
     * Editar dados do usuário
     * **/
    if($acao == 'EDITAR_DADOS_USUARIO'){
        //-- Pegandoo id do usuário --//
        $idUsuario = $_POST['idUsuario'];
        
        //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);
        
        $_SESSION['idUsuario'] = $idUsuario;
        
        redirecionar($FORWARD_EDITAR_DADOS_USUARIO, 0);
    }
    
    /**
     * SALVAR ALTERAÇÃO DOS DADOS DO USUÁRIO
     * AUTOR: PAULO AUGUSTO
     * DATA: 18/05/2013
     * **/
    if($acao == 'SALVAR_ALTERACAO'){
        //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);
        
        //-- pegando os campos da tela --/
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $perfil= $_POST['perfil'];
        $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : $_SESSION['idUsuario'];
        $data  = date('d/m/y H:i:s');
        
        //-- Criando um objeto da classe autenticar usuariio dao--//
        $dao = new AutenticarUsuarioDAO();
        
        //-- Salvando a altercação dos dados do usuário  --//
        if($dao->salvarAlteracao($login, $senha, $perfil, $data, $idUsuario)){

              $_SESSION['msgSucesso'] = 'Atenção! Os dados do usuário foram alterados com sucesso.';
              redirecionar($FORWARD_MANTER_USUARIOS, 0);

        }else{
             $_SESSION['msgErro'] = 'Atenção! Não foi posível salvar a alteração dos dados do usuário. Operação inválido.';
             redirecionar($FORWARD_INCLUIR_USUARIO, 0);            
        }        
        
    }
    
    /**
     * Gerenciar as URL'S
     * Data - 20/05/2013
     * Autor Paulo Augusto
     * **/
    if($acao == 'GERENCIAR_URL'){
        //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);
        
        redirecionar($FORWARD_GERENCIAR_URL, 0);
    }
    
    
?>
