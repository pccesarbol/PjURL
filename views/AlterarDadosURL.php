<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
  include '../dao/GerenciarURLDAO.php';
  
  //-- iniciando a sessão --//
  @session_start();
  
  $idUrl = isset($_SESSION['idUrl']) ? $_SESSION['idUrl'] : '';
  
  $dao = new GerenciarURLDAO();
 
  $dados = $dao->recuperarUrlPorIde($idUrl);
  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SisURLWeb - Alterar os dados da Url's</title>
        
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
                    <legend style="color: #a47e3c; background-color: lavender;"><b>Alterar dados da URL</b></legend>
                    <label>* - Url</label>
                    <textarea name="url" cols="95" rows="3" >
                        <?php if($dao->linhas() >= 1){echo $dao->result(0, 0); }else{ echo '';} ?>
                    </textarea>
                    <label>* - Estação de trabalho</label>
                    <select name='maquina'>
                       <option value='Est_01' <?php if(($dao->linhas() >= 1) && ($dao->result(0, 1) == 'Est_01')){echo 'selected';} ?> >Máquina 01</option>
                       <option value='Est_02' <?php if(($dao->linhas() >= 1) && ($dao->result(0, 1) == 'Est_02')){echo 'selected';} ?> >Máquina 02</option>
                       <option value='Est_03' <?php if(($dao->linhas() >= 1) && ($dao->result(0, 1) == 'Est_03')){echo 'selected';} ?> >Máquina 03</option>
                       <option value='Est_04' <?php if(($dao->linhas() >= 1) && ($dao->result(0, 1) == 'Est_04')){echo 'selected';} ?> >Máquina 04</option>
                    </select>
                    <label>* - Tem login?</label>
                        <input type='radio' name='temLogin' id='temLoginNao' value='N' <?php if(($dao->linhas() >= 1) && ($dao->result(0, 2) == 'N')){echo 'checked="checked"';} ?> />&nbsp;Não
                        &nbsp;&nbsp;
                        <input type='radio' name='temLogin' id='temLoginSim' value='S' <?php if(($dao->linhas() >= 1) && ($dao->result(0, 2) == 'S')){echo 'checked="checked"';} ?> />&nbsp;Sim
                                       
                    <label>* - Ativar Url?</label>
                        <input type='radio' name='urlAtiva' id='urlAtivaNao' value='N' <?php if(($dao->linhas() >= 1) && ($dao->result(0, 3) == 'N')){echo 'checked="checked"';} ?> />&nbsp;Não
                        &nbsp;&nbsp;
                        <input type='radio' name='urlAtiva' id='urlAtivaSim' value='S' <?php if(($dao->linhas() >= 1) && ($dao->result(0, 3) == 'S')){echo 'checked="checked"';} ?> />&nbsp;Sim
                    <label>Login</label>
                    <input type="text" name="login" placeholder="Digite seu login" value="<?php if($dao->linhas() >= 1){echo $dao->result(0, 7); }else{ echo '';} ?>" />
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Digite sua senha" value="<?php if($dao->linhas() >= 1){echo $dao->result(0, 8); }else{ echo '';} ?>" />
                    
                    <span class="help-block" style='color:red;'>(*) - Atenção! Os campos acima são obrigatórios.</span>
                    
                    <button type="button" class="btn" onclick="javascript:salvarAlteracaoURL(document.FrmUrl)">Salvar alteração</button>
                    &nbsp;&nbsp;
                    <button type="button" class="btn" onclick="javascript:gerenciarUrl(document.FrmUrl);" >Voltar (Tela anterior)</button>
                </fieldset>
        </div>
        
        <?php
               include 'Rodape.php';
             ?>
    </body>
</html>
