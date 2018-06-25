<?php 
/* ´Pagina Hibrida */
require 'php/db.php';
session_start();
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />

	<title>Bem vindo ao HiFreella</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fontes e icones     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/material-bootstrap-wizard.css" rel="stylesheet" />

</head>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //usuario logar 

        require 'php/login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //usuario registrarse 
        
        require 'php/register.php';
        
    }
}
?>
<body>
	<div class="image-container set-full-height" style="background-image: url('img/wizard-profile.jpg')">
	    
		<!--  Corpo   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="green" id="wizardProfile">
		                    <form action="" method="">
		                       	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Cadastro de Perfil
		                        	</h3>
									
								</div>
								<div class=""></div>
								<div class="wizard-navigation">
									<ul>
										<li><a href="#login" data-toggle="tab">login</a></li>
			                            <li><a href="cadastro.php">Cadastrar</a></li>
			                        </ul>
								</div>
		                            <div class="tab-pane" id="login">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> insira seu e-mail e senha </h4>
		                                    </div>
		                                    <div class="col-sm-10 col-sm-offset-1">
	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">email</label>
	                                    			<input type="email" class="form-control">
	                                        	</div>
		                                    </div>
		                                    <div class="col-sm-10 col-sm-offset-1">
	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">senha</label>
	                                    			<input type="password" class="form-control">
	                                        	</div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-login btn-fill btn-success btn-wd' name='login' value='Acessar' />
									</div>
									<div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='redefinir' value='Redefinir senha' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> <!--  big container -->

	</div>

</body>
	<!--   Core JS Files   -->
    <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="js/jquery.validate.min.js"></script>

</html>
