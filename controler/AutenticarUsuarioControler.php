<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '/dao/AutenticarUsuarioDAO.php';

/**
 * Description of AutenticarUsuarioControler
 *
 * @author pccesaraugusto
 */
class AutenticarUsuarioControler {
    public $msgErro     = '';
    public $msgSucesso  = '';
    
    /**
     * Autor: Paulo Augusto
     * Data: 18/05/2013 as 11hs16min
     * Autenticar usuário no sistema
     * **/
    public function autenticarUsuario($login, $senha){
        //tratamento de excessoes
        try {
           // session_start();             
           
            $dao = new AutenticarUsuarioDAO();

            $res = $dao->autenticarUsuario($login, $senha);
            if($res >= 1){
                echo '<br/>autentiquei o usuário pc';
            }else{
                echo '<br/>naõ foi possivel autenticar o usuário';
            } 
            
        }
        catch (Exception $e) {
            //se der erro mostra na tela
            //
            echo '<br/>não autentiquei o usuário pc.';
            //echo $e->getMessage();
        }
    }
}

?>
