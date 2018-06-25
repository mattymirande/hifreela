<?php
/* O formulário de redefinição de senha, o link para esta página forgot.php está incluído
    a mensagem de email 
*/
require 'db.php';
session_start();

// Verifique se as variáveis de e-mail e hash não estão vazias
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    // Verifique se o email do usuário com hash correspondente existe
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Você inseriu um URL inválido para redefinição de senha!";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Desculpe, a verificação falhou, tente novamente!";
    header("location: error.php");  
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Nova Senha</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">

          <h1>Crie uma nova senha</h1>
          
          <form action="reset_password.php" method="post">
              
          <div class="field-wrap">
            <label>
              Nova Senha<span class="req">*</span>
            </label>
            <input type="password"required name="newpassword" autocomplete="off"/>
          </div>
              
          <div class="field-wrap">
            <label>
              Confirme<span class="req">*</span>
            </label>
            <input type="password"required name="confirmpassword" autocomplete="off"/>
          </div>
          
          <!-- Este campo de entrada é necessário, para obter o email do usuário -->
          <input type="hidden" name="email" value="<?= $email ?>">    
          <input type="hidden" name="hash" value="<?= $hash ?>">    
              
          <button class="button button-block"/>Aplicar</button>
          
          </form>

    </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
