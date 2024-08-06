<?php
// se não tiver logado, vai para o login
if (!isset($_SESSION['login-admin'])) {
    header("Location: ../admin/loginAdmin.php?");
    exit();
}

require_once("../../config/conecta.php");

conecta();

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
    
var elementos = <?php echo $elementos_json; ?>;
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

    criarOptionEdit.addEventListener('click', function() {
                scrollPosition = window.scrollY; // Salva a posição de rolagem atual
                localStorage.setItem('scrollPosition', scrollPosition); // Salva a posição de rolagem no localStorage
                document.body.style.top = `-${scrollPosition}px`; // Define a posição de rolagem no estilo top do body
                document.body.classList.add('no-scroll'); // Adiciona a classe para desativar a rolagem

                const criarForm = document.createElement('form');
                criarForm.method = 'get';
                criarForm.className = 'receivers';
                criarForm.action = '../../actions/faqAdmin/editQuestionAdmin.php';
                criarForm.style.display = 'flex';

                const criarOrganizer = document.createElement('div');
                criarOrganizer.className = 'organizer';

                const criarBottom = document.createElement('div');
                criarBottom.className = 'fundo';

                const criarConfirm = document.createElement('div');
                criarConfirm.className = 'confirm';
                criarConfirm.id = 'confirmEdit';

                const idPergunta = document.createElement('input');
                idPergunta.type = 'hidden';
                idPergunta.value = elemento.id_feedback;
                idPergunta.name = 'id_feedback';

                const criarInformTitulo = document.createElement('h2');
                criarInformTitulo.className = 'inform';
                criarInformTitulo.id = 'InformTitulo';
                criarInformTitulo.textContent = 'Titulo';

                const criarInform = document.createElement('h2');
                criarInform.className = 'inform';
                criarInform.id = 'InformDescricao';
                criarInform.textContent = 'Descrição';

                const textAreaEditTitulo = document.createElement('textarea');
                textAreaEditTitulo.className = 'textAreaEdit';
                textAreaEditTitulo.id = 'textAreaTitulo';
                textAreaEditTitulo.name = 'titulo';
                textAreaEditTitulo.value = elemento.titulo;
                textAreaEditTitulo.required = true;
                
                const textAreaEditDescricao = document.createElement('textarea');
                textAreaEditDescricao.className = 'textAreaEdit';
                textAreaEditDescricao.id = 'textAreaDescricao';
                textAreaEditDescricao.name = 'descricao';
                textAreaEditDescricao.value = elemento.descricao;
                textAreaEditDescricao.required = true;

                const criarButonCancel = document.createElement('button');
                criarButonCancel.className = 'buttonCancel';
                criarButonCancel.textContent = 'Cancelar';

                const criarButonConfirm = document.createElement('button');
                criarButonConfirm.className = 'buttonConfirm';
                criarButonConfirm.textContent = 'Editar';

                criarOrganizer.appendChild(criarButonCancel);
                criarOrganizer.appendChild(criarButonConfirm);

                criarConfirm.appendChild(criarInformTitulo);
                criarConfirm.appendChild(textAreaEditTitulo);

                criarConfirm.appendChild(criarInform);
                criarConfirm.appendChild(textAreaEditDescricao);
                criarConfirm.appendChild(criarOrganizer);
                criarConfirm.appendChild(idPergunta);

                criarBottom.appendChild(criarConfirm);
                criarForm.appendChild(criarBottom);
                document.querySelector('main').appendChild(criarForm);

                textAreaEditDescricao.focus();

                criarButonCancel.addEventListener('click', function() {
                    document.querySelector('main').removeChild(criarForm);
                    document.body.classList.remove('no-scroll');
                    window.scrollTo(0, scrollPosition); 
                    localStorage.removeItem('scrollPosition');
                });
            });

            criarOptionRemove.addEventListener('click', function() {
                
                scrollPosition = window.scrollY; // Salva a posição de rolagem atual
                localStorage.setItem('scrollPosition', scrollPosition); // Salva a posição de rolagem no localStorage
                document.body.style.top = `-${scrollPosition}px`; // Define a posição de rolagem no estilo top do body
                document.body.classList.add('no-scroll'); // Adiciona a classe para desativar a rolagem

                const criarForm = document.createElement('form');
                criarForm.method = 'get';
                criarForm.className = 'receivers';
                criarForm.action = '../../actions/faqAdmin/removePerguntaAdmin.php';
                criarForm.style.display = 'flex';

                const criarOrganizer = document.createElement('div');
                criarOrganizer.className = 'organizer';

                const criarBottom = document.createElement('div');
                criarBottom.className = 'fundo';

                const criarConfirm = document.createElement('div');
                criarConfirm.className = 'confirm';

                const idPergunta = document.createElement('input');
                idPergunta.type = 'hidden';
                idPergunta.name = 'id_pergunta';
                idPergunta.value = elemento.id_feedback;

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
                criarButonConfirm.type = 'submit';

                criarOrganizer.appendChild(criarButonCancel);
                criarOrganizer.appendChild(criarButonConfirm);

                criarConfirm.appendChild(criarInform);
                criarConfirm.appendChild(criarLastInform);
                criarConfirm.appendChild(criarOrganizer);
                criarConfirm.appendChild(idPergunta);

                criarBottom.appendChild(criarConfirm);
                criarForm.appendChild(criarBottom);
                document.querySelector('main').appendChild(criarForm);

                criarButonCancel.addEventListener('click', function() {
                    document.querySelector('main').removeChild(criarForm);
                    document.body.classList.remove('no-scroll');
                    window.scrollTo(0, scrollPosition); 
                    localStorage.removeItem('scrollPosition');
                });
            });


    criarOrder.appendChild(criarButon);  
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
        
        const organizerEditsResposta = document.createElement('div')

        const editResposta = document.createElement('button');
        editResposta.innerHTML = 'Editar';
        editResposta.className = 'responder';
        editResposta.style.fontSize = '14px';

        editResposta.addEventListener('click', function(){

        scrollPosition = window.scrollY; // Salva a posição de rolagem atual
        localStorage.setItem('scrollPosition', scrollPosition); // Salva a posição de rolagem no localStorage
        document.body.style.top = `-${scrollPosition}px`; // Define a posição de rolagem no estilo top do body
        document.body.classList.add('no-scroll'); // Adiciona a classe para desativar a rolagem

        const criarForm = document.createElement('form');
        criarForm.className = 'receivers';
        criarForm.action = "../../actions/faqAdmin/editResposta.php";
        criarForm.method = 'get';
        criarForm.style.display = 'flex';

        const criarOrganizer = document.createElement('div');
        criarOrganizer.className = 'organizer';

        const criarBottom = document.createElement('div');
        criarBottom.className = 'fundo';

        const criarConfirm = document.createElement('div');
        criarConfirm.className = 'confirm';
        criarConfirm.id = 'confirmEditResposta'

        const criarInformResposta = document.createElement('h2');
        criarInformResposta.className = 'inform';
        criarInformResposta.id = 'InformTitulo';
        criarInformResposta.textContent = 'Resposta';

        const textAreaEditResposta = document.createElement('textarea');
        textAreaEditResposta.className = 'textAreaEdit';
        textAreaEditResposta.id = 'textAreaTitulo'
        textAreaEditResposta.name = 'resposta'
        textAreaEditResposta.value = elemento.resposta;
        textAreaEditResposta.required = true;

        const idPergunta = document.createElement('input');
        idPergunta.type = 'hidden';
        idPergunta.name = 'id_feedback';
        idPergunta.value = elemento.id_feedback;

        const criarButonCancel = document.createElement('button');
        criarButonCancel.className = 'buttonCancel';
        criarButonCancel.textContent = 'Cancelar';

        const criarButonConfirm = document.createElement('button');
        button.type = 'submit';
        criarButonConfirm.className = 'buttonConfirm';
        criarButonConfirm.textContent = 'Editar';

        criarOrganizer.appendChild(criarButonCancel);
        criarOrganizer.appendChild(criarButonConfirm);

        criarConfirm.appendChild(criarInformResposta);
        criarConfirm.appendChild(textAreaEditResposta);
        criarConfirm.appendChild(idPergunta);

        criarConfirm.appendChild(criarOrganizer);

        criarBottom.appendChild(criarConfirm);
        criarForm.appendChild(criarBottom)
        main.appendChild(criarForm);

        textAreaEditResposta.focus();
        
        criarButonCancel.addEventListener('click', function() {
                    document.querySelector('main').removeChild(criarForm);
                    document.body.classList.remove('no-scroll');
                    window.scrollTo(0, scrollPosition); 
                    localStorage.removeItem('scrollPosition');
                });


        })

        const removeResposta = document.createElement('button');
        removeResposta.innerHTML = 'Remover';
        removeResposta.className = 'responder'
        removeResposta.style.fontSize = '14px';


    removeResposta.addEventListener('click',function(){

        scrollPosition = window.scrollY; // Salva a posição de rolagem atual
        localStorage.setItem('scrollPosition', scrollPosition); // Salva a posição de rolagem no localStorage
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
        criarInform.textContent = 'Excluir resposta';

        const criarLastInform = document.createElement('p');
        criarLastInform.className = 'lastInform';
        criarLastInform.textContent = 'Excluir a resposta permanentemente?';

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
                    document.querySelector('main').removeChild(criarForm);
                    document.body.classList.remove('no-scroll');
                    window.scrollTo(0, scrollPosition); 
                    localStorage.removeItem('scrollPosition');
                });

        criarButonConfirm.addEventListener('click', function() {
            const url = `../../actions/faqAdmin/removeResposta.php?id_pergunta=${elemento.id_feedback}`;
            window.location.href = url;
        });

    })

        organizerEditsResposta.appendChild(removeResposta);
        organizerEditsResposta.appendChild(editResposta);

        criarDetails.appendChild(organizerEditsResposta);

        criarDiv.appendChild(criarDetails); 

    } else {
        const criarResponder = document.createElement('button');
        criarResponder.className = 'responder';
        criarResponder.innerHTML = 'Responder';

        criarDiv.appendChild(criarResponder);

        criarResponder.addEventListener('click',function(){

            scrollPosition = window.scrollY; // Salva a posição de rolagem atual
            localStorage.setItem('scrollPosition', scrollPosition); // Salva a posição de rolagem no localStorage
            document.body.style.top = `-${scrollPosition}px`; // Define a posição de rolagem no estilo top do body
            document.body.classList.add('no-scroll'); // Adiciona a classe para desativar a rolagem
            
            const form = document.createElement('form');
            form.action = "../../actions/faqAdmin/responder.php";
            form.className = "receivers";
            form.method = "get";

            const fundo = document.createElement('div');
            fundo.className = 'fundo';

            const confirm = document.createElement('div');
            confirm.className = 'confirm';
            confirm.id = 'confirmAdm';

            const createDiv = document.createElement('div');

            const criarTeste = document.createElement('div');
            criarTeste.className = 'teste';

            const tituloResponder = document.createElement('h2');
            tituloResponder.className = 'inform';
            tituloResponder.innerHTML = 'Resposta:'

            const criarClose = document.createElement('span');
            criarClose.className = 'close';
            criarClose.innerHTML = '×';

            const textAreaResposta = document.createElement('textarea');
            textAreaResposta.placeholder = 'VILIBRAS é um site sobre LIBRAS.';
            textAreaResposta.className = 'textAreaEdit'
            textAreaResposta.rows = '2';
            textAreaResposta.name = 'Resposta';
            textAreaResposta.required = true;

            const idPergunta = document.createElement('input');
            idPergunta.type = 'hidden';
            idPergunta.value = elemento.id_feedback;
            idPergunta.name = 'id_pergunta';

            const criarOrganizer = document.createElement('div');
            criarOrganizer.className = 'organizer'

            const criarButonLimpar = document.createElement('button');
            criarButonLimpar.textContent = 'Limpar';
            criarButonLimpar.type = 'reset';

            const criarButonConfirm = document.createElement('button');
            criarButonConfirm.type = 'submit';
            criarButonConfirm.textContent = 'Enviar';

            criarOrganizer.appendChild(criarButonLimpar);
            criarOrganizer.appendChild(criarButonConfirm);

            criarTeste.appendChild(tituloResponder);
            criarTeste.appendChild(criarClose);

            createDiv.appendChild(criarTeste);
            createDiv.appendChild(textAreaResposta);

            confirm.appendChild(createDiv);
            confirm.appendChild(idPergunta)
            confirm.appendChild(criarOrganizer);

            fundo.appendChild(confirm);
            form.appendChild(fundo);
            form.style.display = 'flex';
            main.appendChild(form);

            criarClose.addEventListener('click', function() {
                main.removeChild(form);
            });
        });
    }

    criarDiv.appendChild(criarData);

    var main = document.querySelector('main');
    main.appendChild(criarDiv);

});
</script>
