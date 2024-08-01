<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Responder Pergunda</title>

    <link rel="stylesheet" href="../../../public/css/respondeFaq.css">
    <link rel="stylesheet" href="../../../public/css/base.css">

</head>
<body>

<main>
    <div id="popup" class="popup">
    
        <form action="../../actions/faq/responder.php" class="receivers" method = "get">
    
            <fieldset>
    
            <h2>Insira uma resposta</h2><br><br>
    
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            ?>
    
            <input type="hidden" name="id_pergunta" value="<?=$id?>">
    
            <div id = "divTextarea"> 
                <label for="Resposta" id = "Label-Question">Resposta: </label>     
                <textarea name="Resposta" id="Content-Question" cols="40" rows="20" 
                placeholder="..." 
                required></textarea>
            </div>
    
            <div id = "div-buttons">
    
                <button type="reset" id = "button-reset">Limpar</button>
    
                <button type="submit" id = "button-submit">Enviar</button>
    
            </div>
    
            </div>
    
    
        </fieldset>
    
    </form>
    
    </div>
</main>

</body>
</html>