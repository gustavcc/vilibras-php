<?php
session_start();

// se não tiver logado, vai para o login
if (!isset($_SESSION['login'])) {
    header("Location: ../usuario/login.php?");
    exit();
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VILIBRAS</title>

    <link rel="icon" href="../../../public/images/Logo.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../../../public/css/contentDicio.css">
</head>

<body>

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
          <div class="vw-plugin-top-wrapper"></div>
        </div>
        </div>

            <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
      <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
      </script>

    <header>
        <div class="menu-top">
            <div class="logo">
                <a href="#"><img src="../../../public/images/Logo.png" alt=""></a>
                <a id="logoname" href="#">VILIBRAS</a>
            </div>

            <div id="menu-top" class="menu-right">
                <div id="search-box" class="search-box">
                <select id="search" class="search-text">
                    
                </select>
                
                    <a class="search-btn" href="#">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                </div>
                <label class="container-box">
                    <input id="checkbox" checked="checked" type="checkbox">
                    <svg viewBox="0 0 384 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="moon">
                        <path
                            d="M223.5 32C100 32 0 132.3 0 256S100 480 223.5 480c60.6 0 115.5-24.2 155.8-63.4c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6c-96.9 0-175.5-78.8-175.5-176c0-65.8 36-123.1 89.3-153.3c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z">
                        </path>
                    </svg>
                    <svg viewBox="0 0 512 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="sun">
                        <path
                            d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z">
                        </path>
                    </svg>
                </label>
                <div class="login">
                <a href="Dashboard">Login</a>
                </div>
                <div class="menu-user">
                    <ul class="dropdown-menu">
                        <li>
                            <i id="menu-icon" class="fa-solid fa-user"></i>
                            <ul class="dropdown">
                                <li>
                                    <p>Olá, </p>
                                </li>
                                <li><a href="#">
                                        <span><i class="fa-solid fa-house"></i></span>
                                        <span>Acessar Conta</span>
                                    </a></li>
                                <li><a id="sair" href="#">
                                        <span><i class="fa-solid fa-right-from-bracket"></i></span>
                                        <span>Sair</span>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button id="openMenu"><i class="fa-solid fa-bars"></i></button>
            </div>
        </div>
        <div id="menu-bottom" class="menu-bottom">
            <div id="menu">
                <button id="closeMenu"><i class="fa-solid fa-xmark"></i></button>
                <a class="b-link" href="../dicionario/dicionario.php?categoria=<?php echo $_GET['categoria']?>">Dicionário</a> <!--aparecer se for autenticado-->
                <a class="b-link" href="contentDicio.php?categoria=hardware">Hardware</a>
                <a class="b-link" href="contentDicio.php?categoria=software">Software</a>
                <a class="b-link" href="contentDicio.php?categoria=conectividades">Conectividades</a>
                <a class="b-link" href="contentDicio.php?categoria=armazenamento_dados">Armazenamento de Dados</a>
            </div>
        </div>
    </header>

<main>

        <div class="Dictionary-Content">
            
        </div>

</main>


<script src="../../../public/js/contentDicio.js"></script>
    
<?php
require_once("../base/footer.php");
require_once("../../actions/dicionario/visualizarVideos.php");
?>

</body>
</html>