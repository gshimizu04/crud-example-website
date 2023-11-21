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

    $usuario = $conn->real_escape_string($_POST['login']);
    $senha   = $conn->real_escape_string($_POST['senha']);
    
    $sql = "SELECT id_usuario, nome FROM usuarios WHERE login = '$usuario' AND senha = md5('$senha')";
    if ($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION ['login']       = $usuario;
            $_SESSION ['id_usuario']  = $row['id_usuario'];
            $_SESSION ['nome']        = $row['nome'];
            unset($_SESSION['nao_autenticado']);
            unset($_SESSION ['mensagem_header'] ); 
            unset($_SESSION ['mensagem'] ); 
            header('location: /bibliotecaLogin/livrolistar.php');
            exit();
            
        }else{
            $_SESSION ['nao_autenticado'] = true;
            $_SESSION ['mensagem_header'] = "Login";
            $_SESSION ['mensagem']        = "ERRO: Login ou Senha inválidos.";
            header('location: /bibliotecaLogin/index.php');
            exit();
        }
    }
    else {
        echo "Erro ao acessar o Banco de Dados: " . mysqli_error($conn);
    }
    $conn->close();
?>
	</body>
</html>