<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responder Pergunda</title>

    <style>
        * {
            padding: 0;
            border: 0;
            box-sizing: border-box;
        }
        body {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
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
            display: block;
            /* width: 200px;
            height: 200px; */
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

    <div id="popup" class="popup">

        <form action="../../actions/faq/responder.php" class="receivers" method = "get">

            <fieldset>


            <div class="popup-content">

            <span class="close" onclick="document.getElementById('popup').style.display='none'; document.querySelector('.btn').style.display = 'block';">×</span>

            <h2>Insira uma resposta</h2><br><br>

            <input type="text">
            <!--     
            <div id = "Title-Question" >
                <label for="Resposta">Resposta: </label>
                <input type="text" name="Resposta" placeholder="..." required>
            </div> -->

            <input type="hidden" name="id_pergunta">

            <div id = "divTextarea"> 
                <label for="Resposta" id = "Label-Question">Resposta: </label>     
                <textarea name="Resposta" id="Content-Question" cols="20" rows="2" 
                placeholder="..."
                required></textarea>
            </div>

            <div id = "div-buttons">

                <button type="reset" id = "button-reset">Limpar</button>

                <button type="submit" id = "button-submit">Enviar</button>

            </div>

            </div>


        </fieldset>

    </form>

</div>
</body>
</html>