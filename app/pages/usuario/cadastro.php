<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/cadastro-basic.css">
    <link rel="stylesheet" href="../../../public/css/cadastro-portrait.css" media="screen and (orientation: portrait)">
    <link rel="stylesheet" href="../../../public/css/cadastro-landscape.css" media="screen and (orientation: landscape)">
    <link rel="shortcut icon" href="../../../public/images/Logo.png" type="image/x-icon">

    <title>VILIBRAS</title>
</head>
<body>
    <div class="site-content">
        <video autoplay muted loop id="heroVideo">
            <source src="../../../public/images/background-cadastro.mp4" type="video/mp4">
        </video>
    </div>

    <div class="container">
        <div class="nav">
            <div class="logo">
                <a href="#">vilibras</a>
                <img id="logo-vilibras" src="../../../public/images/Logo.png" alt="" srcset="">
            </div>
            <div class="links">
                <a id="login-a" href="login.php"><img src="../../../public/images/enter_1828395.png" alt="Ícone de Pixel perfect" data-link="login" tabindex="5"></a>
            </div>
        </div>

        <div class="hero-copy">
            <h1>vilibras</h1>
            <p>cadastro</p>

            <div class="forms">
                <form method="POST" action="../../actions/usuario/cadastroUsuario.php">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome"  placeholder="Nome:" required tabindex="1" data-link="nome">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email"  required tabindex="2" data-link="email">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha"  required tabindex="3" data-link="senha">
                    <button type="submit" tabindex="4" >Cadastrar</button>
                </form>
            </div>
        </div>

        <div class="footer">
            <div class="links">
                <a id="help-btn" href="#">
                    <img id="help-a" src="../../../public/images/help-web-button_18436.png" alt="">
                    <span id="help-text">Ajuda</span>
                </a>
                  
                <a id="vilibras-a-c" href="#">VILIBRAS</a>

            </div>
        </div>
    </div>
    <canvas id="draw"></canvas>

    <div id="popup" class="popup">
        <img id="assistent-img" src="../../../public/images/customer_6842168.png" alt="">
        Posso ajudar com alguma coisa?
        <button id="close-popup" class="close-popup">X</button>
    </div>

    <div id="menuPopup" class="popup">
        <img src="../../../public/images/customer_6842168.png" alt="">
        <ul>
            <li data-link="nome"><a href="#">Nome</a></li>
            <li data-link="#"><a href="#">E-mail</a></li>
            <li data-link="#"><a href="#">Senha</a></li>
            <li data-link="#"><a href="login.php">Fazer Login</a></li>
        </ul>
    </div>

    <div id="sidebar" class="sidebar">
        <div class="sidebar-container">
            <button class="close-sidebar" onclick="toggleSidebar()">Fechar</button>
            <div id="sidebar-hero">
                <img id="assistent-bar-img" src="../../../public/images/customer_6842168.png" alt="">
                <h2>Você precisa de ajuda?</h2>
            </div>
            <div id="sidebar-info">
                <p id="text-sidebar">Utilize as teclas do teclado para te ajudar!</p>
                <p id="text-sidebar2">Utilize o <span>TAB ou SHIFT + TAB</span> para navegar no formulário.</p>
                <p id="text-sidebar-portrait">Toque e segure em qualquer canto da página para ativar o <span>menú flutuante !</span></p>
                <img id="keyboard-gif" src="../../../public/images/animated-keyboard.gif" alt="">
                <img id="screen-gif" src="../../../public/images/animate-screen-phone.gif" alt="">

            </div>
        </div>
    </div>
    <script src="../../../public/js/cadastro.js"></script>
</body>
</html>
