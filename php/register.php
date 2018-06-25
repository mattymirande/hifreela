<?php
/* Processo de registro, insere informações do usuário no banco de dados
    e envia mensagem de confirmação de conta
  */

// Definir variáveis de sessão para serem usadas na página profile.php
$_SESSION['email'] = $_POST['email'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['senha'] = $_POST['senha'];


// verificar todas as variáveis $ _POST para proteger contra SQL Injections
$name = $mysqli->escape_string($_POST['name']);
$email = $mysqli->escape_string($_POST['email']);
$senha = $mysqli->escape_string(password_hash($_POST['senha'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Verifique se o usuário com esse email já existe
$result = $mysqli->query("SELECT * FROM usuarios WHERE email='$email'") or die($mysqli->error());

// Sabemos que o email do usuário existe se as linhas retornadas forem maiores que 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'Email já cadastrado em nosso banco de dados, use outro';
    header("location: error.php");
    
}
else { // E-mail não existe em um banco de dados, continue ...

    // ativação e 0 por Padrão (para mudar coloque 1)
    $sql = "INSERT INTO usuarios (nome, email, senha, hash) "
            . "VALUES ('$name','$email','$senha','$hash')";

    // Adicionar usuário ao banco de dados
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 até que o usuário ative sua conta com verify.php
        $_SESSION['logged_in'] = true; // Então, sabemos que o usuário fez o login
        $_SESSION['message'] =
                
                 "Link de confirmação foi enviado para $email, por favor verifique
                 sua conta apertando no link enviado para seu email.!";

        // Slink de confirmação de inscrição final (verify.php)
        $to      = $email;
        $subject = 'Verificação conta ( Hifreella.com )';
        $message_body = '
        Ola '.$name.',

        Muito obrigado por se cadastrar!

        Por favor acesse o link abaixo para confirmar sua conta:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registração não concluida';
        header("location: error.php");
    }

}