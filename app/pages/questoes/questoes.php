<?php
require_once("../base/cabecalho.php");
?>

<link rel="stylesheet" href="../../../public/css/questoes.css">
<script src="../../../public/js/questoes.js" type="text/javascript" defer></script>

<main>
    <div class="questoes">
        <div class="text-question">
            <div class="informations">
                <p>Q.1</p>
                <p>-</p>
                <p>ENEM</p>
                <p>aaaaaaaaaa</p>
            </div>
        </div>
        <div class="quiz">
            <p class="enunciado" id="pergunta">Pergunta da questão</p>
            <div class="answers" id="buttons-resposta">
                <button class="btn">Resposta 1</button>
                <button class="btn">Resposta 2</button>
                <button class="btn">Resposta 3</button>
                <button class="btn">Resposta 4</button>
            </div>
            <button id="next-btn">Próximo</button>
        </div>
    </div>
    
    <div class="questoes">
        <div class="text-question">
            <div class="informations">
                <p class="indexQuestao">Q.{{question.id}}</p>
                <p>-</p>
                <p class="prova">{{question.test}}</p>
                <p>-</p>
                <p class="conteudo">{{question.content}}</p>
                <p>-</p>
                <p class="ano">{{question.year}}</p>
            </div>
        </div>
        <div class="quiz">
            <p class="enunciado" id="pergunta">{{question.title}}</p>
            <div id="errou" class="answers">

                <p class="acertou">Você acertou!</p>

                <div class="answer">
                    <p>A)</p>
                    <button id="{{question.correct}}" value="A" class="btn">{{question.answer_a}}</button>
                </div>
                <div class="answer">
                    <p>B)</p>
                    <button id="{{question.correct}}" value="B" class="btn">{{question.answer_b}}</button>
                </div>
                <div class="answer">
                    <p>C)</p>
                    <button id="{{question.correct}}" value="C" class="btn">{{question.answer_c}}</button>
                </div>
                <div class="answer">
                    <p>D)</p>
                    <button id="{{question.correct}}" value="D" class="btn">{{question.answer_d}}</button>
                </div>
                <div class="answer">
                    <p>E)</p>
                    <button id="{{question.correct}}" value="E" class="btn">{{question.answer_e}}</button>
                </div>
            </div>
        </div>
    </div>
    {% endfor %}

</main>

<?php
require_once("../base/footer.php");
?>