<?php 
require_once("../../config/conecta.php");

conecta();

$query = "SELECT id, titulo, descricao, resumo, iframe FROM aulas";
$result = $mysqli->query($query);

$aulas = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $aulas[] = $row;
    }
}

desconecta();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aulas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            width: 100%;
            height: auto;
            font-family: Arial, sans-serif;
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
            padding: 20px;
        }

        td {
            min-height: 30px;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .return {
            font-size: 20pt;
            color: #00b7ff;
            position: fixed;
            cursor: pointer;
            top: 20px;
            left: 20px;
        }
        #edit {
            cursor: pointer;
            color: #00883b;
        }
        #del {
            cursor: pointer;
            color: #fc6060;
        }
        #add {
            cursor: pointer;
            color: #00b7ff;
        }

        .msg {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <main>
        <?php
        if (isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo "<div class='msg'>" . htmlspecialchars($msg) . "</div>";
        }
        ?>

        <div class="return">
            <a href="../admin/dashboardAdmin.php"><i class="fa-solid fa-rotate-left"></i></a>
        </div>

        <h2>Lista de Aulas: </h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Resumo</th>
                <th>Iframe</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>

            <?php if(!empty($aulas)) { foreach($aulas as $aula): ?>
            <tr>
                <td><?= htmlspecialchars($aula['id']) ?></td>
                <td><?= htmlspecialchars($aula['titulo']) ?></td>
                <td><?= htmlspecialchars($aula['descricao']) ?></td>
                <td><?= htmlspecialchars($aula['resumo']) ?></td>
                <td><?= htmlspecialchars($aula['iframe']) ?></td>
                <td><a href='../../pages/aulas/editarAulaForm.php?id=<?= htmlspecialchars($aula['id']) ?>' id='edit'> <i class='fa-solid fa-pen-to-square'></i> </a></td>
                <td><a href='../../actions/aulas/excluirAula.php?id=<?= htmlspecialchars($aula['id']) ?>' id='del'> <i class='fa-solid fa-trash'></i> </a></td>
            </tr>    
            <?php endforeach; } else { ?>
            <tr>
                <td colspan="7">Nenhuma aula encontrada.</td>
            </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>