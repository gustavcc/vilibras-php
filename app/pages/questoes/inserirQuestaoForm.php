<?php
require_once("../base/cabecalho.php");
?>

<link rel="stylesheet" href="../../../public/css/forms.css">

<main>
    <h1>Inserir questão:</h1>

    <?php
    if (isset($_GET['msg'])){
        $msg=$_GET['msg'];
        echo "<div class='msg'>". $msg ."</div>";
    }
    ?>

    <form action="../../actions/questoes/inserirQuestao.php" method="POST">
        <div class="label">
            <label for="">Title: </label> <textarea name="title" id=""></textarea>
        </div>
        <fieldset>
            <div class="label">
                <label for="">Answer A: </label> <textarea name="answer_A" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer B: </label> <textarea name="answer_B" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer C: </label> <textarea name="answer_C" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer D: </label> <textarea name="answer_D" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer E: </label> <textarea name="answer_E" id=""></textarea>
            </div>
        </fieldset>

        <fieldset>
            <div class="radio">
                <label for="">Select the answer correct:</label>
                <input name="correct" placeholder="A/B/C/D/E" type="text">
            </div>
        </fieldset>
        <div class="label">
            <label for="">Test: </label> <input name="test" type="text">
        </div>
        
        <div class="label">
            <label for="">Content: </label> <input name="content" type="text">
        </div>
        
        <div class="label">
            <label for="">Year: </label> <input name="year" type="number">
        </div>
        
        <input type="submit" value="Inserir">
    </form>
</main>