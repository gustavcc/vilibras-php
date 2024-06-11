<?php
require_once("../base/cabecalho.php");
require_once("../../actions/questoes/mostrarQuestoes.php");
?>

<link rel="stylesheet" href="../../../public/css/questoes.css">
<script src="../../../public/js/questoes.js" type="text/javascript" defer></script>

<main>
    <?php

    // if (isset($_GET['msg'])){
    //     $msg=$_GET['msg'];
    //     echo "<div class='msg'>". $msg ."</div>";
    // }

    if (isset($questoes)) {
        foreach($questoes as $questao) {
            $id = $questao['id_questao'];
            $title = $questao['title'];
            $test = $questao['test'];
            $content = $questao['content'];
            $year = $questao['year'];
            $correct = $questao['correct'];
            $answer_A = $questao['answer_A'];
            $answer_B = $questao['answer_B'];
            $answer_C = $questao['answer_C'];
            $answer_D = $questao['answer_D'];
            $answer_E = $questao['answer_E'];
            
            echo "<div class='questoes'>";
            echo "   <div class='text-question'>";
            echo "        <div class='informations'>";
            echo "            <p class='indexQuestao'>Q.$id</p>";
            echo '            <p>-</p>';
            echo "            <p class='prova'>$test</p>";
            echo '            <p>-</p>';
            echo "            <p class='conteudo'>$content</p>";
            echo '            <p>-</p>';
            echo "            <p class='ano'>$year</p>";
            echo "        </div>";
            echo "    </div>";
            echo '    <div class="quiz">';
            echo "        <p class='enunciado' id='pergunta'>$title</p>";
            echo "        <div id='errou' class='answers'>";

            echo '            <div class="answer">';
            echo '                <p>A)</p>';
            echo "                <button id='$correct' value='A' class='btn'>$answer_A</button>";
            echo "            </div>";
            echo '            <div class="answer">';
            echo '                <p>B)</p>';
            echo "                <button id='$correct' value='B' class='btn'>$answer_B</button>";
            echo "            </div>";
            echo '            <div class="answer">';
            echo '                <p>C)</p>';
            echo "                <button id='$correct' value='C' class='btn'>$answer_C</button>";
            echo "            </div>";
            echo '            <div class="answer">';
            echo '                <p>D)</p>';
            echo "                <button id='$correct' value='D' class='btn'>$answer_D</button>";
            echo "            </div>";
            echo '            <div class="answer">';
            echo '                <p>E)</p>';
            echo "                <button id='$correct' value='E' class='btn'>$answer_E</button>";
            echo "            </div>";
            echo "        </div>";
            echo "    </div>";
            echo "<div class='options'>";
            echo "      <a href='../../actions/questoes/editarQuestaoForm.php?id={$id}' id='edit'> <i class='fa-solid fa-pen-to-square'></i> </a>";
            echo "      <a href='../../actions/questoes/excluirQuestao.php?id={$id}' id='del'> <i class='fa-solid fa-trash'></i> </a>";
            echo "</div>";
            echo '</div>';
        }
    }
    ?>

</main>

<?php
require_once("../base/footer.php");
?>