<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../public/images/Logo.png" type="image/x-icon">
    <title>VILIBRAS | SOBRE NÓS</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
     <link rel="stylesheet" href="../../../public/css/sobre-portrait.css" media="screen and (orientation: portrait)">
     <link rel="stylesheet" href="../../../public/css/sobre.css">
</head>
<body>
    <div class="scroll-btn"><a href="../landingpage/landingpage.php"><img id="home-icon" src="../../../public/images/home-icon.png" alt=""><div></a><a href="../usuario/cadastro.php"><img class="options" src="../../../public/images/enter_1828395.png" alt=""></a> <a href="../usuario/login.php"><img class="options" src="../../../public/images/user-add_3917717.png" alt=""></a></div></div>
    <!-- <div class="main-p"></div> -->
    <div id="main">
        <div id="top">
            <h1 id="top-h1">vilibras.</h1>
        </div>
        <div id="center">
            <div class="content" id="content">
                <h4>SOBRE NÓS</h4>
                <h3><i><strong>VILIBRAS</strong></i> Descrição geral da plataforma</h3>
                <section>
                    <img id="icon1" class="icon" src="../../../public/images/ellen.jpeg" alt="">
                    <p>Durante muitos anos, pessoas surdas eram consideradas deficientes e eram excluídas de diversos projetos. A partir do século XIX, começaram a surgir no Brasil, as primeiras escolas de ensino em linguagem de sinais voltadas para surdos, inspiradas em modelos de outras linguagens de sinais europeias e norte-americanas. Essa é a história da LIBRAS, uma língua brasileira de sinais, que por muitos anos, transmitiu diferentes palavras levando cultura e informação até os surdos.
                    </p>
                    <img id="icon2" class="icon" src="../../../public/images/yuri.jpeg" alt="">
                    <p>A História da marginalização das pessoas surdas é ridicularizada por muitos e admirada por poucos. As raízes históricas desta marginalização remontam ao isolamento social ao qual os surdos eram submetidos e aos tratamentos totalmente desumanos que recebiam simplesmente por serem surdos. Além disso, a falta de conscientização sobre o problema na comunidade resultou em projetos visando a inclusão dos surdos na sociedade fossem pensados de forma tardia, se é que foram pensados.</p>
                    <img id="icon3" class="icon" src="../../../public/images/cardoso.jpeg" alt="">
                    <p>A princípio, medidas envolvendo a inclusão dos surdos na atualidade precisam ser levadas em consideração. Ao levarmos a problemática a um contexto atual é perceptível que soluções tecnológicas não possuem a acessibilidade digital adequada, principalmente em áreas técnicas da tecnologia, pois termos são criados e aprimorados ano após ano. Com base nessa problemática, o projeto de incluir surdos em áreas técnicas está sendo desenvolvido.</p>
                    <img id="icon4" class="icon" src="../../../public/images/adriam.jpeg" alt="">
                    <p>A relevância de criar mecanismos que influenciam na inclusão dessa parte da população visa combater os preconceitos enraizados pela sociedade sobre os surdos. Estimular a participação e auxiliar no processo de formação de indivíduos com deficiência auditiva é um passo extremamente gradual e que precisa ser atualizado e mantido.</p>
                    <img id="icon5" class="icon" src="../../../public/images/rafael.jpeg" alt="">
                    <p>O Sistema de Ensino VILIBRAS é uma ferramenta destinada a promover o acesso educacional e cultural de pessoas surdas ou com deficiência auditiva. O sistema permite que os usuários se registrem como alunos, professores ou administradores e oferece uma variedade de recursos para ensinar e aprender a Língua Brasileira de Sinais Esses recursos incluem: dicionários de língua de sinais, que permitem consultar o significado e o modo de fazer de cada língua de sinais; videoaulas, que apresentam conteúdos teóricos e práticos sobre LIBRAS; aulas transmitidas ao vivo, que permitem a interação em tempo real entre professores e alunos; e jogos e desafios, que estimulam a memória e o raciocínio dos alunos; um fórum de dúvidas para esclarecer dúvidas e trocar experiências entre os usuários; e um chat para facilitar a comunicação entre os membros da comunidade. O sistema também coleta feedback dos usuários para avaliar a qualidade dos materiais e serviços fornecidos e permite que os administradores gerenciem os tipos de materiais disponíveis. O Sistema de Aprendizagem VILIBRAS é, portanto, uma solução inovadora e inclusiva para o ensino de um idioma tão importante e rico como a LIBRAS.</p>
                </section>

            </div>
        </div>
        <div id="bottom">
            <h1 id="bottom-h1">vilibras.</h1>
            <img id="gif" src="../../../public/images/mouse-down.gif"></img>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js" integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js" integrity="sha512-AMl4wfwAmDM1lsQvVBBRHYENn1FR8cfOTpt8QVbb/P55mYOdahHD4LmHM1W55pNe3j/3od8ELzPf/8eNkkjISQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var tl = gsap.timeline({
            scrollTrigger: {
                trigger: "#main",
                start: "50% 50%",
                end: "150% 50%",
                scrub: 2,
                pin: true
            }
        });
        tl.to("#center", {
                height: "100vh",
            }, 'a')
            .to("#top", {
                top: "-60%",
            }, 'a')
            .to("#bottom", {
                bottom: "-50%",
            }, 'a')
            .to("#top-h1", {
                top: "60%"
            }, 'a')
            .to("#bottom-h1", {
                bottom: "-30%"
            }, 'a')
            .to("#center-h1", {
                top: "-10%"
            }, 'a')
            .to(".content", {
                delay: -0.2,
                marginTop: "0%"
            });
    </script>
</body>
</html>
