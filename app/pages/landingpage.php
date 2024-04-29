<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VILIBRAS</title>

    <link rel="icon" href="../../public/images/Logo.png">

    <link rel="stylesheet" href="../../public/css/landingpage.css">
    <link rel="stylesheet" href="../../public/css/base.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="../../public/js/base.js" type="text/javascript" defer ></script>
    <script src="../../public/js/landingpage.js" type="text/javascript" defer></script>
</head>

<body>

    <!-- <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>

    <script src="https://vlibras.gov.br/app/vlibras-plugin.js" defer></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script> -->

    <header>
        <div class="logo">
            <button id="openMenu"><i class="fa-solid fa-bars"></i></button>
            <a href="#"><img src="../../public/images/Logo.png" alt=""></a>
            <a id="logoname" href="#">VILIBRAS</a>
        </div>

        <div class="menu-right">
            <nav id="menu">
                <button id="closeMenu"><i class="fa-solid fa-xmark"></i></button>
                <a class="b-link" href="dashboard.php">Home</a> <!--aparecer se for autenticado-->
                <a class="b-link" href="questoes.php">Questões</a>
                <a class="b-link" href="aulas.php">Aulas</a>
                <a class="b-link" href="#">Dicionário</a>
                <div class="search-box">
                    <input type="text" class="search-text" placeholder="Pesquisar...">
                    <a class="search-btn" href="#">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                </div>
            </nav>
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
            <!-- <div class="login">
            <a href="Dashboard">Entrar</a>
        </div> -->
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
        </div>
    </header>

    <main>
        <div class="libras-main">
            <div class="libras-text">
                <h1 class="title-main">VILIBRAS</h1>
                <p>O Vocabulário de
                    Informática em Libras (VILIBRAS) está aqui para te ensinar LIBRAS voltado para a informática e como se
                    comunicar com a comunidade surda. Comece hoje a aprender!</p>
            </div>
            <div class="libras-img">
                <img src="../../public/images/ensinando-libras.jpg" alt="Imagem">
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
                <img src="../../public/images/ajudando-uns-aos-outros.jpg" alt="Alfabeto">
            </div>
        </div>

        <div class="landing principios">
            <div class="text">
                <h1>Princípios básicos da Libras</h1>
            </div>
            <div class="box-principios">
                <div class="box">
                    <img src="../../public/images/image ia 2.jpeg" alt="">
                    <h2>Configuração de mãos</h2>
                    <p>Cada sinal é formado por uma ou mais configurações de mãos que representam um fonema, letra ou
                        palavra em português.</p>
                </div>
                <div class="box box-center">
                    <img src="../../public/images/lingua-gestual-com-as-maos-no-estudio.jpg" alt="">
                    <h2>Movimento e direcionalidade</h2>
                    <p>O movimento das mãos, a velocidade, a direção e o ponto de contato com o corpo são elementos
                        cruciais na formação de um sinal em Libras.</p>
                </div>
                <div class="box">
                    <img src="../../public/images/lib 1.jpeg" alt="">
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
                <a href="dicionario.php">Dicionário</a>
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
                    <a href="aulas.php">Aulas</a>
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
                    <a href="questoes.php">Questões</a>
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
                        <a href="cadastro-aluno.php">Cadastre-se</a>
                    </div>
                    <div class="button">
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </div>
            <div class="img-inicio-final">
                <img src="../../public/images/image ia 2.jpeg" alt="Alfabeto">
            </div>
        </div>

        <div class="return-top">
            <a href="#"><i class="fa-solid fa-arrow-up"></i></a>
        </div>
    </main>

    <footer>
        <div class="footer_section">
            <div class="footer-item">
                <h2>VILIBRAS</h2>
                <p>
                    <i class="fa-solid fa-address-card"></i>
                    <a href="#">Sobre</a>
                </p>
                <p>
                    <i class="fa-solid fa-phone"></i>
                    <a href="#">Contato</a>
                </p>
            </div>
            <div class="footer-item">
                <h2>Ajuda</h2>
                <p>
                    <i class="fa-regular fa-circle-question"></i>
                    <a href="#">FAQ</a>
                </p>
                <p>
                    <i class="fa-regular fa-circle-question"></i>
                    <a href="#">Alguma Dúvida?</a>
                </p>
            </div>
            <div class="footer-item social">
                <h2> Siga-nos </h2>
                <ul>
                    <li> <a href="" target="_blank"> <i class="fa-brands fa-instagram"></i> </a></li>
                    <li> <i class="fa-brands fa-linkedin-in"></i> </li>
                    <li> <i class="fa-brands fa-youtube"></i> </li>
                    <li> <i class="fa-brands fa-twitter"></i> </li>
                </ul>
            </div>
        </div>
        <p class="rights">Copyright © VILIBRAS | All Rights Reserveds</p>
    </footer>

</body>
</html>