<?php 
require_once("../../actions/faq/visualizarPerguntas.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Questões</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <style>
        * {
            padding: 0;
            border: 0;
            box-sizing: border-box;
        }
        body {
            width: 100%;
            height: auto;
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
        }

        .return {
            font-size: 20pt;
            color: #00b7ff;
            position: fixed;
            cursor: pointer;
            top: 40px;
            left: 40px;
        }

        td {
            min-height: 30px;
            max-width: 300px;
        }

        table, th, td {
            border: 1px solid #000;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .msg {
            margin: 20px;
            padding: 10px;
            border-radius: 10px;
            background-color: #76c5f3;
        }

        svg {
            cursor: pointer;
            background-color: #fff;
        }
    </style>
</head>
<body>

    <main>
        <?php
        if (isset($_GET['msg'])){
            $msg=$_GET['msg'];
            echo "<div class='msg'>". $msg ."</div>";
        }?>

        <div class="return">
            <a href="../admin/dashboardAdmin.php"><i class="fa-solid fa-rotate-left"></i></a>
        </div>

        <h2>Lista de FAQ: </h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descrição</th>
                <th>Resposta</th>
            </tr>

            <?php if(isset($elementos)) { foreach($elementos as $pergunta): ?>
            <tr>
                <td><?=$pergunta['id_feedback']?></td>
                <td><?=$pergunta['titulo']?></td>
                <td><?=$pergunta['descricao']?></td>
                <td><?=$pergunta['resposta']?></td>
            </tr>    
            <?php endforeach;}?>

        </table>
</div>
    </main>
</body>
</html>