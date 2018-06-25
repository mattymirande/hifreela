<?php 
/* Verifica o email do usuário registrado, o link para esta página
    está incluído na register.php em mensagem de email 
*/
require 'db.php';
session_start();

// Verifique se as variáveis de e-mail e hash não estão vazias
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    //Selecione um usuário com e-mail e hash correspondentes, que ainda não confirmaram a conta deles (active = 0)
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "A conta já foi ativada ou o URL é inválido!";

        header("location: error.php");
    }
    else {
        $_SESSION['message'] = "Sua conta foi ativada com sucesso!";
        
        // Definir o status do usuário para ativo (active = 1)
        $mysqli->query("UPDATE users SET active='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['active'] = 1;
        
        header("location: success.php");
    }
}
else {
    $_SESSION['message'] = "Parâmetros inválidos fornecidos para verificação da conta!";
    header("location: error.php");
}     
?>