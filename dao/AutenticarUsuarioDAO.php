<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include('Conexao.php');// inclui a class

/**
 * Description of AutenticarUsuarioDAO
 *
 * @author pccesaraugusto
 */
class AutenticarUsuarioDAO extends Conexao {
    
    /**
     * Autor: Paulo Augusto
     * Data: 18/05/2013 as 11hs05min
     * Autenticar usuário no sistema
     * **/
    public function autenticarUsuario($login, $senha){
        $sql = "Select a.dt_cadastro,
                        a.login,
                        a.nu_seq_usuario,
                        a.perfil
                 From tabusuario a
                 WHERE upper(a.login) = upper('".$login."')
                 AND   upper(a.senha) = upper('".$senha."')";
         
         //-- Abrindo a conexão --//
         $this->open(); 
                
         //-- Executando o SQL no banco de dados --// 
         $this->query($sql);
         
         //-- Retornando o resultado --//
         return $this->linhas();
        
    }
    
    /**
     * Recuperar todos os usuários
     * Autor: Paulo Augusto
     * data:19/05/2013
     * **/
    public function recuperarTodosUsuarios(){
         $sql = "Select a.dt_cadastro,
                        a.login,
                        a.nu_seq_usuario,
                        a.perfil
                 From tabusuario a
                 ORDER BY a.login";
         
         //-- Abrindo a conexão --//
         $this->open(); 
                
         //-- Executando o SQL no banco de dados --// 
         $this->query($sql);
         
         //-- Retornando o resultado --//
         return $this->linhas();
    }
    
    /**
     * Autor: Paulo Augusto
     * verificando se o usuário já esta cadastrado
     * Data: 18/05/2013
     * **/
    public function jaCadastradoUsuario($login){
         $pode = false;
         
         $sql = "Select a.dt_cadastro,
                        a.login,
                        a.nu_seq_usuario,
                        a.perfil
                 From tabusuario a
                 WHERE upper(a.login) = upper('".$login."')";       
                  
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
     * Data: 18/05/2013 
     * Salvar inclusão do novo usuário
     * **/
    public function salvarInclusao($login, $senha, $perfil, $data){
        $salvou = false;
        
        $sql = "Insert Into tabusuario(login, senha, perfil, dt_cadastro)
                values('$login','$senha', '$perfil', '$data')";
        
                  
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
     * Data: 18/05/2013 
     * Excluir usuário do sistema
     * **/
    public function excluirUsuario($idUsuario){
        $excluir = false;
        
        $sql = "DELETE FROM tabusuario WHERE nu_seq_usuario = ".$idUsuario;
        
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
     * Recuperar usuário por id
     * Autor: Paulo Augusto
     * Data: 18/05/2013
     * **/
    public function recuperarUsuarioPorId($idUsuario){
        $sql = "Select a.dt_cadastro,
                        a.login,
                        a.nu_seq_usuario,
                        a.perfil,
                        a.senha
                 From tabusuario a
                 WHERE a.nu_seq_usuario = ".$idUsuario;
        
         //-- Abrindo a conexão --//
         $this->open(); 
                
         //-- Executando o SQL no banco de dados --// 
         $this->query($sql);
         
         //-- Retornando o resultado --//
         return $this->linhas();
    }
    
    /**
     * Salvando a alteração dos dados do usuário
     * Autor: Paulo Augusto
     * Data: 18/05/2013
     * **/
    public function salvarAlteracao($login, $senha, $perfil, $data, $idUsuario){
        $salvou = false;
        
        $sql = "Update tabusuario Set login = '$login', senha = '$senha', perfil = '$perfil', 
                dt_cadastro = '$data' WHERE nu_seq_usuario = $idUsuario";        
                  
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
