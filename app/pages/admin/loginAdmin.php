<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../public/images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../public/css/login.css">
    <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>
    <title>Login Admin | VILIBRAS</title>
</head>
<body>
    <div class="background-image" id="background-image">
        <div class="login-container" id="login-container">
            <div class="avatar">    </div>
            <h1>Logar Admin</h1>
            <img src="../../../public/images/Logo.png" id="foto" alt="">
            <form id="forms" method="POST" action="../../actions/admin/loginAdmin.php">
                <input type="emqil" name="email" placeholder="E-mail" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button id="submit" type="submit"><a>Entrar</a></button>
            </form>


            <div class="links">
                <a href="../senha/recuperarSenhaForm.php">Redefinir senha</a>
            </div>

        </div>
    </div>

    <script>
      window.addEventListener('load', function() {
        const foto = document.getElementById('foto');
        foto.style.transform = 'scale(2) rotate(345deg)';
      });

      window.addEventListener("load", function() {
        document.body.classList.add("blend-effect");
      })

      const submit = document.getElementById('submit');
      const forms = document.getElementById('forms');

      submit.addEventListener('keypress', (e)=>{
        if (e.code = "Enter") {
          forms.onsubmit();
        }
      })
    </script>
</body>
</html>
