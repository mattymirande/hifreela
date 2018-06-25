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
		                    <form action="index.php" method="post" autocomplete="off"><!--  tenho que definir aqui depois-->
		                       	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Cadastro de Perfil
		                        	</h3>
									
								</div>
								<div class=""></div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#user" data-toggle="tab">Usuário</a></li>
			                            <li><a href="#tipo" data-toggle="tab">Escolha seu tipo de cadastro</a></li>
			                            <li><a href="#final" data-toggle="tab">Últimos Passos</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="user">
		                              <div class="row">
		                                	<h4 class="info-text"> Vamos começar com a informação básica (com validação)</h4>
		                                	<div class="col-sm-4 col-sm-offset-1">
		                                    	<div class="picture-container">
		                                        	<div class="picture">
                                        				<img src="img/foto-temporaria.png" class="picture-src" id="wizardPicturePreview" title=""/>
		                                            	<input type="file" id="wizard-picture">
		                                        	</div>
		                                        	<h6>Add Uma Foto</h6>
		                                    	</div>
		                                	</div>
		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
													<div class="form-group label-floating">
			                                          <label class="control-label"> Primeiro Name <small>*</small></label>
			                                          <input name="firstname" type="text" class="form-control">
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
													<div class="form-group label-floating">
													  <label class="control-label"> Último Name <small>*</small></label>
													  <input name="lastname" type="text" class="form-control">
													</div>
												</div>
		                                	</div>
		                                	<div class="col-sm-10 col-sm-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Email <small>*</small></label>
			                                            <input name="email" type="email" class="form-control">
			                                        </div>
												</div>
											</div>
											<div class="col-sm-10 col-sm-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock_outline</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Senha <small>*</small></label>
			                                            <input name="senha" type="password" class="form-control">
			                                        </div>
												</div>
		                                	</div>
		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="tipo">
		                                <h4 class="info-text"> Qual seu tipo de perfil? (selecione abaixo) </h4>
		                                <div class="row">
		                                    <div class="col-sm-10 col-sm-offset-1">
		                                        <div class="col-sm-6">
		                                            <div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="checkbox" name="cliente" value="Design">
		                                                <div class="icon">
															<i class="material-icons">home</i>
		                                                </div>
		                                                <h6>Cliente</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-6">
		                                            <div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="checkbox" name="trabalhador" value="Code">
		                                                <div class="icon">
															<i class="material-icons">business</i>
		                                                </div>
		                                                <h6>Trabalho</h6>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="final">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> Último passo. </h4>
		                                    </div>
		                                    <div class="col-sm-9 col-sm-offset-1">
	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">endereço</label>
	                                    			<input type="text" class="form-control">
	                                        	</div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Cidade</label>
		                                            <input type="text" class="form-control">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Estado</label>
	                                            	<select name="estado" class="form-control">
													<option value="  ">Estados</option>
                              						<option value="PA">Pará</option>
                              						<option value="AC">Acre</option>
                              						<option value="AL">Alagoas</option>
                              						<option value="AP">Amapá</option>
                              						<option value="AM">Amazonas</option>
                              						<option value="BA">Bahia</option>
                              						<option value="CE">Ceará</option>
                              						<option value="DF">Distrito Federal</option>
                              						<option value="ES">Espírito Santo</option>
                              						<option value="GO">Goias</option>
                              						<option value="MA">Maranhão</option>
                              						<option value="MT">Mato Grosso</option>
                              						<option value="MS">Mato Grosso do Sul</option>
                              						<option value="MG">Minas Gerais</option>
                             						<option value="PB">Paraíba</option>
                              						<option value="PR">Paraná</option>
                             						<option value="PE">Pernanbuco</option>
                             						<option value="PI">Piauí</option>
                             						<option value="RJ">Rio de Janeiro</option>
                             						<option value="RN">Rio Grande do Norte</option>
                             						<option value="RS">Rio Grande do Sul</option>
                             						<option value="RO">Rondônia</option>
                             						<option value="RR">Roraima</option>
                             						<option value="SC">Santa Catarina</option>
                             						<option value="SP">São Paulo</option>
                             						<option value="SE">Sergipe</option>
                             						<option value="TO">Tocantins</option>
	                                            	</select>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Próximo' />
		                                <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Concluir' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Voltar' />
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
