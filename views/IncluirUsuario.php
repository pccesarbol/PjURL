<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SisURLWeb - Incluir Usuário</title>
        
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
          @session_start();
          
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
                    <legend style="color: #a47e3c; background-color: lavender;"><b>Incluir novo usuário</b></legend>
                    <label>* - Login</label>
                    <input type="text" name='login' placeholder="Digite nome de usuário">
                    <label>* - Perfil</label>
                    <select name='perfil'>
                       <option value=''>Selecione...</option> 
                       <option value='Administrador'>Administrador</option>
                       <option value='Cliente'>Cliente</option>
                    </select>
                    <label>* - Senha</label>
                    <input type="password" name='senha' placeholder="Digite a sua senha">
                    <label>* - Confirmar senha</label>
                    <input type="password" name='confirmarSenha' placeholder="Redigite a sua senha">
                    <span class="help-block" style='color:red;'>(*) - Atenção! Os campos acima são obrigatórios.</span>
                    
                    <button type="button" class="btn" onclick="javascript:salvarInclusão(document.FrmManterUsuarios)">Salvar inclusão</button>
                    &nbsp;&nbsp;
                    <button type="button" class="btn" onclick="javascript:manterUsuario(document.FrmManterUsuarios);" >Voltar (Tela anterior)</button>
                </fieldset>
        </div>
        
        <?php
               include 'Rodape.php';
             ?>
    </body>
</html>
