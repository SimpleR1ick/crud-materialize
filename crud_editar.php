<?php
// Header
include_once 'includes/header.php';

// Conexão
include_once 'includes/dbconnect.php';

// Select com o id que veio da URL
if (isset($_GET)) {
	// Armazena em uma variavel o id recebido no header
	$id = $_GET['id'];

	// Prepara e executa uma query no banco de dados
	$resultado = mysqli_query(CONEXAO, "SELECT * FROM clientes WHERE id = '$id'");

	// Transforma o resultado em um array assossiativo
	$dados = mysqli_fetch_array($resultado);
}
// Encarra a conexão
mysqli_close(CONEXAO);
?>

<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light">Editar Cliente</h3>
		<form action="functions/crud_forms.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
			<div class="input-field col s12">
				<input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
				<label for="nome">Nome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome']; ?>">
				<label for="sobrenome">Sobrenome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="email" id="email" value="<?php echo $dados['email']; ?>">
				<label for="email">Email</label>
			</div>

			<div class="input-field col s12">
				<input type="number" name="idade" id="idade" min="10" max="120" value="<?php echo $dados['idade']; ?>">
				<label for="idade">Idade</label>
			</div>
			<button class="btn" type="submit" name="btn-editar">Atualizar</button>
			<a class="btn green" type="submit" href="crud_index.php">Lista de clientes</a>
		</form>
		
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>