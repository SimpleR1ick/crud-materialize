<?php include_once 'includes/header.php'; ?>

<div class="row">
	<!--https://materializecss.com/grid.html-->
	<div class="col s12 m6 push-m3 ">
		<h3 class="light">Novo Cliente</h3>
		<form action="functions/crud_forms.php" method="POST">
			<div class="input-field col s12">
				<input type="text" name="nome" id="nome">
				<label for="nome">Nome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="sobrenome" id="sobrenome">
				<label for="sobrenome">Sobrenome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="email" id="email">
				<label for="email">Email</label>
			</div>

			<div class="input-field col s12">
				<input type="number" name="idade" id="idade" min="10" max="120">
				<label for="idade">Idade</label>
			</div>
			<button class="btn" type="submit" name="btn-cadastrar">Cadastrar</button>
			<a class="btn green" href="crud_index.php" type="submit">Lista de clientes</a>
		</form>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>