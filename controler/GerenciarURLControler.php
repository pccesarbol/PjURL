<?php

    //-- adicionando as classe --//
    include '../dao/GerenciarURLDAO.php';
    include 'Util.php';
    
    
    //-- Definindo as variaveis --//
    $acao = $_POST['acao'];
    
    //-- definindo os redirecionamentos --//
    $FORWARD_VER_TELA_INCLUIR_URL = '../views/IncluirUrl.php';
    $FORWARD_GERENCIAR_URL        = '../views/GerenciarURL.php';
    $FORWARD_EDITAR_URL           = '../views/AlterarDadosURL.php';
    $FORWARD_TELA_PRINCIPAL       = '../views/TelaPrincipal.php';
    
    /**
     * Autor Paulo Augusto
     * Data 20-05-2013
     * Ver tela de incluir nova url
     * **/
    if($acao == 'INCLUIR_NOVA_URL'){
        //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);        
        
        redirecionar($FORWARD_VER_TELA_INCLUIR_URL, 0);
    }
    
    /**
     * Autor: Paulo Augusto
     * Data: 20/05/2013
     * Incluis nova url na base de dados.
     * **/
    if($acao =='SALVAR_INCLUSAO_URL'){
        //-- iniciando a sessão --//
        session_start();
        
        //-- criando objeto da classe dao--//
        $dao = new GerenciarURLDAO();
        
        //-- Pegando os atributos da tela --//
        $url      = $_POST['url'];
        $maquina  = $_POST['maquina'];
        $temLogin = $_POST['temLogin'];
        $urlAtiva = $_POST['urlAtiva'];
        $data     = date('d/m/y H:i:s');
        $login    = $_POST['login'];
        $senha    = $_POST['senha'];
        
        //-- Verificando se a url já esta cadastrada no sistema --//
        if(!$dao->urlJaCadastrada($url)){
            //-- realizando a inclusão da nova url --//
            if($dao->salvarInclusaoURL($url, $maquina, $temLogin, $urlAtiva, $data, $login, $senha)){
                $_SESSION['msgSucesso'] = 'Atenção! A nova url foi incluída com sucesso.';
                redirecionar($FORWARD_GERENCIAR_URL, 0);
                
            }else{
                $_SESSION['msgErro'] = 'Atenção! Não foi possível salvar a inclusão da url informada. Operação inválida.';
                redirecionar($FORWARD_INCLUIR_USUARIO, 0);
            }
        }else{
            //-- msg de alerta para o usuário --//
            $_SESSION['msgErro'] = 'Atenção! A url informada já esta cadastrada. Operação inválida.';
            redirecionar($FORWARD_INCLUIR_USUARIO, 0);
        }
        
    }
    
    /**
     * Autor: Paulo Augusto
     * Data: 20/05/2013
     * Voltar tela gerenciar url
     * **/
    if($acao == 'TELA_MANTER_URL'){
         //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);        
        
        redirecionar($FORWARD_GERENCIAR_URL, 0);
    }
    
    /**
     * Autor: Paulo Augusto
     * Data: 20/05/2013
     * Excluir url selecionada.
     * **/
    if($acao == 'EXCLUIR_URL'){
        //-- iniciando a sessão --//
        session_start();
        
        $dao   = new GerenciarURLDAO();
        
        $idUrl = $_POST['idUrl'];
        
        if($dao->excluirURL($idUrl)){
            $_SESSION['msgSucesso'] = 'Atenção! A URL selecionada foi excluída com sucesso.';
                
        }else{
           //-- msg de alerta para o usuário --//
            $_SESSION['msgErro'] = 'Atenção! Não foi possível excluir a URL selecionada. Operação inválida.';
            
        }
        redirecionar($FORWARD_GERENCIAR_URL, 0);
    }
    
    /**
     * Autor: Paulo Augusto
     * Data: 20/05/2013
     * Editar os dados da url
     * **/
    if($acao == 'EDITAR_URL'){
        //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);        
        
        $idUrl = $_POST['idUrl'];
        
        $_SESSION['idUrl'] = $idUrl;
        
        redirecionar($FORWARD_EDITAR_URL, 0);
    }
    
    /**
     * Autor: Paulo Augusto
     * Data: 20/05/2013
     * Salvar alteração dos dados da URL
     * **/
    if($acao == 'SALVAR_ALTERACAO_URL'){
        //-- iniciando a sessão --//
        session_start();
        
        //-- Removendo as variaveis da sessão  --//
        unset($_SESSION["msgSucesso"]);
        unset($_SESSION["msgErro"]);        
        
        $idUrl = $_SESSION['idUrl'];
        
        //-- criando objeto da classe dao--//
        $dao = new GerenciarURLDAO();
        
        //-- Pegando os atributos da tela --//
        $url      = $_POST['url'];
        $maquina  = $_POST['maquina'];
        $temLogin = $_POST['temLogin'];
        $urlAtiva = $_POST['urlAtiva'];
        $data     = date('d/m/y H:i:s');
        $login    = $_POST['login'];
        $senha    = $_POST['senha'];
        
        //-- realizando a inclusão da nova url --//
        if($dao->salvarAlteracaoURL($url, $maquina, $temLogin, $urlAtiva, $data, $login, $senha, $idUrl)){
            $_SESSION['msgSucesso'] = 'Atenção! A alteração dos dados da URL foram salvos com sucesso.';
            redirecionar($FORWARD_GERENCIAR_URL, 0);

        }else{
            $_SESSION['msgErro'] = 'Atenção! Não foi possível salvar a alteração dos dados da url informada. Operação inválida.';
            redirecionar($FORWARD_EDITAR_URL, 0);
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


?>
