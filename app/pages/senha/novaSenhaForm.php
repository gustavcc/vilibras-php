<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../../public/images/Logo.png" type="image/x-icon">
  <title>VILIBRAS</title>
  <link rel="stylesheet" href="../../../public/css/novaSenhaForm.css">
  <script src="https://kit.fontawesome.com/2bb7425346.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <div class="header-links">
      <a href="../usuario/login.php" id="login-link">🚪Login</a>
      <a href="../usuario/cadastro.php" id="signup-link">🆔Cadastro</a>
    </div>
    <div class="header-vilibras">
      <img src="../../../public/images/Logo.png" alt="LOGO">
      <h2>VILIBRAS</h2>
    </div>
    <i class="fas fa-moon theme-toggle" id="theme-toggle"></i>
  </header>
  <div class="container" id="container">
    <h2>Redefinição de Senha</h2>
    <form action="../../actions/senha/resetSenha.php" method="POST">
      <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']);?>">
      <div class="form-group">
        <label for="new_password">Nova Senha:</label>
        <input type="password" id="new_password" name="new_password" required>
      </div>
      <button type="submit">Redefinir Senha</button>
    </form>
  </div>

  <script src="../../../public/js/senha.js"></script>
</body>
</html>