<?php 

	function criaConexaoBanco() {

		$conn = mysqli_connect('localhost', 'root', '') or die('Não foi possível conectar: '.mysqli_connect_error());
		
		if (!$novaConn = mysqli_connect('localhost', 'root', '', 'tasklist')) {
			$comandos = file_get_contents('cria_db.sql');   
			mysqli_multi_query($conn, $comandos);
			$novaConn = mysqli_connect('localhost', 'root', '', 'tasklist');
		}

		return $novaConn;
	}

	function monta_tabela($conn){

		$query = 	'SELECT * 
					FROM tasklist ORDER BY 1';

		$tasks = mysqli_query($conn, $query);

		echo '<table border = "1" align="center">';
 		echo "<tr>";
 		echo "<th>Acoes</th>";
 		echo "<th>Executor</th>";	
 		echo "<th>Tarefa</th>";
 		echo "<th>Situacao</th>";
 		echo "</tr>";
 		echo "<tbody>";

 		if($tasks) {
 			while ($row = mysqli_fetch_array($tasks)) {
			
				if ($row['situacao'] == 'A') {
					$situacao = 'Ativo';
					$botao = 'Inativar';
				} else {
					$situacao = 'Inativo';
					$botao = 'Ativar';
				}

				echo '<tr>';
				echo '<td>';
				echo '<a href="?action='.$botao.'&id='.$row['id'].'">'.$botao.'</a>';
				echo '    ';
				echo '<a href="?action=excluir&id='.$row['id'].'">Excluir</a>';
				echo '</td>';
				echo '<td>'.$row['executor'].'</td>';
				echo '<td>'.$row['tarefa'].'</td>';
				echo '<td>'.$situacao.'</td>';
				echo '</tr>';
			}	
 		}

		echo "</tbody>";
 		echo "</table>";
	}

 ?>