<?php
/* Exibe informações do usuário e algumas mensagens úteis */
session_start();

// Verificar se o usuário está logado usando a variável de sessão
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Você deve está logado para acessar essa pagina!";
  header("location: error.php");    
}
else {
    // Faz com que seja mais fácil de ler
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Bem Vindo <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1>Bem Vindo</h1>
          
          <p>
          <?php 
     
          // Exibir mensagem sobre o link de confirmação da conta apenas uma vez
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Não incomodar o usuário com mais mensagens na atualização da página
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <?php
          
          // Lembre-se de lembrar ao usuário que essa conta não está ativa até que ela ative
          if ( !$active ){
              echo
              '<div class="info">
              Conta não verificada, por favor olhe sua caixa de entrada ou pasta de spam
              para achar o link de confirmação
              </div>';
          }
          
          ?>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
          
          <a href="logout.php"><button class="button button-block" name="logout"/>Sair</button></a>

    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
