<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>VILIBRAS</title>

    <link rel="icon" href="../../../public/images/Logo.png">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../../../public/css/base.css">
    <link rel="stylesheet" href="../../../public/css/addContentForm.css">
    
</head>
<body>
    
<main>

<div class="principal">

<form action="../../actions/dicionario/addContent.php" method="get">

<fieldset>
    <legend> Adicionar Vídeo</legend>

    <div class="categorias">
        <p>Selecione a categoria que será alterada:</p>

        <div class="radios">

            <label for="">Hardware</label>
            <input type="radio" name = "Categoria" value="hardware">

            <br>

            <label for="">Software</label>
            <input type="radio" name = "Categoria" value="software">

            <br>

            <label for="">Conectividades</label>
            <input type="radio" name = "Categoria" value="conectividades">

            <br>

            <label for="">Amazenamento de dados</label>
            <input type="radio" name = "Categoria" value="armazenamento_dados">

        </div>

    </div>

    <div class = "campos">

    <p>Dados a serem enviados:</p>

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