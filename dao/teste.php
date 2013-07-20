<?PHP

$porta    = "5432";
$banco    = "pccesara_qualisusdb";
$usuario  = "pccesara_augusto";
$senha    = "pcna1966";

$conexao = pg_connect("port=$porta dbname=$banco user=$usuario password=$senha") or die("Nao Conectado");

pg_close ($conexao);

print "Conexão OK!";

?>
