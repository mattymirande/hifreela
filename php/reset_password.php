<?php
/* Processo de redefinição de senha, atualiza banco de dados com nova senha de usuário */
require 'db.php';
session_start();

// erifique se o formulário está sendo enviado com method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Certifique-se de que as duas senhas coincidam
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
        // Pegue o $_POST['email'] e  $_POST['hash'] a partir do campo de entrada oculto do formulário reset.php
        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);
        
        $sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "Sua senha foi resetada com sucesso!";
        header("location: success.php");    

        }

    }
    else {
        $_SESSION['message'] = "Duas senhas que você digitou não correspondem, tente novamente!";
        header("location: error.php");    
    }

}
?>