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
				$data = date("d/m/Y H:i:s", time());
				echo "<p class='w3-small' > ";
				echo "Acesso em: ";
				echo $data;
				echo "</p> "
				?>

				<?php

				$conn = new mysqli($servername, $username, $password, $database);
				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				$id = $_GET['id'];

				$sql = "SELECT id_livro, titulo, autor, numero_paginas, isbn, genero AS nome_genero FROM livros as l INNER JOIN generos AS g ON (l.id_genero = g.id_genero) WHERE l.id_livro = $id;";

				echo "<div class='w3-responsive w3-card-4'>";
				if ($result = $conn->query($sql)) {
					if ($result->num_rows == 1) {
						$row = $result->fetch_assoc();
				?>
						<div class="w3-container w3-theme">
							<h2>Exclusão do Livro Cód. = [<?php echo $row['id_livro']; ?>]</h2>
						</div>
						<form class="w3-container" action="livroExcluir_exe.php" method="post" onsubmit="return check(this.form)">
							<input type="hidden" id="Id" name="Id" value="<?php echo $row['id_livro']; ?>">
							<p>
							<label class="w3-text-IE"><b>Título: </b> <?php echo $row['titulo']; ?> </label>
							</p>
							<p>
							<label class="w3-text-IE"><b>Autor: </b><?php echo $row['autor']; ?></label>
							</p>
							<p>
							<label class="w3-text-IE"><b>Número de Páginas: </b><?php echo $row['numero_paginas']; ?></label>
							</p>
							<p>
							<label class="w3-text-IE"><b>ISBN: </b><?php echo $row['isbn']; ?></label>
							</p>
							<p>
							<label class="w3-text-IE"><b>Gênero: </b><?php echo $row['nome_genero']; ?></label>
							</p>
							<p>
							<input type="submit" value="Confirma exclusão?" class="w3-btn w3-red">
							<input type="button" value="Cancelar" class="w3-btn w3-theme" onclick="window.location.href='livrolistar.php'">
							</p>
						</form>
					<?php
					} else { ?>
						<div class="w3-container w3-theme">
							<h2>Tentativa de exclusão de livro inexistente</h2>
						</div>
						<br>
				<?php }
				} else {
					echo "<p style='text-align:center'>Erro executando DELETE: " . $conn->connect_error . "</p>";
				}
				echo "</div>";
				$conn->close();
				?>
			</div>
			</p>
		</div>
		<?php require 'geral/sobre.php'; ?>
	</div>
	<?php require 'geral/rodape.php'; ?>
</body>
</html>