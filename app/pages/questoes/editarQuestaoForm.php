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

    $questao = findQuestao($_GET['id']);
    
    $id = $_GET['id'];
    $test = $questao['test'];
    $content = $questao['content'];
    $year = $questao['year'];

    
    ?>

    <form action="../../actions/questoes/editarQuestao.php" method="POST">
        <div class="label">
            <label for="">Title: </label> <input value="<?=htmlspecialchars($questao['title'])?>" name="title" id=""></input>
        </div>
        <fieldset>
            <div class="label">
                <input type="hidden" value="<?=htmlspecialchars($id)?>" name="id" id="">
            </div>
            <div class="label">
                <label for="">Answer A: </label> <input value="<?=htmlspecialchars($questao['answer_A'])?>" name="answer_A" id=""></input>
            </div>
            <div class="label">
                <label for="">Answer B: </label> <input value="<?=htmlspecialchars($questao['answer_B'])?>" name="answer_B" id=""></input>
            </div>
            <div class="label">
                <label for="">Answer C: </label> <input value="<?=htmlspecialchars($questao['answer_C'])?>" name="answer_C" id=""></input>
            </div>
            <div class="label">
                <label for="">Answer D: </label> <input value="<?=htmlspecialchars($questao['answer_D'])?>" name="answer_D" id=""></input>
            </div>
            <div class="label">
                <label for="">Answer E: </label> <input value="<?=htmlspecialchars($questao['answer_E'])?>" name="answer_E" id=""></input>
            </div>
        </fieldset>

        <fieldset>
        <div class="radio">
                <label for="">Select the answer correct:</label>
                <input name="correct" value="<?=htmlspecialchars($questao['correct'])?>" type="text">
            </div>
        </fieldset>
        <div class="label">
            <label for="">Test: </label> <input value="<?=htmlspecialchars($test)?>" name="test" type="text">
        </div>
        
        <div class="label">
            <label for="">Content: </label> <input value="<?=htmlspecialchars($content)?>" name="content" type="text">
        </div>
        
        <div class="label">
            <label for="">Year: </label> <input value="<?=htmlspecialchars($year)?>" name="year" type="number">
        </div>
        
        <input type="submit" value="Editar">
    </form>
</main>