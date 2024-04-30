<?php
require_once("../base/cabecalho.php");
?>

<link rel="stylesheet" href="../../../public/css/dashboard.css">
<script src="../../../public/js/dashboard.js" type="text/javascript" defer></script>

    <main>
        <section id="slide" class="carrossel">
            <div class="containerSlide" id="imagens">
                <img src="../../../public/images/SL-113022-54210-35.jpg" class="imgs">
                <img src="../../../public/images/uyfydu6.jpg" class="imgs">
                <img src="../../../public/images/69603047_uyfydu4.jpg" class="imgs">
                <img src="../../../public/images/13777983_gradient_2.jpg" class="imgs">
            </div>
            <button class="button-slide" id="next-slide"><i class="fa-solid fa-chevron-right"></i></button>
            <button class="button-slide" id="back-slide"><i class="fa-solid fa-chevron-right"></i></button>
            <div class="radios-slide">
                <div class="cricle-radio">
                    <div><input id="r-1" type="radio" name="slide"></div>
                </div>
                <div class="cricle-radio">
                    <div><input id="r-2" type="radio" name="slide"></div>
                </div>
                <div class="cricle-radio">
                    <div><input id="r-3" type="radio" name="slide"></div>
                </div>
                <div class="cricle-radio">
                    <div><input id="r-4" type="radio" name="slide"></div>
                </div>
            </div>
        </section>
        <section class="recepcao">
            <div class="text-recepcao">
                <i class="fa-solid fa-location-dot"></i>
                <p class="text">Seja bem-vindo(a) ao seu <span id="dash">Dashboard</span></p>
            </div>
            <img src="../../../public/images/desktop computer-rafiki.svg" alt="">

            </div>
        </section>
        <p class="title">Questões</p>
        <section class="questoes">
            <a href="questoes.php" class="box-questoes">
                <i id="icon-check" class="fa-regular fa-circle-check"></i>
                <p class="text">Lista de Questões</p>
            </a>
            <div class="box-duvidas">
                <i id="icon-d" class="fa-solid fa-chart-simple"></i>
                <p class="text">Desempenho</p>
            </div>
        </section>
        <p class="title">Dicionário</p>
        <section class="dicionario">
            <a href="dicionario.php" class="box-dicionario">
                <i id="icon-t" class="fa-solid fa-book"></i>
                <p class="text">Dicionário de tradução</p>
            </a>
        </section>
        <p class="title">Aulas</p>
        <section class="aulas">
            <a href="aulas.php" class="box-aulas">
                <i id="icon-a" class="fa-solid fa-users-rectangle"></i>
                <p class="text">Aulas com professores infríveis</p>
            </a>
        </section>
    </main>

    <aside>
        <section class="perfil">
            <p class="text">Perfil de Usuário</p>
            <a href="perfil.php" class="image-perfil">
                <img id="image" src="../../../public/images/user.png" alt="Perfil usuário">
            </a>
            <a href="perfil.php" class="box-perfil">
                <p id="user-perfil">Gustavo</p>
            </a>
            <div class="calender">
                <p>Calender</p>
            </div>
        </section>
    </aside>

<?php
require_once("../base/footer.php");
?>