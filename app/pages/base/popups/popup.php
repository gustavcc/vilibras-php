<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Popups</title>
    <link rel="stylesheet" href="../../../../public/css/style-popup.css">
</head>
<body>
    <div class="container">
        <div class="basic-blocks">
            <div class="block-item" id="block-zoom">
                <span class="icon">🔍</span>
                <div class="block-content">
                    <span class="block-title">Zoom</span>
                    <span class="block-description">Aumente ou diminua o zoom da página.</span>
                </div>
                <div class="popup" id="zoom-options">
                    <div class="popup-item" data-zoom="25">
                        <span class="icon">25%</span>
                        <span class="text">Zoom 25%</span>
                    </div>
                    <div class="popup-item" data-zoom="50">
                        <span class="icon">50%</span>
                        <span class="text">Zoom 50%</span>
                    </div>
                    <div class="popup-item" data-zoom="75">
                        <span class="icon">75%</span>
                        <span class="text">Zoom 75%</span>
                    </div>
                </div>
            </div>
            <div class="block-item" id="block-font-size">
                <span class="icon">Aa</span>
                <div class="block-content">
                    <span class="block-title">Tamanho da fonte</span>
                    <span class="block-description">Aumente ou diminua o tamanho da fonte.</span>
                </div>
                <div class="popup" id="font-size-options">
                    <div class="popup-item" data-font-size="12">
                        <span class="icon">12px</span>
                        <span class="text">Tamanho da fonte 12px</span>
                    </div>
                    <div class="popup-item" data-font-size="14">
                        <span class="icon">14px</span>
                        <span class="text">Tamanho da fonte 14px</span>
                    </div>
                    <div class="popup-item" data-font-size="16">
                        <span class="icon">16px</span>
                        <span class="text">Tamanho da fonte 16px</span>
                    </div>
                </div>
            </div>
            <div class="block-item" id="block-font-family">
                <span class="icon">🅰️</span>
                <div class="block-content">
                    <span class="block-title">Fonte</span>
                    <span class="block-description">Escolha uma fonte para o texto.</span>
                </div>
                <div class="popup" id="font-family-options">
                    <div class="popup-item" data-font-family="Arial">
                        <span class="text">Arial</span>
                    </div>
                    <div class="popup-item" data-font-family="Times New Roman">
                        <span class="text">Times New Roman</span>
                    </div>
                    <div class="popup-item" data-font-family="Courier New">
                        <span class="text">Courier New</span>
                    </div>
                </div>
            </div>
            <div class="block-item" id="block-text-color">
                <span class="icon">🎨</span>
                <div class="block-content">
                    <span class="block-title">Cor do texto</span>
                    <span class="block-description">Escolha uma cor para o texto.</span>
                </div>
                <div class="popup" id="text-color-options">
                    <div class="popup-item" data-text-color="#000000">
                        <span class="icon" style="color: #000000;">●</span>
                        <span class="text">Preto</span>
                    </div>
                    <div class="popup-item" data-text-color="#FF0000">
                        <span class="icon" style="color: #FF0000;">●</span>
                        <span class="text">Vermelho</span>
                    </div>
                    <div class="popup-item" data-text-color="#0000FF">
                        <span class="icon" style="color: #0000FF;">●</span>
                        <span class="text">Azul</span>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="nav">
                    <span class="icon">📄</span>
                    <span class="icon">📄</span>
                    <span class="icon">📄</span>
                </div>
                <div class="footer">
                    <h2>VIILIBRAS |</h2>
                    <img src="../../../../public/images/Logo.png" alt="">
                </div>
            </div>
        </div>
        <button class="close-btn">Fechar</button>
    </div>

    <script src="../../../../public/js/script-popup.js"></script>
</body>
</html>
