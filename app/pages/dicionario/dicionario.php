<?php
require_once("../../actions/usuario/identifyUsuarioLogado.php");

// se não tiver logado, vai para o login
if (!isset($_SESSION['login'])) {
    header("Location: ../usuario/login.php?");
    exit();
}?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once("../base/cabecalho.php");
?>

<link rel="stylesheet" href="../../../public/css/dicionario.css">
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


<main>

    <div class="apresentacao-main">
        <div class="apresentacao-text">
            <h1>Vocabulário de Informática em Libras</h1>
            <p>A existência de um dicionário de informática em Libras é de extrema importância, facilitando o acesso dos surdos à tecnologia e promovendo sua inclusão digital na era digital.</p>
        </div>
    </div>

    <div class="Dictionary-Apresentation">
        <div class="text">
            <h1 id = "hardware555">Hardware</h1>
            <p>O hardware são os componentes físicos do computador, permitindo o funcionamento do mesmo de forma correta e com o melhor aproveitamento possível, sendo algo que detém grande relevância e destaque no contexto.</p>
            <div class="link-a">
                <a href="../pagesDicio/contentDicio.php?categoria=hardware" class="link-a-content" name = "hardware">Acessar</a>
            </div>
        </div>

        <div class="img">
            <img src="../../../public/images/hardware.jpg" alt="Hardware">
        </div>
    </div>

    <div class="Dictionary-Apresentation">
        <div class="text">
            <h1 id = "software555">Software</h1>
            <p>Software é o conjunto de programas, aplicativos e instruções que controlam e coordenam as operações de um computador. É a parte que permite o hardware executar tarefas e funcione de acordo com as necessidades do usuário.</p>
            <div class="link-a">
                <a href="../pagesDicio/contentDicio.php?categoria=software" class="link-a-content" name = "software" >Acessar</a>
            </div>
        </div>
        <div class="img">
            <img src="../../../public/images/software.jpg" alt="Software">
        </div>
    </div>
    
    </div>

    <div class="Dictionary-Apresentation">
        <div class="text">
            <h1 id = "conectividades555">Conectividades</h1>
            <p>Conectividades abrange os meios e métodos que viabilizam a interligação e comunicação entre dispositivos. Enquanto a conectividade se refere aos diferentes modos de interconexão, os protocolos e técnicas associados delineiam a transmissão eficiente de dados nesse ambiente interconectado.</p>
            <div class="link-a">
                <a href="../pagesDicio/contentDicio.php?categoria=conectividades" class="link-a-content" name = "conectividades">Acessar</a>
            </div>
        </div>
        <div class="img">
            <img src="../../../public/images/redes_conectividades.jpg" alt="Programação">
        </div>
    </div>

    <div class="Dictionary-Apresentation">
        <div class="text">
            <h1 id = "armazenamento_dados555" >Armazenamento de Dados</h1>
            <p>Armazenamento de dados refere-se à prática de guardar informações de maneira organizada, permitindo o acesso eficiente e seguro quando necessário. Esse processo envolve a utilização de sistemas e recursos específicos para preservar e gerenciar dados, garantindo sua integridade ao longo do tempo </p>
            <div class="link-a">
                <a href="../pagesDicio/contentDicio.php?categoria=armazenamento_dados" class="link-a-content" name = "armazenamento_dados">Acessar</a>
            </div>
        </div>
        <div class="img">
            <img src="../../../public/images/armazenamento_dados.jpeg" alt="Programação">
        </div>
    </div>
       
</main>

<!-- <script src="../../../public/js/dicionario.js"></script> -->

<script>

document.getElementById("<?php echo $_GET['categoria']?>555").scrollIntoView({ block: 'center' });

</script>

<?php
require_once("../base/footer.php");
?>