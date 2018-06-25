<?php 
/* Formulario de reset, reset.php e link do password */
require 'db.php';
session_start();

// Verifique se o formulário foi enviado com o método = "post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // Usuario não existe
    { 
        $_SESSION['message'] = "Email não consta no banco de dados!";
        header("location: error.php");
    }
    else { // Usuario existe (num_rows != 0)

        $user = $result->fetch_assoc(); // $user criar um array com dados
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // exibir mensagens de success.php
        $_SESSION['message'] = "<p>Email enviado com sucesso <span>$email</span>"
        . " acesse seu email para completar a operação</p>";

        // enviar link de resetamento (reset.php)
        $to      = $email;
        $subject = 'Password Reset ( HiFreella.com )';
        $message_body = '
        Ola '.$first_name.',

        Você requisitou resetamente de sua senha? Caso não tenha solicitado desconsidere essa mensagem

        Por favor click no link a baixo para competar sua operação:

        http://localhost/login-system/reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Resete sua senha</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    
  <div class="form">

    <h1>Resete sua senha</h1>

    <form action="forgot.php" method="post">
     <div class="field-wrap">
      <label>
        Email<span class="req">*</span>
      </label>
      <input type="email"required autocomplete="off" name="email"/>
    </div>
    <button class="button button-block"/>Resetar</button>
    </form>
  </div>
          
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>

</html>
