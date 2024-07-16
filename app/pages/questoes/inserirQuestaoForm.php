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

    <div class="return">
        <a href="../admin/dashboardAdmin.php"><i class="fa-solid fa-rotate-left"></i></a>
    </div>

    <form action="../../actions/questoes/inserirQuestao.php" method="POST">
        <div class="label">
            <label for="">Title: </label> <textarea required name="title" id=""></textarea>
        </div>
        <fieldset>
            <div class="label">
                <label for="">Answer A: </label> <textarea required name="answer_A" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer B: </label> <textarea required name="answer_B" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer C: </label> <textarea required name="answer_C" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer D: </label> <textarea required name="answer_D" id=""></textarea>
            </div>
            <div class="label">
                <label for="">Answer E: </label> <textarea required name="answer_E" id=""></textarea>
            </div>
        </fieldset>

        <fieldset>
            <div class="radio">
                <label for="">Select the answer correct:</label>
                A)<input type="radio" name="correct" value="A">
                B)<input type="radio" name="correct" value="B">
                C)<input type="radio" name="correct" value="C">
                D)<input type="radio" name="correct" value="D">
                E)<input type="radio" name="correct" value="E">
            </div>
        </fieldset>
        <div class="label">
            <label for="">Test: </label> <input required name="test" type="text">
        </div>
        
        <div class="label">
            <label for="">Content: </label> <input required name="content" type="text">
        </div>
        
        <div class="label">
            <label for="">Year: </label> <input required name="year" type="number">
        </div>
        
        <input type="submit" value="Inserir">
    </form>
</main>