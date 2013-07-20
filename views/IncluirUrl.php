<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SisURLWeb - Incluir Url's</title>
        
         <link href="../views/css/bootstrap.css" rel="stylesheet" media="screen">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="views/css/bootstrap-responsive.css" rel="stylesheet">
         <link href="views/css/pc.css" rel="stylesheet">
        
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="../views/js/bootstrap.js"></script>
        <script src="../views/js/url.js"></script>
        
        <link rel="shortcut icon" href="../views/img/favicon.ico" >
        
    </head>
    <body onload="document.FrmUrl.url.focus();">
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
            <form name="FrmUrl" class="form-signin" method="post" action="../controler/GerenciarURLControler.php">  
                <input type="hidden" name="acao" value="">
                <fieldset>
                    <legend style="color: #a47e3c; background-color: lavender;"><b>Incluir nova URL</b></legend>
                    <label>* - Url</label>
                    <textarea name="url" cols="95" rows="3" placeholder="Digite a url..."></textarea>
                    <label>* - Estação de trabalho</label>
                    <select name='maquina'>
                       <option value=''>Selecione...</option> 
                       <option value='Est_01'>Máquina 01</option>
                       <option value='Est_02'>Máquina 02</option>
                       <option value='Est_03'>Máquina 03</option>
                       <option value='Est_04'>Máquina 04</option>
                    </select>
                    <label>* - Tem login?</label>
                        <input type='radio' name='temLogin' id='temLoginNao' value='N' checked="checked"/>Não
                        &nbsp;&nbsp;
                        <input type='radio' name='temLogin' id='temLoginSim' value='S' />Sim
                                       
                    <label>* - Url Ativa?</label>
                        <input type='radio' name='urlAtiva' id='urlAtivaNao' value='N' checked="checked"/>Não
                        &nbsp;&nbsp;
                        <input type='radio' name='urlAtiva' id='urlAtivaSim' value='S' />Sim
                    <label>Login</label>
                    <input type="text" name="login" placeholder="Digite seu login"/>
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Digite a sua senha"/>
                    
                    <span class="help-block" style='color:red;'>(*) - Atenção! Os campos acima são obrigatórios.</span>
                    
                    <button type="button" class="btn" onclick="javascript:salvarInclusaoURL(document.FrmUrl)">Salvar inclusão</button>
                    &nbsp;&nbsp;
                    <button type="button" class="btn" onclick="javascript:gerenciarUrl(document.FrmUrl);" >Voltar (Tela anterior)</button>
                </fieldset>
        </div>
        
        <?php
               include 'Rodape.php';
             ?>
    </body>
</html>
