<?php
$dados = parse_url($_SERVER['REQUEST_URI']);

if($dados['path'] == "/workspace/TrbUsuario/users")
{
if($_SERVER['REQUEST_METHOD'] == "GET"){
require_once 'ListaConteudo.php';
}
elseif ($_SERVER['REQUEST_METHOD'] == "POST"){
require_once 'Cadastrar.php';	
}		
}
else
{
header('status:501');
}