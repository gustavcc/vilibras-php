<?php

require_once("../../config/conecta.php");

conecta();

global $mysqli;

$query = "SELECT * FROM feedback";

$resultado = $mysqli->query($query);

$elementos = [];

while ($row = $resultado->fetch_assoc()) {
    $elementos[] = $row; // Adiciona cada linha do resultado ao array $elementos
}

desconecta();

$elementos_json = json_encode($elementos);

?>

<script>

var elementos = <?php echo $elementos_json;?>;

elementos.forEach(function(elemento){

    const criarDiv = document.createElement('div');
    criarDiv.className = 'duvida-resposta';

    const criarTitulo = document.createElement('h2');
    criarTitulo.className = 'title';
    criarTitulo.textContent = elemento.titulo;

    const criarDescricao = document.createElement('p');
    criarDescricao.className = 'descricao';
    criarDescricao.textContent = elemento.descricao;

    const criarData = document.createElement('p');
    criarData.className = 'data';
    criarData.textContent = elemento.data_dia;

    criarDiv.appendChild(criarTitulo);
    criarDiv.appendChild(criarDescricao);

    if (elemento.resposta){
        const criarResposta = document.createElement('p');
        criarResposta.className = 'answer-content';
        criarResposta.textContent = elemento.resposta;

        const criarSummary = document.createElement("summary");
        criarSummary.className = 'answer';
        criarSummary.textContent = 'Resposta';

        const criarDetails = document.createElement('details');
        criarDetails.appendChild(criarSummary);
        criarDetails.appendChild(criarResposta);

        criarDiv.appendChild(criarDetails);
    }

    criarDiv.appendChild(criarData);

    var main = document.querySelector('main');
    main.appendChild(criarDiv);

})

</script>