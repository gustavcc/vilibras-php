<?php
require_once("../base/cabecalho.php");
?>

<link rel="stylesheet" href="../../../public/css/questoes.css">
<script src="../../../public/js/questoes.js" type="text/javascript" defer></script>

<main>
    
    <div class="questoes">
        <div class="text-question">
            <div class="informations">
                <p class="indexQuestao">Q.</p>
                <p>-</p>
                <p class="prova">test</p>
                <p>-</p>
                <p class="conteudo">mat</p>
                <p>-</p>
                <p class="ano">2024</p>
            </div>
        </div>
        <div class="quiz">
            <p class="enunciado" id="pergunta">{{question.title}}</p>
            <div id="errou" class="answers">

                <p class="true">Você acertou!</p>

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