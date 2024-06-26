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
    <link rel="stylesheet" href="../../../public/css/functionsContentForm.css">
    
</head>
<body>
    
<main>

<div class="principal">

<form action="../../actions/dicionario/editContent.php" method="get">

<fieldset>
    <legend> Editar Vídeo</legend>

    <div class="categorias">
        <p>Selecione a categoria que será alterada:</p>

        <div class="radios">

            <label for="">Hardware</label>
            <input type="radio" name = "Categoria" value="hardware" required>

            <br>

            <label for="">Software</label>
            <input type="radio" name = "Categoria" value="software" required>

            <br> 

            <label for="">Conectividades</label>
            <input type="radio" name = "Categoria" value="conectividades" required>

            <br>

            <label for="">Amazenamento de dados</label>
            <input type="radio" name = "Categoria" value="armazenamento_dados" required>

        </div>

    </div>

    <div class = "campos">

    <p>Dados necessários para identificar o elemento que será modificado:</p>

    <div class="secundaria">
        <label for="Id-Video">Id:</label>
        <input type="text" name = "Id-Video" id = "Id-Video" required>
        <br>
    </div>
    <br>

    <p>Dados a serem modificados:</p>

    <div class="secundaria">
        <label for="NovoId">Novo Id:</label>
        <input type="text" name = "NovoId" id = "NovoId">
        <br>
    </div>

    <div class="secundaria">
        <label for="Title-Video">Novo titulo: </label>
        <input type="text" name = "Title-Video" id = "Title-Video"><br>
    </div>

    <div class="secundaria">
        <label for="Descricao">Nova descrição:</label>
        <input type="text" name="Descricao" id = "Descricao">
        <br>
    </div>

    <br>

    <div class="secundaria">
        <label for="iframe">Novo iframe</label>
        <br>
            <label for="src" id = "srcLabel">Src:</label>
            <input type="text" name="Src" id = "srcInput">
        <br>
    </div>

    </div>

    <button type="submit">Enviar</button>

    <p id = "obs" >Obs: O que não for modificar, deixe em branco.</p>


</fieldset>

</form>


</div>
</main>

</body>
</html>