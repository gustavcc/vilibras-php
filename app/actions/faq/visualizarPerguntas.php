<?php

if (isset($_SESSION['login'])) {
    $id_usuario = ($_SESSION['usuario']);
}

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

<style>
.no-scroll {
    position: fixed;
    width: 100%;
    overflow: hidden;
}
</style>

<script>
    
var elementos = <?php echo $elementos_json;?>;
var id_usuario = <?php echo $id_usuario;?>;
var scrollPosition = 0; // Variável para armazenar a posição de rolagem

elementos.forEach(function(elemento){

    const criarDiv = document.createElement('div');
    criarDiv.className = 'duvida-resposta';
    criarDiv.id = elemento.id_feedback;

    const criarOrder = document.createElement('div');
    criarOrder.className = 'order';

    const criarTitulo = document.createElement('h2');
    criarTitulo.className = 'title';
    criarTitulo.textContent = elemento.titulo;

    criarOrder.appendChild(criarTitulo);

    if (id_usuario == elemento.id_usuario){

        const criarButon = document.createElement('button');
        criarButon.innerHTML = '.<br>.<br>.';
        criarButon.style.fontWeight = '900';

        const criarOptions = document.createElement('div');
        const criarOptionRemove = document.createElement('button');
        const criarOptionEdit = document.createElement('button');

        criarOptionEdit.innerHTML = ' <i class="fa-solid fa-pencil"></i>   Editar';
        criarOptionRemove.innerHTML = '<i class="fa-regular fa-square-minus"></i>   Excluir';

        criarOptions.className = 'options';
        criarOptions.style.display = 'none';

        criarOptions.appendChild(criarOptionEdit);
        criarOptions.appendChild(criarOptionRemove);
        criarOrder.appendChild(criarOptions);

        criarButon.addEventListener('click',function(){
            criarOptions.style.display = (criarOptions.style.display === 'none') ? 'flex' : 'none';
        });

        document.addEventListener('click',(event) => {
            if (!criarOptions.contains(event.target) && !criarButon.contains(event.target)){
                criarOptions.style.display = 'none'; 
            }
        });

        criarOptionRemove.addEventListener('click', function() {
            scrollPosition = window.scrollY; // Salva a posição de rolagem atual
            document.body.style.top = `-${scrollPosition}px`; // Define a posição de rolagem no estilo top do body
            document.body.classList.add('no-scroll'); // Adiciona a classe para desativar a rolagem

            const criarOrganizer = document.createElement('div');
            criarOrganizer.className = 'organizer';

            const criarBottom = document.createElement('div');
            criarBottom.className = 'fundo';

            const criarConfirm = document.createElement('div');
            criarConfirm.className = 'confirm';

            const criarInform = document.createElement('h2');
            criarInform.className = 'inform';
            criarInform.textContent = 'Excluir pergunta';

            const criarLastInform = document.createElement('p');
            criarLastInform.className = 'lastInform';
            criarLastInform.textContent = 'Excluir sua pergunta permanentemente?';

            const criarButonCancel = document.createElement('button');
            criarButonCancel.className = 'buttonCancel';
            criarButonCancel.textContent = 'Cancelar';

            const criarButonConfirm = document.createElement('button');
            criarButonConfirm.className = 'buttonConfirm';
            criarButonConfirm.textContent = 'Excluir';

            criarOrganizer.appendChild(criarButonCancel);
            criarOrganizer.appendChild(criarButonConfirm);

            criarConfirm.appendChild(criarInform);
            criarConfirm.appendChild(criarLastInform);
            criarConfirm.appendChild(criarOrganizer);

            criarBottom.appendChild(criarConfirm);
            main.appendChild(criarBottom);

            criarButonCancel.addEventListener('click', function() {
                main.removeChild(criarBottom);
                document.body.classList.remove('no-scroll'); // Remove a classe para reativar a rolagem
                window.scrollTo(0, scrollPosition); // Restaura a posição de rolagem
            });

            criarButonConfirm.addEventListener('click', function() {
                const url = `../../actions/faq/removePergunta.php?id_pergunta=${elemento.id_feedback}`;
                window.location.href = url;
            });
        });

        criarOrder.appendChild(criarButon);
    }    

    criarDiv.appendChild(criarOrder);

    const criarDescricao = document.createElement('p');
    criarDescricao.className = 'descricao';
    criarDescricao.textContent = elemento.descricao;

    const criarData = document.createElement('p');
    criarData.className = 'data';
    criarData.textContent = elemento.data_dia.split('-').reverse().join('-');

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

});
</script>
