<?php
//Conexão com banco de dados
$servername = "localhost"; //endereço do servidor
$username="root";
$password="";
$db_name="crud";

// 
$connect = mysqli_connect($servername, $username, $password, $db_name);

//codifica com o caracteres ao manipular dados do banco de dados
mysqli_set_charset($connect, "utf8");

if (!$connect) {
	die ("Falha na conexão: ". mysqli_connect_error());
}
// Definindo a conexão como constante global
define('CONEXAO', $connect);
?>