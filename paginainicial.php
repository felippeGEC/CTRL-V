<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
$erro2 = isset($_GET['erro2']) ? $_GET['erro2'] : 0;
$validar = isset($_GET['validar']) ? $_GET['validar'] : 0;
?>


<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- CSS -->
  <link rel="stylesheet" href="estilo.css">


  <title>Ctrl+V</title>
</head>

<body>
  <div id="particles-js">
    <script type="text/javascript" src="particles.js"></script>
    <script type="text/javascript" src="app.js"></script>
     </div>
  <div id="login-box">
    <div class="container">
      <div class="left ">
      <div class="page-header">
          <div class="row">
            <div class="col-sm-6">
              <h3>Cadastre-se</h3>
              <form method="post" action="cadastrar_usuario.php" id="formCadastrarse">
                <div class="form-group">
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required="requiored">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
                </div>
                <button type="submit" class="btn btn-dark form-control">Inscreva-se</button>
              </form>
              <?php
              if ($erro2 == 1) {
                echo "Não foi possivel cadastrar o usuario";
              }
              if ($validar == 1) {
                echo "Usuario cadastrado com sucesso";
              }

              ?>
            </div>
          </div>
        </div>
        
      </div>
        
        <div class="right">
          <div class="col-sm-4">
            <h3>Login</h3>
            <form method="post" action="validar_acesso.php" id="formLogin">
              <div>
                <div class="form-group">
                  <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Digite seu usuario">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Digite sua senha">
                </div>
                <button type="submit" class="btn btn-dark form-control">Logar</button>
              </div>
            </form>
            <?php
            if ($erro == 1) {
              echo '<font style="color:#FF0000">Usuario ou senha incorreto(s)</font>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>