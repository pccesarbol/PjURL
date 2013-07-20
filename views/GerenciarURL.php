<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Manter URL'S</title>
        <link href="../views/css/bootstrap.css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="views/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="views/css/pc.css" rel="stylesheet">
        
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="../views/js/bootstrap.js"></script>
        <script src="../views/js/url.js"></script>
        
        <link rel="shortcut icon" href="../views/img/favicon.ico" >
        
    </head>
    <body>
         <?php
          @session_start();
          
          include '../views/menu.php';
          include '../dao/GerenciarURLDAO.php';
          
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
            <form name="FrmManterUrl" class="form-signin" method="post" action="../controler/GerenciarURLControler.php">  
                <input type="hidden" name="acao" value="">
                <input type="hidden" name="idUrl" value="">
                
                <fieldset>
                    <legend style="color: #a47e3c; background-color: lavender;"><b>Lista das URL'S cadastradas</b></legend>
                    <table class="table table-hover table-bordered">
                        <thead> 
                            <tr style="color: #ffffff; background-color: darkblue;">
                                <th><center>URL</center></th>
                            <th><center>Máquina</center></th>
                            <th><center>Tem login</center></th>
                            <th><center>Ativa</center></th>
                            <th><center>Atualização</center></th>
                            <th><center>Editar</center></th>
                            <th><center>Excluir</center></th>
                        </tr> 
                      </thead>    
                        <?php
                          $dao   = new GerenciarURLDAO(); 
                          $dados = $dao->recuperarTodasURLs();
                          if($dados >= 1){
                              $tem = true;
                              for ($i = 0; $i < $dados; $i++) {
                        ?>
                      <tbody>
                                    <tr class="info">
                                       <td>&nbsp;&nbsp;<?php echo $dao->result($i, 0); ?></td>
                                       <td><center>&nbsp;&nbsp;<?php echo $dao->result($i, 1); ?></center></td>
                                       <td><center><?php echo $dao->result($i, 2); ?></center></td>
                                       <td><center><?php echo $dao->result($i, 3); ?></center></td>
                                       <td><center><?php echo $dao->result($i, 4); ?></center></td>
                                       <td><center>
                                           <a href='javascript:editarUrl(document.FrmManterUrl, "<?php echo $dao->result($i, 5); ?>");'>
                                               <img src="../views/img/png/2.png" class="img-rounded">
                                           </a></center>
                                       </td>
                                       <td><center>
                                           <a href='javascript:excluirUrl(document.FrmManterUrl, "<?php echo $dao->result($i, 5); ?>");'>
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
                            <b>Atenção! Não existe URL cadastrada no sistema.</b>
                        </div>
                    
                    <?php
                       }
                    ?>
                    <hr/>
                    <button type="button" class="btn" onclick="javascript:exibirIncluirUrl(document.FrmManterUrl);" >Incluir nova URL</button>&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn" onclick="javascript:home(document.FrmManterUrl);">Voltar(Tela Anterior)</button>
               </fieldset>
                
               
            </form>      
        </div>
         <BR/><BR/><BR/><BR/><BR/><BR/>
        <?php
            include 'Rodape.php';
          ?>
    </body>
</html>
