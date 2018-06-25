<?php
/* Processo de logout, desconfigura e destrói variáveis de sessão */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Erro faltal</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">
          <h1>Volte sempre</h1>
              
          <p><?= 'Você já está deslogado!'; ?></p>
          
          <a href="index.php"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>
