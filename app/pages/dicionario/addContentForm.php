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

    <div class="categorias">
        <p>Categoria que será alterada:</p>

        <label for="">Hardware</label>
        <input type="radio" name = "Categoria" value="hardware">

        <label for="">Software</label>
        <input type="radio" name = "Categoria" value="software">

        <label for="">Conectividades</label>
        <input type="radio" name = "Categoria" value="conectividades">

        <label for="">Amazenamento de dados</label>
        <input type="radio" name = "Categoria" value="armazenamento_dados">

    </div>

    <div class = "campos">

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

    <br>

    <div class="secundaria">
        <label for="iframe">Iframe</label>
        <br>
            <label for="src" id = "srcLabel">Src:</label>
            <input type="text" name="Src" id = "srcInput" required>
        <br>
    </div>

    </div>

    <button type="submit">Enviar</button>


</fieldset>


</form>


</div>
</main>

</body>
</html>