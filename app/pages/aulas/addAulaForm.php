<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aula</title>
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
        <form action="../../actions/aulas/addAulas.php" method="get">
            <fieldset>
                <div class="return">
                    <a href="../admin/dashboardAdmin.php"><i class="fa-solid fa-rotate-left"></i></a>
                </div>
                <legend>Adicionar Aula</legend>
                <div class="campos">
                    <p>Dados a serem enviados:</p>
                    <div class="secundaria">
                        <label for="Id-Aula">Id:</label>
                        <input type="text" name="Id-Aula" id="Id-Aula" required>
                        <br>
                    </div>
                    <div class="secundaria">
                        <label for="Titulo">Título: </label>
                        <input type="text" name="Titulo" id="Titulo" required><br>
                    </div>
                    <div class="secundaria">
                        <label for="Descricao">Descrição:</label>
                        <input type="text" name="Descricao" id="Descricao" required>
                        <br>
                    </div>
                    <div class="secundaria">
                        <label for="Resumo">Resumo:</label>
                        <input type="text" name="Resumo" id="Resumo" required>
                        <br>
                    </div>
                    <div class="secundaria">
                        <label for="Iframe">Iframe:</label>
                        <input type="text" name="Iframe" id="Iframe" required>
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
