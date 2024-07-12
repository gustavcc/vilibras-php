<?php 
require_once("../../actions/questoes/mostrarQuestoes.php");
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

        td, th {
            width: 50px;
        }

        table, th, td {
            border: 1px solid #000;
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
    </style>
</head>
<body>

    <main>
        <?php
        if (isset($_GET['msg'])){
            $msg=$_GET['msg'];
            echo "<div class='msg'>". $msg ."</div>";
        }?>

            <!-- <table>
                <tr>
                    <th>ID</th>
                    <th>Enunciado</th>
                    <th>Ano</th>
                    <th>Teste</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                    <th>Inserir</th>
                </tr>
            </table> -->
    
        <?php if(isset($questoes)) { foreach($questoes as $questao): ?>
            
            <table>
                <tr>
                    <th>ID</th>
                    <th>Enunciado</th>
                    <th>Ano</th>
                    <th>Teste</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
                <tr>
                    <td><?=$questao['id_questao']?></td>
                    <td><?=$questao['title']?></td>
                    <td><?=$questao['year']?></td>
                    <td><?=$questao['test']?></td>
                    <td><a href='../../pages/questoes/editarQuestaoForm.php?id=<?=$questao['id_questao']?>' id='edit'> <i class='fa-solid fa-pen-to-square'></i> </a></td>
                    <td><a href='../../actions/questoes/excluirQuestao.php?id=<?=$questao['id_questao']?>' id='del'> <i class='fa-solid fa-trash'></i> </a></td>
                </tr>
            </table>
    
        <?php endforeach;}?>
    </main>
</body>
</html>