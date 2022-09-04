<?php
// Sniciar  Sessão
session_start();

// Se existe a sessão mensagem criada
if(isset($_SESSION['mensagem'])) {
	?>
	<script>
	//Mensagem de alerta javascript do materialize
		window.onload = function(){
			M.toast({html: "<?php echo $_SESSION['mensagem']; ?>"});			
		};
	</script>
	<?php
	unset($_SESSION['mensagem']); //limpar a mensagem da sessão 	
}
?>