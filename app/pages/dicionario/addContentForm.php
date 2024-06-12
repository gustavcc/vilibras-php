<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/addContentForm.css">
</head>
<body>
    
<main>

<div class="principal">

<form action="../../actions/dicionario/addContent.php" method="get">

<fieldset>
    <legend> Adicionar Vídeo</legend>

    <div class="secundaria">
        <label for="Id-Video">Id:</label>
        <input type="text" name = "Id-Video" id = "Id-Video" required>
        <br>
    </div>

    <div class="secundaria">
        <label for="Title-Video">Titulo: </label>
        <input type="text" name = "Title-Video" id = "Title-Video" required><br>
    </div>

    <div class="secundaria">
        <label for="Descricao">Descrição:</label>
        <input type="text" name="Descricao" id = "Descricao" required>
        <br>
    </div>

    <div class="secundaria">
        <label for="iframe">Iframe:</label>
        <input type="text" name="Iframe" id = "Iframe" required>
        <br>
    </div>

    <button type="submit">Enviar</button>


</fieldset>


</form>


</div>
</main>

</body>
</html>