
<?php 
	require 'functions.php';

	// verifica se foi passado algo pelo get
	if (isset($_GET['action'])) {
	
		$action = $_GET['action'];

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		}

		$conn = criaConexaoBanco();

		switch ($action) {

			case 'Inativar' :

				$query = "UPDATE tasklist SET situacao = 'I' WHERE id = $id";

				if (!mysqli_query($conn, $query)) {

					echo 'Erro:'.mysqli_error($conn);

				} else {

					echo 'Situacao atualizada com sucesso.';

				} 

			break;

			case 'Ativar' :

				$query = "UPDATE tasklist SET situacao = 'A' WHERE id = $id";

				if (!mysqli_query($conn, $query)) {

					echo 'Erro:'.mysqli_error($conn);

				} else {

					echo 'Situacao atualizada com sucesso.';

				} 

			break;

			case 'salvar':
				
					if (isset($_GET['executor'])) {

						$executor = $_GET['executor'];
			 		}

			 		if (isset($_GET['tarefa'])) {

						$tarefa = $_GET['tarefa'];
			 		}

					$query = "INSERT INTO tasklist(executor, tarefa, situacao) VALUES ('$executor', '$tarefa', 'A')";

					if (!mysqli_query($conn, $query)) {
						echo 'Erro:'.mysqli_error($conn);
					} else {
						echo 'Tarefa cadastrada.';
					}
			break;
		}
	}

 ?>

 <!DOCTYPE html>
 <html lang="pt-br">
 <html>
 <head>
	<meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />
 	<title>Tasklist</title>
 </head>
 <body>
 	<div>
 		<h1 align="center">Painel de Atividades</h1>
 	</div>
 	<div>
 		<?php monta_tabela(criaConexaoBanco()) ?>
 	</div>

	<div id="area">
		<form id="formulario" autocomplete="off">
		  <fieldset>
		    <legend>Cadastro de tarefa</legend>
		    <label>Executor:</label><input class="campo_nome" type="text" name="executor">
		    <br>
		    <label>Tarefa:</label>
		    	<br>
		    		<textarea class="msg" cols="35" rows="8" name="tarefa"></textarea>
				<br>
		    <input type="hidden" name="action" value="salvar">
		    <input class="btn_submit" type="submit" name="cadastrar" value="Salvar">
		  </fieldset>
		</form>
	</div>
 </body>
 </html>
