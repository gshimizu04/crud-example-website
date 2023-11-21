<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
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
            <p>
            <div class="w3-code cssHigh notranslate">
                <?php

                date_default_timezone_set("America/Sao_Paulo");
                $data = date("d/m/Y H:i:s", time());
                echo "<p class='w3-small' > ";
                echo "Acesso em: ";
                echo $data;
                echo "</p> "
                ?>
                <div class="w3-container w3-theme">
                    <h2>Listagem de Livros</h2>
                </div>
                <?php
                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

                $sql = "SELECT id_livro, titulo, autor, numero_paginas, isbn, genero AS nome_genero FROM livros AS l INNER JOIN generos AS g ON (l.id_genero = g.id_genero) ORDER BY l.titulo";
                $result = $conn->query($sql);
                echo "<div class='w3-responsive w3-card-4'>";
                if ($result->num_rows >0) {
                    echo "<table class='w3-table-all'>";
                    echo "	<tr>";
                    echo "	  <th width='7%'>Código</th>";
                    echo "	  <th width='14%'>ISBN</th>";
                    echo "	  <th width='25%'>Título</th>";
                    echo "	  <th width='20%'>Autor</th>";
                    echo "	  <th width='12%'>Gênero</th>";
                    echo "	  <th width='8%'>Número de Páginas</th>";
                    echo "	  <th width='7%'> </th>";
                    echo "	  <th width='7%'> </th>";
                    echo "	</tr>";
                    while ($row = $result->fetch_assoc()) {
                        $cod = $row["id_livro"];
                        echo "<tr>";
                        echo "<td>";
                        echo $cod;
                        echo "</td><td>";
                        echo $row["isbn"];
                        echo "</td><td>";
                        echo $row["titulo"];
                        echo "</td><td>";
                        echo $row["autor"];
                        echo "</td><td>";
                        echo $row["nome_genero"];
                        echo "</td><td>";
                        echo $row["numero_paginas"];
                        echo "</td>";
                            ?>
                            <td>
                                <a href='livroAtualizar.php?id=<?php echo $cod; ?>'><img src='img/Edit.png' title='Editar Livro' width='32'></a>
                            </td>
                            <td>
                                <a href='livroExcluir.php?id=<?php echo $cod; ?>'><img src='img/Delete.png' title='Excluir Livro' width='32'></a>
                            </td>
                            </tr>
                    <?php
                    }
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<p style='text-align:center'>Erro executando SELECT: " . $conn->connect_error . "</p>";
                }
                $conn->close();
                    ?>
            </div>
        </div>
        <?php require 'geral/sobre.php'; ?>
    </div>
    <?php require 'geral/rodape.php'; ?>

</body>

</html>