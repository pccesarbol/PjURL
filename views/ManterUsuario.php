<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Manter Usuários</title>
        <link href="../views/css/bootstrap.css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="views/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="views/css/pc.css" rel="stylesheet">
        
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="../views/js/bootstrap.js"></script>
        <script src="../views/js/usuario.js"></script>
        
        <link rel="shortcut icon" href="../views/img/favicon.ico" >
        
    </head>
    <body>
         <?php
          @session_start();
          
          include '../views/menu.php';
          include '../dao/AutenticarUsuarioDAO.php';
          
          $tem = false;
          
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
          
          
         $msgSucesso= isset($_SESSION['msgSucesso'])?$_SESSION['msgSucesso']:'';
          
          if($msgSucesso != ''){
        ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>Mensagem de Sucesso!</h4>
                <?php
                   echo $msgSucesso;
                ?> 
            </div>
        <?php
          }
        ?>
        <div class='container-fluid'>
            <form name="FrmManterUsuarios" class="form-signin" method="post" action="../controler/UsuarioControler.php">  
                <input type="hidden" name="acao" value="">
                <input type="hidden" name="idUsuario" value="">
                
                <fieldset>
                    <legend style="color: #a47e3c; background-color: lavender;"><b>Lista dos usuários cadastrados</b></legend>
                    <table class="table table-hover table-bordered">
                        <thead> 
                            <tr style="color: #ffffff; background-color: darkblue;">
                            <th><center>Login</center></th>
                            <th><center>Perfil</center></th>
                            <th><center>Data de Cadastro</center></th>
                            <th><center>Editar</center></th>
                            <th><center>Excluir</center></th>
                        </tr> 
                      </thead>  
                        <?php
                          $dao   = new AutenticarUsuarioDAO(); 
                          $dados = $dao->recuperarTodosUsuarios();
                          if($dados >= 1){
                              $tem = true;
                              for ($i = 0; $i < $dados; $i++) {
                        ?>
                      <tbody>
                                    <tr class="info">
                                       <td>&nbsp;&nbsp;<?php echo $dao->result($i, 1); ?></td>
                                       <td>&nbsp;&nbsp;<?php echo $dao->result($i, 3); ?></td>
                                       <td><center><?php echo $dao->result($i, 0); ?></center></td>
                                       <td><center>
                                           <a href='javascript:editarUsuario(document.FrmManterUsuarios, "<?php echo $dao->result($i, 2); ?>");'>
                                               <img src="../views/img/png/2.png" class="img-rounded">
                                           </a></center>
                                       </td>
                                       <td><center>
                                           <a href='javascript:excluirUsuario(document.FrmManterUsuarios, "<?php echo $dao->result($i, 2); ?>");'>
                                               <img src="../views/img/png/33.png" class="img-rounded">
                                           </a></center>
                                       </td>
                                   </tr>  
                         </tbody>
                        <?php
                              }//-- fim do for --//
                              $dao->close();
                          }
                        ?>
                    </table>
                     <?php
                       if(!$tem){
                          
                    ?> 
                        <hr/>
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Advertência!</h4>
                            <b>Atenção! Não existe usuário cadastrado no sistema.</b>
                        </div>
                    
                    <?php
                       }
                    ?>
                    <hr/>
                    <button type="button" class="btn" onclick="javascript:incluirNovoUsuario(document.FrmManterUsuarios);" >Incluir novo usuário</button>&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn" onclick="javascript:home(document.FrmManterUsuarios);">Voltar(Tela Anterior)</button>
               </fieldset>
            
            </form>      
        </div>
        <BR/><BR/><BR/><BR/>
        <?php
            include 'Rodape.php';
          ?>
    </body>
</html>
