<?php
// Inicia a sessão
session_start();

// Conexao com banco de dados
require_once '../includes/dbconnect.php';

// Import de função
include_once 'sanitiza.php';

/**
 * 1 - Verifica se existe um $_POST
 * 2 - Verifica se os campos do post possuem alguma tag HTML
 * 3 - Verifica qual ação post foi submetida a pagina
 * 
 * @author Henrique Dalmagro
 */
if (isset($_POST)) {
    $possuiInject = sanitizaPost($_POST);

    if ($possuiInject) {
        $_SESSION['mensagem'] = "Erro, tente novamente!";
        header('Location: ../crude_index.php');

    } else {
        // Função de registro
        if (isset($_POST['btn-cadastrar'])) {
            cadastrarUsuario($conn);
		}
        // Função de alteração
        else if (isset($_POST['btn-editar'])) {
            editarUsuario($conn);
		}
        // Função de exclusão
        else if(isset($_POST['btn-deletar'])) {
            deletarUsuario($conn);

		}
    }
}
// Encerra a conexão
mysqli_close($conn);

/**
 * Função para cadastrar um usúario no banco de dados
 * 
 * @author Henrique Dalmagro
 */
function cadastrarUsuario($conn): void {
    $nome = mysqli_escape_string($conn, $_POST['nome']);
	$sobrenome = mysqli_escape_string($conn, $_POST['sobrenome']);
	$email = mysqli_escape_string($conn, $_POST['email']);
	$idade = mysqli_escape_string($conn, $_POST['idade']);
	
	$sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', $idade)";
 
	if(mysqli_query($conn, $sql)) {
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../crud_index.php');
        
	} else {
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		header('Location: ../crud_index.php');
	}
}

/**
 * Função para editar um usuario do banco de dados
 * 
 * @author Henrique Dalmagro
 */
function editarUsuario($conn): void {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_escape_string($conn, $_POST['nome']);
	$sobrenome = mysqli_escape_string($conn, $_POST['sobrenome']);
	$email = mysqli_escape_string($conn, $_POST['email']);
	$idade = mysqli_escape_string($conn, $_POST['idade']);

	$sql = "UPDATE clientes SET nome ='$nome', sobrenome ='$sobrenome', email ='$email', idade ='$idade' WHERE id ='$id'";

	if (mysqli_query($conn, $sql)) {
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../crud_index.php');

	} else {
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: ../crud_index.php');
	}
}

/**
 * Função excluir um usúario do banco de dados
 * 
 * @author Henrique Dalmagro
 */
function deletarUsuario($conn): void {
    $id = mysqli_escape_string($conn, $_POST['id']);
	
	$sql = "DELETE FROM clientes WHERE id = $id";
	
	if (mysqli_query($conn, $sql)) {
		$_SESSION['mensagem'] = "Excluido com sucesso!";
		header('Location: ../crud_index.php');

	} else {
		$_SESSION['mensagem'] = "Erro ao excluir!";
		header('Location: ../crud_index.php');
	}
}

?>