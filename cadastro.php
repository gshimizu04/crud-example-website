<html>
	<head>
    <meta charset="UTF-8">
      <title>Biblioteca do Saber</title>
	  <link rel="icon" type="image/png" href="img/favicon.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
<body>

<?php
    session_start();
    require 'bd/conectaBD.php'; 

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $nome    = $conn->real_escape_string($_POST['nome']);
    $login   = $conn->real_escape_string($_POST['login']);
    $celular = $conn->real_escape_string($_POST['celular']);
    $senha   = $conn->real_escape_string($_POST['senha1']); 
    
    $sql = "INSERT INTO usuarios (nome, celular, login, senha) VALUES ('$nome','$celular','$login', md5('$senha'))";

    if ($result = $conn->query($sql)) {
        $msg = "Usuário cadastrado! Você pode prosseguir para o login.";
        $_SESSION ['nao_autenticado'] = true;
        $_SESSION ['mensagem_header'] = "Cadastro";
        $_SESSION ['mensagem']        = $msg;
        header('location: /bibliotecaLogin/index.php');
        exit();
    } else {
        $msg = "Erro executando INSERT: " . $conn->connect_error . " Tente novo cadastro.";
        $_SESSION ['nao_autenticado'] = true;
        $_SESSION ['mensagem_header'] = "Cadastro";
        $_SESSION ['mensagem']        = $msg;
        header('location: /bibliotecaLogin/index.php');
        exit();
        }
        header('location: index.php');

    $conn->close();
?>
	</body>
</html>