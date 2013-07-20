<!DOCTYPE html>
<?php
   //-- Iniciando a sesão --//
   @session_start();
?>
<html lan="pt-br">
    <head>
        <meta charset="UTF-8">
        
        <link rel="shortcut icon" href="favicon.ico" >
        
        <!-- Bootstrap -->
        <link href="views/css/bootstrap.css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="views/css/bootstrap-responsive.css" rel="stylesheet">
        
        <title>SisURLWEB - Autenticar usuário</title>
        
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="views/js/bootstrap.js"></script>
        <script src="views/js/usuario.js"></script>
        
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 12px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
        
    </head>
    <body onload="document.FrmLogin.login.focus();">
        <div class="container">
            <form name="FrmLogin" class="form-signin" method="post" action="controler/UsuarioControler.php">
                <input type="hidden" name="acao" value="AutenticarUsuario"/>
                
                <h3 class="form-signin-heading" style="color: #ffffff; background-color: darkblue;"><center>Autenticar Usuário</center></h3>
                <table class="table"> 
                  <tr>
                    <td>  
                        <div class="control-group">
                          <label class="control-label" for="inputLogin" style="color: #039; background-color: silver;"><b>Usuário</b></label>
                          <div class="controls">
                              <input id="inputLogin" name="login" type="text" placeholder="Digite o seu Login..." />
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputPassword" style="color: #039; background-color: silver;"><b>Senha</b></label>
                          <div class="controls">
                              <input id="inputPassword" name="senha" type="password" placeholder="Digite a sua senha..." />
                          </div>
                        </div>
                        <div class="control-group">
                          <div class="controls">
                            <!--<label class="checkbox"><input type="checkbox" /> Lembrar senha</label>-->
                              <button style="background-color: blue; color: #ffffff;" type="button" onclick="javascript:autenticarUsuario(document.FrmLogin)">Acessar</button>
                          </div>
                        </div>
                    </td>
                  </tr>  
               </table>     
            </form>
        </div><!-- fim div contente -->    
    </body>
</html>