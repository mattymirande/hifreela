<?php 
/* ´Pagina Hibrida */
require 'php/db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bem vindo ao HiFreella</title>
  <?php include 'css/css.html'; ?>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //usuario logar 

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //usuario registrarse 
        
        require 'register.php';
        
    }
}
?>
<body>
<div class="fundo">
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Inscrever-se</a></li>
        <li class="tab active"><a href="#login">Logar</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>Bem vindo ao HiFreella </h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Senha<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot"><a href="forgot.php">Esqueceu a Senha?</a></p>
          
          <button class="button button-block" name="login" />Login</button>
          
          </form>

        </div>
          
        <div id="signup">   
          <h1>Preencha o formulario</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          

            <div class="field-wrap">
              <label>
                Nome<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='name' />
            </div>


              <div class="field-wrap">
                  <label>
                      Endereço<span class="req">*</span>
                  </label>
                  <input type="text" required autocomplete="off" name='endereco' />
              </div>

              <div class="top-row">

                    <div class="field-wrap">
                        <label>
                            Cidade<span class="req">*</span>
                        </label>
                        <input type="text" required autocomplete="off" name='cidade' />
                    </div>
                  <div class="field-wrap">
                      <
                    <select name="estado">
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
                    <input type="text" required autocomplete="off" name='estado' />
              </div>
             </div>



          <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
          
          <div class="field-wrap">
            <label>
              Crie uma Senha<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='senha'/>
          </div>
          
          <button type="submit" class="button button-block" name="register" />Registrar</button>
          
          </form>

        </div>  
        
      </div><!-- tab-content -->
      
    </div><!-- /form -->
</div><!-- backgroud -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
