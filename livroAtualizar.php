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
				$id = $_GET['id'];

				$conn = new mysqli($servername, $username, $password, $database);

				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				$sql = "SELECT id_livro, titulo, autor, numero_paginas, isbn, id_genero FROM biblioteca.livros WHERE id_livro = $id";

				echo "<div class='w3-responsive w3-card-4'>";
				if ($result = $conn->query($sql)) {
					if ($result->num_rows == 1) { 
						$row = $result->fetch_assoc();

						$id            = $row['id_livro'];
						$titulo        = $row['titulo'];
						$autor         = $row['autor'];
						$numeroPaginas = $row['numero_paginas'];
						$isbn          = $row['isbn'];
						$genero        = $row['id_genero'];

						$sqlG = "SELECT id_genero, genero FROM generos";
						$result = $conn->query($sqlG);
						$optionsGenero = array();

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								array_push($optionsGenero, "\t\t\t<option value='" . $row["id_genero"] . "'>" . $row["genero"] . "</option>\n");
							}
						} else {
							echo "Erro executando SELECT: " . $conn->connect_error;
						}

				?>
						<div class="w3-container w3-theme">
							<h2>Altere os dados do Livro Cód. = [<?php echo $id; ?>]</h2>
						</div>
						<form class="w3-container" action="livroAtualizar_exe.php" method="post" enctype="multipart/form-data">
							<table class='w3-table-all'>
								<tr>
									<td style="width:50%;">
										<p>
											<input type="hidden" id="Id" name="Id" value="<?php echo $id; ?>">
										<p>
										<label class="w3-text-IE"><b>Título</b>*</label>
										<input class="w3-input w3-border w3-light-grey " name="Titulo" type="text" title="Título do livro." value="<?php echo $titulo; ?>" required>
										</p>
										<p>
										<label class="w3-text-IE"><b>Autor</b>*</label>
										<input class="w3-input w3-border w3-light-grey " name="Autor" type="text" title="Nome do Autor" value="<?php echo $autor; ?>" required>
										</p>
										<p>
										<label class="w3-text-IE"><b>Número de Páginas</b>*</label>
										<input class="w3-input w3-border w3-light-grey " name="NumeroPags" type="number" title="Número de Páginas" value="<?php echo $numeroPaginas; ?>">
										</p>

										<p>
										<label class="w3-text-IE"><b>ISBN</b>*</label>
										<input class="w3-input w3-border w3-light-grey " name="ISBN" type="text" pattern="\d{10,13}" placeholder="ISBN (Apenas números)" title="ISBN" value="<?php echo $isbn; ?>" required>
										</p>

										<p><label class="w3-text-IE"><b>Gênero</b>*</label>
											<select name="Genero" id="Genero" class="w3-input w3-border w3-light-grey " required>
											<?php
											foreach ($optionsGenero as $key => $value) {
												echo $value;
											}
											?>
											</select>
										</p>

									</td>
								<tr>
									<td colspan="2" style="text-align:center">
									<p>
										<input type="submit" value="Alterar" class="w3-btn w3-red">
										<input type="button" value="Cancelar" class="w3-btn w3-theme" onclick="window.location.href='livrolistar.php'">
									</p>
									</td>
								</tr>
							</table>
							<br>
						</form>
					<?php
					} else { ?>
						<div class="w3-container w3-theme">
							<h2>Livro inexistente</h2>
						</div>
						<br>
				<?php
					}
				} else {					
					echo "<p style='text-align:center'>Erro executando UPDATE: " . $conn->connect_error . "</p>";
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