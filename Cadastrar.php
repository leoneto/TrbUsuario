<?php
header('Content-type: application/json');
require_once 'ConexaoMysql.php';

$nome = $_POST['nome'];
try {
	mysql_connect(ConexaoMysql::HOST, ConexaoMysql::USER, ConexaoMysql::PASS);
	mysql_select_db(ConexaoMysql::DB);
	
	if (!mysql_query("INSERT INTO usuario (nome) VALUES ('$nome')")) {
		throw new Exception(mysql_error());
	}
	
	$hadler = curl_init();
	curl_setopt($hadler, CURLOPT_URL, "http://172.16.1.137/confirmacao/usuario?id=".mysql_insert_id());
	curl_setopt($hadler, CURLOPT_HEADER, false);
	curl_setopt($hadler, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($hadler, CURLOPT_TIMEOUT, 10);
	$output = curl_exec($hadler);
}catch (Exception $erro) {
}
?>