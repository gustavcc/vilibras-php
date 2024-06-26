<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | VILIBRAS</title>

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            flex-direction: column;
            padding: 0;
            margin: 0;
            height: 100vh;
            background: #15172b;
        }
        .login {
          font-family: sans-serif;
          display: flex;
          align-items: center;
          justify-content: center;
          width: 100%;
          color: #eee;
          margin-top: 20px;
          gap: 3px;
        }
        .login a {
          color: #08d;
        }
        .form {
        background-color: #15172b;
        border-radius: 20px;
        box-sizing: border-box;
        height: 500px;
        padding: 20px;
        width: 320px;
        }

        .title {
        color: #eee;
        font-family: sans-serif;
        font-size: 36px;
        font-weight: 600;
        margin-top: 30px;
        }

        .subtitle {
        color: #eee;
        font-family: sans-serif;
        font-size: 16px;
        font-weight: 600;
        margin-top: 10px;
        }

        .input-container {
        height: 50px;
        position: relative;
        width: 100%;
        }

        .ic1 {
        margin-top: 40px;
        }

        .ic2 {
        margin-top: 30px;
        }

        .input {
        background-color: #303245;
        border-radius: 12px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        font-size: 18px;
        height: 100%;
        outline: 0;
        padding: 4px 20px 0;
        width: 100%;
        }

        .cut {
        background-color: #15172b;
        border-radius: 10px;
        height: 20px;
        left: 20px;
        position: absolute;
        top: -20px;
        transform: translateY(0);
        transition: transform 200ms;
        width: 76px;
        }

        .cut-short {
        width: 50px;
        }

        .iLabel {
        color: #65657b;
        font-family: sans-serif;
        left: 20px;
        line-height: 14px;
        pointer-events: none;
        position: absolute;
        transform-origin: 0 50%;
        transition: transform 200ms, color 200ms;
        top: 20px;
        }

        .input:focus ~ .cut {
        transform: translateY(8px);
        }

        .input:focus ~ .iLabel {
        transform: translateY(-30px) translateX(10px) scale(0.75);
        }

        .input:not(:focus) ~ .iLabel {
        color: #808097;
        }

        .input:focus ~ .iLabel {
        color: #dc2f55;
        }

        .submit {
        background-color: #08d;
        border-radius: 12px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        cursor: pointer;
        font-size: 18px;
        height: 50px;
        margin-top: 38px;
        text-align: center;
        width: 100%;
        }

        .submit:active {
        background-color: #06b;
        }
        .msg {
          color: #fff;
        }
    </style>
</head>
<body>
<?php
    if (isset($_GET['msg'])){
        $msg=$_GET['msg'];
        echo "<div class='msg'>". $msg ."</div>";
    }
    ?>

    <form class="form" method="POST" action="../../actions/usuario/cadastroUsuario.php">
      <div class="title">Welcome</div>
      <div class="subtitle">Let's create your account!</div>

      <div class="input-container ic1">
        <input required type="text" name="nome" class="input" id="firstname">
        <div class="cut"></div>
        <label class="iLabel" for="nome">Full name</label>
      </div>

      <div class="input-container ic2">
        <input required type="password" name="senha" class="input" id="senha">
        <div class="cut"></div>
        <label class="iLabel" for="senha">Password</label>
      </div>
      <div class="input-container ic2">
        <input required type="text" name="email" class="input" id="email">
        <div class="cut cut-short"></div>
        <label class="iLabel" for="email">Email</label>
      </div>
      <input class="submit" type="submit" value="Cadastrar">
      <div class="login">
        Já possui conta? Faça
        <a href="login.php">login</a>
      </div>
    </form>
    
</body>
</html>