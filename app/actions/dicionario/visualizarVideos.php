<?php
require_once("../../config/conecta.php");

// Conecta ao banco de dados
conecta();

global $mysqli;

if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
    $query = "SELECT * FROM $categoria ORDER BY titulo";
} 

$resultado = $mysqli->query($query);

$elementos = []; // Inicializa um array para armazenar os elementos

while ($row = $resultado->fetch_assoc()) {
    $elementos[] = $row; // Adiciona cada linha do resultado ao array $elementos
}

// Desconecta do banco de dados
desconecta();

// Converte o array $elementos para JSON para ser usado no JavaScript
$elementos_json = json_encode($elementos);
?>


<script>
    
// Agora, $elementos_json contém os dados no formato JSON que podem ser utilizados no JavaScript
var elementos = <?php echo $elementos_json; ?>;

elementos.forEach(function(elemento) {
    // Seleciona o elemento pai onde as novas divs serão adicionadas
    var dictionaryContent = document.querySelector('.Dictionary-Content');
    var search = document.querySelector('#search')

    // Adiciona os options ao select
    const criarOption = document.createElement('option');
    criarOption.value = elemento.id_elemento
    criarOption.textContent = elemento.titulo;

    // Cria um div para cada elemento da consulta
    const criarDiv = document.createElement('div');
    criarDiv.id = elemento.id_elemento; // Define o ID da div com base no ID do hardware
    criarDiv.className = 'Content';

    // Cria um h2 dentro da div criada
    const criarH2 = document.createElement('h2');
    criarH2.className = 'Title-Video';
    criarH2.textContent = elemento.titulo; // Define o texto do h2 com base no título do hardware

    // Criar um iframe na div
    const criarIframe = document.createElement('iframe');
    criarIframe.src = elemento.src;
    criarIframe.width = elemento.width;
    criarIframe.heigth = elemento.height;
    criarIframe.title = elemento.title;
    criarIframe.setAttribute('frameborder', '0'); // Define o atributo frameborder
    criarIframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'); // Define o atributo allow
    criarIframe.setAttribute('allowfullscreen', ''); // Define o atributo allowfullscreen

    // Cria um parágrafo (p) para a descrição
    const criarP = document.createElement('p');
    criarP.className = 'Descrição';
    criarP.textContent = elemento.descricao; // Define o texto do parágrafo com base na descrição do hardware

    // Adiciona o h2, o iframe e o parágrafo dentro da div
    criarDiv.appendChild(criarH2);
    criarDiv.appendChild(criarIframe);
    criarDiv.appendChild(criarP);

    // Adiciona a div criada ao elemento pai (.Dictionary-Content)
    dictionaryContent.appendChild(criarDiv);
    search.appendChild(criarOption);
});
</script>