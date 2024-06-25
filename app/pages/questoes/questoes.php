<?php
session_start();

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

<link rel="stylesheet" href="../../../public/css/questoes.css">

<main>
    <?php
    if (isset($_GET['msg'])){
        $msg=$_GET['msg'];
        echo "<div class='msg'>". $msg ."</div>";
    }?>

    <?php if(isset($questoes)) { foreach($questoes as $questao): ?>
        
        <div id="<?=$questao['id_questao']?>_questao" class='questoes'>
           <div id="informations" class='text-question'>
                <div class='informations'>
                    <p class='indexQuestao'>Q.<?=$questao['id_questao']?></p>
                    <p>-</p>
                    <p class='prova'><?=$questao['test']?></p>
                    <p>-</p>
                    <p class='conteudo'><?=$questao['content']?></p>
                    <p>-</p>
                    <p class='ano'><?=$questao['year']?></p>
                </div>
                <i class='check fa-solid fa-circle-check'></i>
            </div>
            <div class="quiz">
                <p class='enunciado' id='pergunta'><?=$questao['title']?></p>
                <div class='answers'>
                    <div class="answer">
                        <p>A)</p>
                        <button onclick="verifyQuestao(this)" id='<?=$questao['correct']?>' value='A' class='btn'><?=$questao['answer_A']?></button>
                    </div>
                    <div class="answer">
                        <p>B)</p>
                        <button onclick="verifyQuestao(this)" id='<?=$questao['correct']?>' value='B' class='btn'><?=$questao['answer_B']?></button>
                    </div>
                    <div class="answer">
                        <p>C)</p>
                        <button onclick="verifyQuestao(this)" id='<?=$questao['correct']?>' value='C' class='btn'><?=$questao['answer_C']?></button>
                    </div>
                    <div class="answer">
                        <p>D)</p>
                        <button onclick="verifyQuestao(this)" id='<?=$questao['correct']?>' value='D' class='btn'><?=$questao['answer_D']?></button>
                    </div>
                    <div class="answer">
                        <p>E)</p>
                        <button onclick="verifyQuestao(this)" id='<?=$questao['correct']?>' value='E' class='btn'><?=$questao['answer_E']?></button>
                    </div>
                </div>
            </div>
            <div class='options'>
                <a href='../../pages/questoes/editarQuestaoForm.php?id=<?=$questao['id_questao']?>' id='edit'> <i class='fa-solid fa-pen-to-square'></i> </a>
                <a href='../../actions/questoes/excluirQuestao.php?id=<?=$questao['id_questao']?>' id='del'> <i class='fa-solid fa-trash'></i> </a>
            </div>
        </div>
    
    <?php endforeach; }?>

<!-- Inicio do script JavaScript -->
<script>

// função que verifica resultado da resposta selecionada pelo usuário e adiciona tal informação no banco
function verifyQuestao(e){
    const botaoSelecionado = e; 
    let isCorrect = false;

    // Define se a resposta é correta
    if (botaoSelecionado.id == botaoSelecionado.value){
        isCorrect = true;
    }

    // Selecionar alguns elementos relacionados à resposta selecionada pelo usuário
    const answer = e.parentElement;
    const answers = answer.parentElement;
    const quiz = answers.parentElement;
    const questao = quiz.parentElement;
    const text_elem = questao.children[0];
    const check = text_elem.children[1];
    const id_questao = questao.id;

    // Desativar clique nos outros botões
    for (let i=0; i<5; i++){
        answers.children[i].children[1].onclick = null;
        answers.children[i].children[1].disabled = true;
        answers.children[i].children[1].classList.add('desativado');
        answers.children[i].children[1].style.border = 'None';
    }

    // removo as classes para evitar erros de interferencia
    check.classList.remove('acertou');
    check.classList.remove('errou');

    if(isCorrect){ 
        botaoSelecionado.classList.add("correct");
        check.classList.add('acertou');

        // Desativa o clique das outras respostas
        botaoSelecionado.onclick = null; 
        botaoSelecionado.disabled = true;   
        
        // crio o objeto com as inforções se acertou e o id da questão
        var add_banco = {id:`${id_questao}`,check:'acertou'};
    }
    else {

        botaoSelecionado.classList.add("incorrect");
        check.classList.add('errou');

        // Desativa o clique das outras respostas
        botaoSelecionado.onclick = null; 
        botaoSelecionado.disabled = true; 

        // Se for errado cria uma div nova indicando a resposta correta 
        const correta = document.createElement('div');
        correta.textContent = `⚠️ A resposta correta é: ${botaoSelecionado.id})`;
        correta.classList.add('is-correct');
        quiz.appendChild(correta);

        // crio o objeto com as inforções se errou e o id da questão
        var add_banco = {id:`${id_questao}`,check:'errou'};
    }

    // usar try-catch é uma boa prática para manter o código funcionando corretamente
    try {
        // transformei meu objeto em string para converter em array no php
        var add_banco_str = JSON.stringify(add_banco);

    } catch (error) {
        console.error('Erro ao converter ou ao enviar JSON: ',error)
    }

    // defino o objeto que me permiter enviar dados ao servidor (php nesse caso)
    var objectRequest = new XMLHttpRequest();

    // configuro a solicitação que desejo fazer: nesse caso enviar dados usando o metótodo POST do Http e indico "true" para dizer que é assíncrono (sem precisar recarregar a página)
    objectRequest.open("POST","../../actions/questoes/acertouQuestao.php", true)

    // toda solicitação Http tem o body e o header, no body passo o método, no header configurações específicas
    // meu header: passei o tipo de dado que será enviado
    objectRequest.setRequestHeader("Content-Type", "aplication/json")

    // o servidor enviar respostas de como está o andamento da solicitação através do status (200 significa que o servidor recebeu a solicitação)
    objectRequest.onreadystatechange = function() {
        if (objectRequest.readyState === 4 && objectRequest.status === 200) {
            console.log('Status of request: ',objectRequest.responseText); // resposta do servidor se houver
        }
    }

    // enviei a solicitação para o servidor(arquivo: ../../actions/questoes/acertouQuestao.php)
    objectRequest.send(add_banco_str);
}

// converto o array php para  json
<?php 
if (isset($questoesCheck)) {
    $questoesCheckJson = json_encode($questoesCheck);
}
?>

// função que pega as informações da tabela acertou_questao no banco de dados e verifica os resultados das questãos que já foram respondidas por cada usuário 
function showQuestaoCheck(){

    // pego todas as questões do html
    const questoes = document.querySelectorAll('.questoes');

    // crio um bloco php que só existirá se ouver questões respondidas
    <?php if (isset($questoesCheckJson)): ?>

    // finalmente converto o json para array em JavaScripct
    var listCheckQuestao = <?php echo $questoesCheckJson; ?>;

    // passo por todas as questões do html
    questoes.forEach(questao => {
        listCheckQuestao.forEach(checkQuestao => {

            // ferifica se a questão já foi respondida antes
            if (`${checkQuestao['id_questao']}_questao`==questao.id) {

                const check = questao.children[0].children[1];

                // removo as classes antes para evitar erros
                check.classList.remove('acertou');
                check.classList.remove('errou');

                // se foi respondida, verifica se acertou e adicona a classe acertou
                if (checkQuestao['acertou']==='acertou') {
                    check.classList.add('acertou');
                }
                // se foi respondida, verifica se errou e adicona a classe errou
                if (checkQuestao['acertou']==='errou') {
                    check.classList.add('errou');
                }
            }
        })
    });
    <?php endif; ?>
}

showQuestaoCheck();

</script>

</main>

<?php
require_once("../base/footer.php");
?>