<?php
header('Content-type: application/x-javascript.js');
require_once 'ConexaoMysql.php';

//$con = ConexaoMysql::getInstance();
$dados = array();
mysql_connect(ConexaoMysql::HOST, ConexaoMysql::USER, ConexaoMysql::PASS);
mysql_select_db(ConexaoMysql::DB);

$resultado = mysql_query("SELECT * FROM usuario");
while ($linha = mysql_fetch_object($resultado)){
	
	$dados[] = $linha;
}
$retorno = json_encode($dados);
echo $_REQUEST['callback'].'('.$retorno.')';
?>
