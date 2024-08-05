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

<div class="return">
    <a href="../admin/dashboardAdmin.php"><i class="fa-solid fa-rotate-left"></i></a>
</div>

<form action="../../actions/aulas/editarAulas.php" method="get">

<fieldset>
    <legend> Editar Aula</legend>

    <div class="campos">

    <p>Dados necessários para identificar o elemento que será modificado:</p>

    <div class="secundaria">
        <label for="Id-Aula">Id:</label>
        <input type="text" name="Id-Aula" id="Id-Aula" required>
        <br>
    </div>
    <br>

    <p>Dados a serem modificados:</p>

    <div class="secundaria">
        <label for="NovoId">Novo Id:</label>
        <input type="text" name="NovoId" id="NovoId">
        <br>
    </div>

    <div class="secundaria">
        <label for="Title-Aula">Novo título: </label>
        <input type="text" name="Title-Aula" id="Title-Aula"><br>
    </div>

    <div class="secundaria">
        <label for="Descricao">Nova descrição:</label>
        <input type="text" name="Descricao" id="Descricao">
        <br>
    </div>

    <br>

    <div class="secundaria">
        <label for="iframe">Novo iframe</label>
        <br>
            <label for="src" id="srcLabel">Src:</label>
            <input type="text" name="Src" id="srcInput">
        <br>
    </div>

    </div>

    <button type="submit">Enviar</button>

    <p id="obs">Obs: O que não for modificar, deixe em branco.</p>

</fieldset>

</form>

</div>
</main>

</body>
</html>
