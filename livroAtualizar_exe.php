<!DOCTYPE html>
<html>
	<head>
	  <title>Biblioteca do Saber</title>
	  <link rel="icon" type="image/png" href="img/favicon.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
	<body onload="w3_show_nav('menuLivro')">
	<?php require 'geral/menu.php'; ?>
	<?php require 'bd/conectaBD.php'; ?>
	
	<div class="w3-main w3-container" style="margin-left:270px;margin-top:130px;">

	<div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">

	  <p class="w3-large">
	  <div class="w3-code cssHigh notranslate">
		<?php

		date_default_timezone_set("America/Sao_Paulo");
		$data = date("d/m/Y H:i:s",time());
		echo "<p class='w3-small' > ";
		echo "Acesso em: ";
		echo $data;
		echo "</p> "
		?>
		<div class="w3-container w3-theme">
		<h2>Atualização de Livro</h2>
		</div>
		<?php
			$id                = $_POST['Id'];
			$titulo            = $_POST['Titulo'];
			$autor             = $_POST['Autor'];
			$numeroPaginas    = $_POST['NumeroPags'];
			$isbn	           = $_POST['ISBN'];
			$genero			   = $_POST['Genero'];

			$conn = new mysqli($servername, $username, $password, $database);

			if ($conn->connect_error) {
				die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
			}
			?>
			
			<?php
		
			$sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', numero_paginas = '$numeroPaginas', isbn = '$isbn' WHERE id_livro = $id";

			echo "<div class='w3-responsive w3-card-4'>";
			if ($result = $conn->query($sql)) {
				echo "<p>&nbsp;Registro alterado com sucesso! </p>";
			} else {
				echo "<p style='text-align:center'>Erro executando UPDATE: " . $conn->connect_error . "</p>";
			}
			echo "</div>";
			$conn->close();
		?>
	  </div>
	</div>

	<?php require 'geral/sobre.php';?>
	</div>
	<?php require 'geral/rodape.php';?>

</body>
</html>
