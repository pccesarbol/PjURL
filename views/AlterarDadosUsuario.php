<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
  include '../dao/AutenticarUsuarioDAO.php';
  
  //-- iniciando a sessão --//
  @session_start();
  
  $idUsuario = isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : '';
  
  $dao = new AutenticarUsuarioDAO();
 
  $dados = $dao->recuperarUsuarioPorId($idUsuario);
  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SisURLWeb - Alterar Dados do Usuário</title>
        
         <link href="../views/css/bootstrap.css" rel="stylesheet" media="screen">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="views/css/bootstrap-responsive.css" rel="stylesheet">
         <link href="views/css/pc.css" rel="stylesheet">
        
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="../views/js/bootstrap.js"></script>
        <script src="../views/js/usuario.js"></script>
        
        <link rel="shortcut icon" href="../views/img/favicon.ico" >
        
    </head>
    <body onload="document.FrmManterUsuarios.login.focus();">
        <?php
         
          
          include '../views/menu.php';
          
          $msgErro = isset($_SESSION['msgErro'])?$_SESSION['msgErro']:'';
          
          if($msgErro != ''){
        ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>Erro no cadastro!</h4>
                <?php
                   echo $msgErro;
                ?> 
            </div>
        <?php
          }
        ?>
        <div class='container-fluid'>
            <form name="FrmManterUsuarios" class="form-signin" method="post" action="../controler/UsuarioControler.php">  
                <input type="hidden" name="acao" value="">
                <fieldset>
                    <legend style="color: #a47e3c; background-color: lavender;"><b>Alterar dados do usuário</b></legend>
                    <label>* - Login</label>
                    <input type="text" name='login' value="<?php if($dao->linhas() >= 1){echo $dao->result(0, 1); }else{ echo '';} ?>" />
                    <label>* - Perfil</label>
                    <select name='perfil'>
                        <option value='Administrador' <?php if(($dao->linhas() >= 1) && ($dao->result(0, 3) == 'Administrador')){echo 'selected';} ?> >Administrador</option>
                       <option value='Cliente' <?php if(($dao->linhas() >= 1) && ($dao->result(0, 3) == 'Cliente')){echo 'selected';} ?>>Cliente</option>
                    </select>
                    <label>* - Senha</label>
                    <input type="password" name='senha' value="<?php if($dao->linhas() >= 1){echo $dao->result(0, 4); }else{ echo '';} ?>">
                    <label>* - Confirmar senha</label>
                    <input type="password" name='confirmarSenha' value="<?php if($dao->linhas() >= 1){echo $dao->result(0, 4); }else{ echo '';} ?>">
                    <span class="help-block" style='color:red;'>(*) - Atenção! Os campos acima são obrigatórios.</span>
                    
                    <button type="button" class="btn" onclick="javascript:salvarAlteracao(document.FrmManterUsuarios)">Salvar alteração</button>
                    &nbsp;&nbsp;
                    <button type="button" class="btn" onclick="javascript:manterUsuario(document.FrmManterUsuarios);" >Voltar (Tela anterior)</button>
                </fieldset>
        </div>
        
        <?php
               include 'Rodape.php';
             ?>
    </body>
</html>
