<?php

/**
 * Autor: Paulo Augusto
 * Data: 18/05/2013 
 * Função de redirecionamento
 * **/
  function redirecionar($url, $tempo) 
    { 
        $url = str_replace('&amp;', '&', $url); 

        if($tempo > 0) 
        { 
            header("Refresh: $tempo; URL=$url"); 
        } 
        else 
        { 
            @ob_flush();
            @ob_end_clean();
            header("Location: $url"); 
            exit; 
        } 
    } 
?>
