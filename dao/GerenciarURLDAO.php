<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include('Conexao.php');// inclui a class
/**
 * Description of GerenciarURLDAO
 *
 * @author pccesaraugusto
 */
class GerenciarURLDAO extends Conexao{
    /**
     * Recuperar todas as URLS
     * Autor: Paulo Augusto
     * Data: 20/05/2013 as 10hs32min
     * **/
    public function recuperarTodasURLs(){
        $sql = "SELECT a.url,
                        a.maquina,
                        a.temlogin,
                        a.url_ativa,
                        a.dt_cadastro,
                        a.nu_seq_url ,
                        a.nu_seq_usuario,
                        a.login,
                        a.senha
                 FROM taburl a
                 ORDER BY a.url";
        
        //-- Abrindo a conexão --//
         $this->open(); 
                
         //-- Executando o SQL no banco de dados --// 
         $this->query($sql);
         
         //-- Retornando o resultado --//
         return $this->linhas();
    }
    
    /**
     * Autor: Paulo Augusto
     * Data: 20/05/2013
     * Verificando se a url já esta cadastrada
     * **/    
    public function urlJaCadastrada($url){
        $pode = false;
        
        $sql = "SELECT a.url,
                        a.maquina,
                        a.temlogin,
                        a.url_ativa,
                        a.dt_cadastro,
                        a.nu_seq_url ,
                        a.nu_seq_usuario,
                        b.login
                 FROM taburl a, tabusuario b
                 WHERE upper(a.url) = upper('$url')";
        
        //-- Abrindo a conexão --//
         $this->open(); 
                
         //-- Executando o SQL no banco de dados --// 
         $this->query($sql);
         
         
         if($this->linhas() >= 1){
             $pode = true;
         }
         
         return $pode;       
    }
    
    /**
     * Autor: Paulo Augusto
     * Data: 20/05/2013
     * Salvar inclusão dos dados da url
     * **/
    public function salvarInclusaoURL($url, $maquina, $temLogin, $urlAtiva, $data, $login, $senha){
         $salvou = false;
        
        $sql = "Insert Into taburl(maquina, url, temLogin, url_ativa, dt_cadastro, login, senha)
                values('$maquina','$url', '$temLogin', '$urlAtiva', '$data', '$login', '$senha')";
        
                  
         //-- Abrindo a conexão --//
         $this->open(); 
                
         //-- Executando o SQL no banco de dados --// 
         $rs = $this->query($sql);
         
         
         if($rs >= 1){
             $salvou = true;
         }
         
         return $salvou;    
    }
    
    /**
     * Autor: Paulo Augusto
     * Data: 20/05/2013 
     * Excluir url do sistema
     * **/
    public function excluirURL($idUrl){
        $excluir = false;
        
        $sql = "DELETE FROM taburl WHERE nu_seq_url = ".$idUrl;
        
        //-- Abrindo a conexão --//
         $this->open(); 
                
         //-- Executando o SQL no banco de dados --// 
         $rs = $this->query($sql);
         
         
         if($rs >= 1){
             $excluir = true;
         }
         
         return $excluir; 
    }
    
    /**
     * Autor: Paulo Augusto
     * Data: 29/05/2013 as 17hs31min
     * Obter url por id
     * **/
    public function recuperarUrlPorIde($idUrl){
        $sql = "SELECT a.url,
                        a.maquina,
                        a.temlogin,
                        a.url_ativa,
                        a.dt_cadastro,
                        a.nu_seq_url ,
                        a.nu_seq_usuario,
                        a.login,
                        a.senha
                 FROM taburl a
                 WHERE a.nu_seq_url = ".$idUrl;
        
        //-- Abrindo a conexão --//
         $this->open(); 
                
         //-- Executando o SQL no banco de dados --// 
         $this->query($sql);
         
         //-- Retornando o resultado --//
         return $this->linhas();
    }
    
     /**
     * Autor: Paulo Augusto
     * Data: 20/05/2013
     * Salvar alteração dos dados da url
     * **/
    public function salvarAlteracaoURL($url, $maquina, $temLogin, $urlAtiva, $data, $login, $senha, $idUrl){
         $salvou = false;
        
         $sql = "UPDATE taburl SET maquina = '$maquina', url = '$url', 
                temLogin = '$temLogin', url_ativa = '$urlAtiva', dt_cadastro = '$data',
                login = '$login', senha = '$senha' WHERE nu_seq_url = $idUrl";        
                  
         //-- Abrindo a conexão --//
         $this->open(); 
                
         //-- Executando o SQL no banco de dados --// 
         $rs = $this->query($sql);
         
         
         if($rs >= 1){
             $salvou = true;
         }
         
         return $salvou;    
    }
    
    
}

?>
