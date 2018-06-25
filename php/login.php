<?php
/* Processo de login do usuário, verifica se o usuário existe e a senha está correta*/

// Proteçao contra SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM usuarios WHERE email='$email'");

if ( $result->num_rows == 0 ){ // Usuario não existe
    $_SESSION['message'] = "Usuario não existente no banco de dados";
    header("location: error.php");
}
else { // Usuario existe
    $usuarios = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $usuarios['senha']) ) {
        
        $_SESSION['email'] = $usuarios['email'];
        $_SESSION['nome'] = $usuarios['name'];
        
        // É assim que saberemos que o usuário está logado
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {
        $_SESSION['message'] = "Senha ou login errado, tente novamente!";
        header("location: error.php");
    }
}

