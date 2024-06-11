<?php
require_once("../base/cabecalho.php");
require_once("../../actions/questoes/findQuestao.php");
?>

<link rel="stylesheet" href="../../../public/css/forms.css">

<main>
    <h1>Editar questão:</h1>

    <?php
    if (isset($_GET['msg'])){
        $msg=$_GET['msg'];
        echo "<div class='msg'>". $msg ."</div>";
    }

    $questao = findQuestao($_GET['id'])
    
    ?>

    <form action="../../actions/questoes/editarQuestao.php" method="POST">
        <div class="label">
            <label for="">Title: </label> <textarea name="title" id=""></textarea>
        </div>
        <fieldset>
            <div class="label">
                <label for="">Answer A: </label> <textarea value="" name="answer_A" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer B: </label> <textarea value="" name="answer_B" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer C: </label> <textarea value="" name="answer_C" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer D: </label> <textarea value="" name="answer_D" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer E: </label> <textarea value="" name="answer_E" id=""></textarea>
            </div>
        </fieldset>

        <fieldset>
        <div class="radio">
                <label for="">Select the answer correct:</label>
                <input name="correct" value="" type="text">
            </div>
        </fieldset>
        <div class="label">
            <label for="">Test: </label> <input value="" name="test" type="text">
        </div>
        
        <div class="label">
            <label for="">Content: </label> <input value="" name="content" type="text">
        </div>
        
        <div class="label">
            <label for="">Year: </label> <input value="" name="year" type="number">
        </div>
        
        <input type="submit" value="Inserir">
    </form>
</main>