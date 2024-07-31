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

        .return {
            font-size: 20pt;
            color: #00b7ff;
            position: fixed;
            cursor: pointer;
            top: 40px;
            left: 40px;
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

        .answer{
            color: #009dff;
            padding-top: 5px;
            font-weight: bold;
            text-indent: 9px;
        }

        .duvida-resposta {
            margin: 0.7% 4% 0.7% 3.2%;
            padding: 8px 8px 5px 8px;
            border-bottom: solid 1px #aaaaaa;
            border-radius: 15px;
            transition: 1s;
            padding: 5px;
            color: var(--text);
        }

        .duvida-resposta:hover {
            cursor: pointer;
        }

        .duvida-resposta h2, .answer, #Title-Question label, #divTextarea label, .receivers h2 {
            background-image: linear-gradient(to right bottom, var(--title-1), var(--title-2), var(--title-3));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .descricao {
            font-size: 18px;
            text-align: justify;
        }

        .data {
            text-align: end;
        }

        .answer-content {
            margin-top: 5px;
            text-indent: 30px;
        }

        /* Estilo para o botão */
        .btn {
            cursor: pointer;
            background-color: initial;
            border-radius: 100%;
            border: none;
        }

        .popup {
            display: none;
            position: fixed;
            right: 50px;
            bottom: 100px;
            background-color: #111111;
            padding-bottom: 20px;
            border-radius: 10px;
            z-index: 9999;
        }

        /* Estilo para o conteúdo do pop-up */
        .popup-content {
            font-size: 15px;
            font-weight: bold;
            border-radius: 10px;
            margin: 10px;
        }

        fieldset {
            border: solid var(--title-2) 2px;
        }

        .receivers {
            display: flex;
            height: 200px;
            flex-direction: column;
            align-items: center;
            background-color: var(--popup);
            padding: 20px 20px 220px 20px;
            border-radius: 10px;
        }

        .receivers input, .receivers textarea, .receivers button {
            border: solid 0.9px;
            border-radius: 6px;
            background-color: #efece9;
            height: 30px;
            font-size: 14px;
            padding: 3px;
            margin: 3px;
            outline: none;
        }

        #divTextarea {
            display: flex;
            margin-top: 10px;
        }

        #divTextarea label {
            align-items: center;
        }

        #div-buttons {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            margin-top: 10px;
        }

        /* Estilo para o botão de fechar */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .order {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            position: relative;
        }

        .order button {
            line-height: 0.4;
            background-color: transparent;
            border: none;
            align-self: self-start;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text);
        }

        .options {
            display: none;
            position: absolute;
            background-color: #111111;
            z-index: 9999;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            flex-direction: column;
            gap: 5px;
            top: 25px;
            right: 0;
            width: max-content;
            width: 100px;
            height: 60px;
            align-items: start;
            justify-content: center;
        }

        .options button {
            /* background-color: #444; */
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            width: 90px;
            height: 30px;
            gap: 10px;
        }

        .options button:hover {
            background-color: #666;
        }

        .fundo{
            position: fixed;
            right: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            background-color: rgba(34, 32, 32, 0.1);
            z-index: 999999;
            display: flex;
            justify-content: center;
            align-items: center; 
        }

        .organizer{
            align-self: end;
        }

        .organizer button{
            background-color: transparent;
            border: none;
            border-radius: 15px;
            margin-left: 13px;
            padding: 8px;
            color: #3ea6ff;
            font-weight: 700;
        }

        .organizer button:hover{
            background-color: var(--hv-organizer);
            transition: 0.3s;
        }

        .confirm{
            background-color: var(--main-bg);
            min-height: 180px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 3px 10px 0 10px;
            /* 200px */
        }

        #confirmEdit{
            min-height: 230px;
        }

        .lastInform{
            color: var(--lastInform);
            font-size: 14px;
            font-weight: 400;
        }

        .inform{
            font-size: 16px;
            font-weight: 400;
            color: var(--inform);
        }

        #textAreaTitulo{
            margin-top: 5px;
        }

        #textAreaDescricao{
            margin: 5px 0 17px;
        }

        #InformDescricao, #InformTitulo{
            margin-top: 10px;
        }

        .textAreaEdit{
            background-color: var(--main-bg);
            border: none;
            outline: 0;
            color: var(--inform);
            border-bottom: solid 1px #aaaaaa;
            width: 300px;
            resize: none;
            margin: 2px 0 5px 0;
        }

        @media screen and (max-width: 1300px) {
            .duvida-resposta {
                margin: 0.7% 5% 0.7% 5.2%;
            }
        }

        @media screen and (max-width: 1100px) {
            .duvida-resposta {
                margin: 0.7% 7% 0.7% 5.2%;
            }
        }

        @media screen and (max-width: 850px) {
            .duvida-resposta {
                margin: 0.7% 8.5% 0.7% 5.2%;
            }
        }

        @media screen and (max-width: 650px) {
            .duvida-resposta {
                margin: 0.7% 12% 0.7% 5.2%;
            }
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
                <th>Ação</th>
            </tr>

            <?php if(isset($elementos)) { foreach($elementos as $pergunta): ?>
            <tr>
                <td><?=$pergunta['id_feedback']?></td>
                <td><?=$pergunta['titulo']?></td>
                <td><?=$pergunta['descricao']?></td>
                <td><?=$pergunta['resposta']?></td>
                <td>
                    <a href='../../pages/faq/respondePergunta.php?id=<?=$pergunta['id_feedback']?>' id='resp'> 
                        <button class="btn">
                            
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                        width="40pt" height="40pt" viewBox=" 0 0 512 505"
                        preserveAspectRatio="xMidYMid meet">
                        
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                        fill="rgb(0, 0, 255)" stroke="none">
                        <path d="M2330 5110 c-494 -48 -950 -230 -1350 -538 -195 -150 -448 -432 -594
                        -662 -63 -99 -186 -351 -230 -471 -49 -134 -102 -340 -128 -499 -31 -195 -31
                        -565 0 -760 45 -276 116 -498 237 -745 132 -269 269 -460 489 -681 221 -220
                        412 -357 681 -489 247 -121 469 -192 745 -237 195 -31 565 -31 760 0 276 45
                        498 116 745 237 269 132 460 269 681 489 220 221 357 412 489 681 121 247 194
                        477 234 739 27 172 37 388 22 444 -37 134 -210 196 -324 116 -73 -51 -88 -93
                        -98 -262 -13 -241 -42 -394 -110 -595 -159 -470 -484 -874 -919 -1142 -522
                        -322 -1191 -395 -1783 -194 -470 159 -874 484 -1142 919 -322 522 -395 1191
                        -194 1783 235 695 839 1240 1549 1397 212 47 496 63 705 40 465 -52 895 -254
                        1242 -582 77 -73 138 -102 203 -96 113 11 195 101 195 213 -1 77 -15 103 -112
                        197 -369 362 -859 600 -1403 683 -122 18 -467 27 -590 15z"/>
                        <path d="M2513 3621 c-51 -13 -96 -44 -128 -90 l-30 -43 -5 -356 -5 -357 -357
                        -5 -356 -5 -44 -30 c-123 -87 -123 -263 0 -350 l44 -30 356 -5 357 -5 5 -357
                        5 -356 30 -44 c87 -123 263 -123 350 0 l30 44 5 356 5 357 357 5 356 5 44 30
                        c123 87 123 263 0 350 l-44 30 -356 5 -357 5 -5 357 -5 356 -30 44 c-50 70
                        -144 108 -222 89z"/>
                        </g>
                        </svg>
                    </button> 
                </a></td>
            </tr>    
            <?php endforeach;}?>

        </table>
</div>
    </main>
</body>
</html>