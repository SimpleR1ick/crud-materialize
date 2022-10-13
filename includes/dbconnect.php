<?php
//Conexão com banco de dados
$servername="localhost"; //endereço do servidor
$username="root";
$password="";
$db_name="crud";

// 
$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
	die ("Falha na conexão: ". mysqli_connect_error());
}
//codifica com o caracteres ao manipular dados do banco de dados
mysqli_set_charset($conn, "utf8");
?>