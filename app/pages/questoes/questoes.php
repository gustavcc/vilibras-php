<?php
require_once("../base/cabecalho.php");
require_once("../../actions/questoes/mostrarQuestoes.php");
?>

<link rel="stylesheet" href="../../../public/css/questoes.css">

<main>
    <?php
    if (isset($_GET['msg'])){
        $msg=$_GET['msg'];
        echo "<div class='msg'>". $msg ."</div>";
    }?>

    <?php foreach($questoes as $questao): ?>
        
        <div id="<?=$questao['id_questao']?>" class='questoes'>
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
    
    <?php endforeach; ?>

<!-- Inicio do script JavaScript -->
<script>

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
    }

    var add_banco = [];

    if(isCorrect){ 
        botaoSelecionado.classList.add("correct");
        check.classList.add('acertou');

        // Desativa o clique das outras respostas
        botaoSelecionado.onclick = null; 
        botaoSelecionado.disabled = true; 
        
        add_banco.push([`${id_questao}`, 'acertou']);
    }
    else{
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

        add_banco.push([`${id_questao}`, 'errou']);
    }

    var array_banco_json = JSON.stringify(add_banco);

    console.log(array_banco_json);
}

</script>

</main>

<?php
require_once("../base/footer.php");
?>