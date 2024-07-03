<?php
require_once("../../actions/usuario/identifyUsuarioLogado.php");

// se não tiver logado, vai para o login
if (!isset($_SESSION['login'])) {
    header("Location: ../usuario/login.php?");
    exit();
}?>

<?php
require_once("../base/cabecalho.php");
require_once("../../actions/questoes/mostrarQuestoes.php");
require_once("../../actions/questoes/getQuestoesAcertou.php");
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
                <p class="text">Seja bem-vindo(a), <?=htmlspecialchars($usuarioLogado['nome'])?>, ao seu <span id="dash">Dashboard</span></p>
            </div>
            <img src="../../../public/images/desktop computer-rafiki.svg" alt="">

            </div>
        </section>
        <p class="title">Questões</p>
        <section class="questoes">
            <a href="../questoes/questoes.php" class="box-questoes">
                <i id="icon-check" class="fa-regular fa-circle-check"></i>
                <p class="text">Lista de Questões</p>
            </a>
            <div class="box-desempenho">
                <div class="text-desempenho">
                    <i id="icon-i" class="fa-solid fa-chart-simple"></i>
                    <p class="text">Desempenho</p>
                </div>
                <div class="datas-desempenho">
                    <canvas id='chartsQuestion'></canvas>
                </div>

            </div>
        </section>
        <p class="title">Dicionário</p>
        <section class="dicionario">
            <a href="../dicionario/dicionario.php" class="box-dicionario">
                <i id="icon-t" class="fa-solid fa-book"></i>
                <p class="text">Dicionário de tradução</p>
            </a>
        </section>
        <p class="title">Aulas</p>
        <section class="aulas">
            <a href="../aulas/aulas.php" class="box-aulas">
                <i id="icon-a" class="fa-solid fa-users-rectangle"></i>
                <p class="text">Aperfeiçoe seu aprendizado</p>
            </a>
        </section>
        <p class="title">Alguma Dúvida?</p>
        <section class="duvidas">
            <a href="../faq/faq.php" class="box-duvidas">
                <i id="icon-d" class="fa-solid fa-question"></i>
                <p class="text">Acesse a nossa central de dúvidas</p>
            </a>
        </section>
    </main>

    <aside>
        <section class="perfil">
            <p class="text">Perfil de Usuário</p>
            <a href="../perfil/perfil.php" class="image-perfil">
                <img id="image" src="<?=$usuarioLogado['path_img']?>" alt="Perfil usuário">
            </a>
            <a href="../perfil/perfil.php" class="box-perfil">
                <p id="user-perfil"><?=htmlspecialchars($usuarioLogado['nome'])?></p>
            </a>
            <div class="calendar">
                <div class="header-calendar">
                    <div class="btn" id="previous"><i class="fa-solid fa-angle-left"></i></div>
                    <div class="data">
                        <div id='mes'></div>
                        <div id='ano'></div>
                    </div>
                    <div class="btn" id='next'><i class="fa-solid fa-angle-right"></i></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Dom</td>
                            <td>Seg</td>
                            <td>Ter</td>
                            <td>Qua</td>
                            <td>Qui</td>
                            <td>Sex</td>
                            <td>Sab</td>
                        </tr>
                    </thead>
                    <tbody id="dias">
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td class="event">1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td class="event">3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td class="proximo-mes">7</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </aside>

<!-- importanto o gráficos do chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

var qtdQuestoesErrou = <?=$qtdQuestoesErrou?>;
var qtdQuestoesAcertou = <?=$qtdQuestoesAcertou?>;

const charts = document.getElementById('chartsQuestion');

if (qtdQuestoesAcertou==0 && qtdQuestoesErrou==0) {
    new Chart(charts, {
    type: 'doughnut',
    data: {
        labels: [
        'Ainda não respondeu!'
        ],
        datasets: [{
        label: 'Quantidade',
        data: [qtdQuestoesAcertou, qtdQuestoesErrou],
        backgroundColor: [
            '#fc6060'
        ],
        hoverOffset: 4,
        }] 
        }
    });
}

new Chart(charts, {
    type: 'doughnut',
    data: {
        labels: [
        'Acertos',  
        'Erros'
        ],
        datasets: [{
        label: 'Quantidade',
        data: [qtdQuestoesAcertou, qtdQuestoesErrou],
        backgroundColor: [
            '#00d05a',
            '#fc6060'
        ],
        hoverOffset: 4,
        }] 
    }
});

</script>

<?php
require_once("../base/footer.php");
?>