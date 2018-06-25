<?php
/* Exibe todas as mensagens bem-sucedidas */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Operação realizada</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1><?= 'Operação Concluida'; ?></h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>
    <a href="index.php"><button class="button button-block"/>Voltar</button></a>
</div>
</body>
</html>
