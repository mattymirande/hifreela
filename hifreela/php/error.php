<?php
/* PHP para exibir erros na tela */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error Fatal</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Error Fatal</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>     
    <a href="index.php"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
