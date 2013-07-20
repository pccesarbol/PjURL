<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../views/css/bootstrap.css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="views/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="views/css/pc.css" rel="stylesheet">
        
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="../views/js/bootstrap.js"></script>
        <script src="../views/js/usuario.js"></script>
        <link rel="shortcut icon" href="../views/img/favicon.ico" >
        
        <title>Menu do sistema - Tela Principal</title>
    </head>    
    <body class="">
     <form name="FrmTelaPrincipal" class="form-signin" method="post" action="../controler/UsuarioControler.php">  
       <input type="hidden" name="acao" value=""/> 
       <?php 
         include 'Topo.php';
       ?>
        <div class="container-fluid">   
            <table> 
            <tr>
                <td>
                        <ul class="nav nav-tabs">
                           <li class="active">
                             <a href="javascript:home(document.FrmTelaPrincipal);">Início</a>
                           </li>
                           <li><a href="javascript:manterUsuario(document.FrmTelaPrincipal);">Gestão de  Usuários</a></li>
                           <li><a href="javascript:manterURL(document.FrmTelaPrincipal);">Gerenciamento de URL</a></li>
                           <li><a href="../index.php">Sair</a></li>           
                        </ul>
                  </td>
                   <td>
                      <img src="img/footer_form_bg.jpg" width="80px" height="10px">
                  </td>
                </tr>
            </table>           
        </div>       
      </form>
    </body>
</html>
