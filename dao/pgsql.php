<?php

$porta    = "5432";
$banco    = "pccesara_qualisusdb";
$usuario  = "pccesara";
$senha    = "pcn@196ra6";

$conexao = pg_connect("port=$porta dbname=$banco user=$usuario password=$senha") or die("Nao Conectado");

$sql = "SELECT * FROM tb_uf";
$result = pg_exec($conexao, $sql);

////* Escreve resultados até que não haja mais linhas na tabela */

for($i=0;
$consulta = @pg_fetch_array($result, $i); $i++) {
print "Coluna1: $consulta[0] - Coluna2: $consulta[1]<br>";
}

pg_close($conexao);


?>
