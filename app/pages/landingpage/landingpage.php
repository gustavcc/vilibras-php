<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: ../dashboard/dashboard.php");
    exit();
}?>


<?php
require_once("../base/cabecalho.php");
?>

    <link rel="stylesheet" href="../../../public/css/landingpage.css">
    <script src="../../../public/js/landingpage.js" type="text/javascript" defer></script>

    <main>

        <div class="libras-main">
            <div class="libras-text">
                <h1 class="title-main">VILIBRAS</h1>
                <p>O Vocabulário de
                    Informática em Libras (VILIBRAS) está aqui para te ensinar LIBRAS voltado para a informática e como se
                    comunicar com a comunidade surda. Comece hoje a aprender!</p>
            </div>
            <div class="libras-img">
                <img src="../../../public/images/ensinando-libras.jpg" alt="Imagem">
            </div>
        </div>

        <div class="landing inicio-final">
            <div class="text-inicio-final">
                <h1>História da Língua de Sinais Brasileira (Libras)</h1>
                <p>A Libras é uma língua visual-gestual utilizada pela comunidade surda brasileira. Sua história remonta
                    aos tempos do Império, quando a primeira escola para surdos foi fundada no Rio de Janeiro em 1857.
                </p>
            </div>
            <div class="img-inicio-final">
                <img src="../../../public/images/ajudando-uns-aos-outros.jpg" alt="Alfabeto">
            </div>
        </div>

        <div class="landing principios">
            <div class="text">
                <h1>Princípios básicos da Libras</h1>
            </div>
            <div class="box-principios">
                <div class="box">
                    <img src="../../../public/images/image ia 2.jpeg" alt="">
                    <h2>Configuração de mãos</h2>
                    <p>Cada sinal é formado por uma ou mais configurações de mãos que representam um fonema, letra ou
                        palavra em português.</p>
                </div>
                <div class="box box-center">
                    <img src="../../../public/images/lingua-gestual-com-as-maos-no-estudio.jpg" alt="">
                    <h2>Movimento e direcionalidade</h2>
                    <p>O movimento das mãos, a velocidade, a direção e o ponto de contato com o corpo são elementos
                        cruciais na formação de um sinal em Libras.</p>
                </div>
                <div class="box">
                    <img src="../../../public/images/lib 1.jpeg" alt="">
                    <h2>Expressão facial e corporal</h2>
                    <p>A expressão facial e corporal do sinalizador ajudam a transmitir o humor, a intenção e o
                        significado de uma frase em Libras.</p>
                </div>
            </div>
        </div>

        <div class="landing vocabulario">
            <div class="text">
                <h1>Vocabulário de informática em Libras</h1>
            </div>
            <div class="box-vocabulario">
                <div class="box-voc">
                    <h2>Números</h2>
                    <p>1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 20, 50, 100, 1000, 1 milhão</p>
                </div>
                <div class="box-voc">
                    <h2>Cores</h2>
                    <p>Azul, verde, amarelo, vermelho, roxo, rosa, laranja, preto, branco, cinza</p>
                </div>
                <div class="box-voc">
                    <h2>Dias da semana</h2>
                    <p>Segunda-feira, terça-feira, quarta-feira, quinta-feira, sexta-feira, sábado, domingo</p>
                </div>
                <div class="box-voc">
                    <h2>Hardware</h2>
                    <p>Monitor, teclado, mouse, CPU, cabo de rede, bateria, switch, roteador</p>
                </div>
            </div>
            <div class="text-adicional">
                <p>Acesse o nosso <span>dicionário</span> virtual e saiba mais</p>
            </div>
            <div class="button">
                <a href="../dicionario/dicionario.php">Dicionário</a>
            </div>
        </div>

        <div class="landing generic-back">
            <div class="generic">
                <div class="text-generic">
                    <h1>Aulas incríveis</h1>
                </div>
                <div class="box-generic">
                    <div class="box-a">
                        <h2>Conteúdos diversos</h2>
                        <p>Cores, números, hardware, software lógica, sintaxe</p>
                    </div>
                    <div class="box-a">
                        <h2>Professores únicos</h2>
                        <p>Gustavo, Yuri, Adriam, Rafael e Ellen</p>
                    </div>
                </div>
                <div class="text-adicional">
                    <p>Acesse a aba de <span>aulas</span> e comece a aprender</p>
                </div>
                <div class="button">
                    <a href="../aulas/aulas_v2.php">Aulas</a>
                </div>
            </div>
        </div>

        <div class="landing generic-back">
            <div class="generic">
                <div class="text-generic">
                    <h1>Lista de Exercícios</h1>
                </div>
                <div class="box-generic">
                    <div class="box-a">
                        <h2>Extensa gama de conteúdos</h2>
                        <p>Hardware, software, lógica, programação, sintaxe</p>
                    </div>
                    <div class="box-a">
                        <h2>Criadores</h2>
                        <p>Gustavo, Yuri, Adriam, Rafael e Ellen</p>
                    </div>
                </div>
                <div class="text-adicional">
                    <p>Acesse a aba de <span>questões</span> e comece a praticar</p>
                </div>
                <div class="button">
                    <a href="../questoes/questoes.php">Questões</a>
                </div>
            </div>
        </div>

        <div class="landing inicio-final">
            <div class="text-inicio-final">
                <h1>Comece agora a aprender Libras!</h1>
                <p>Não perca a oportunidade de aprender informática de um jeito único, de se comunicar com a comunidade
                    surda e aprender uma língua rica e fascinante. Faça seu cadastro em nosso curso online de Libras.
                </p>
                <div id="button-final">
                    <div class="button">
                        <a href="../usuario/cadastro.php">Cadastre-se</a>
                    </div>
                    <div class="button">
                        <a href="../usuario/login.php">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="img-inicio-final">
                <img src="../../../public/images/image ia 2.jpeg" alt="Alfabeto">
            </div>
        </div>

        <div class="return-top">
            <a href="#"><i class="fa-solid fa-arrow-up"></i></a>
        </div>
    </main>

<?php
require_once("../base/footer.php");
?>