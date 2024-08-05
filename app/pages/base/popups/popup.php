<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style-popup.css">

    <style>
        /* styles.css */


.containerPopup {
    position: fixed !important;
    top: 100px;
    display: inline-block;
    font-family: Arial, sans-serif !important;
    z-index: 10000 !important;
    background: transparent;
    color: black !important;

}

.basic-blocks {
    display: flex;
    flex-direction: column;
    padding: 10px;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

.block-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 5px;
    transition: background 0.3s;
    cursor: pointer;
    position: relative;
}

.block-item::after{
    content: '';
    width: 5px;
    height: 30px;
    position: absolute;
    right: 100%;
    display: inline-flex;
    background-color: grey;
}

.block-item:hover {
    background: #f0f0f0;
}

.popup-item:hover:after{
    content: '';
    width: 10px;
    height: 10px;
    position: absolute;
    display: inline-flex;
    right: 10%;
    background-color: lightgrey;
    border-radius: 50%;
}

.block-item .icon {
    font-size: 24px;
    margin-right: 10px;
}

.block-content {
    display: flex;
    flex-direction: column;
}

.block-title {
    font-weight: bold;
    font-size: 16px;
}

.block-description {
    font-size: 12px;
    color: #666;
}

.popup {
    display: none;
    position: absolute !important;
    top: 100% !important;
    left: 0 !important; 
    padding: 10px;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    z-index: 1000;
    width: max-content;
    min-width: 150px;
}

.popup-item {
    display: flex;
    align-items: center;
    padding: 8px;
    border-radius: 5px;
    transition: background 0.3s;
}

.popup-item:hover {
    background: #f0f0f0;
}

.icon {
    font-size: 20px;
    margin-right: 10px;
}

#px40{
    font-size: 40px !important;
}

#px25{
    font-size: 25px !important;
}
#px50{
    font-size: 50px !important;
}



.text {
    font-size: 14px;
}

.block-item:hover .popup {
    display: block;
}

.footerPopup{
    display:flex;
    align-items: center;
    margin: 30px 0px 0px 0px;
}


.basic-blocks .boxPopup .footerPopup img{
    width: 20px;
    height: 20px;
}

.footer h2{
    font-weight: 300;
    color: gray;
    font-size: 15px;
    margin: 5px;
}

.basic-blocks .boxPopup{
    display: flex;
    width: auto;
    flex-wrap: nowrap;
    flex-direction: row !important;
    justify-content: center;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.close-btn:hover {
    background: #f0f0f0;
}

.containerPopup {
    position: absolute;
    display: none;
  }
  
.containerPopup.show {
    display: block;
  }

.containerPopup.hide {
    display: none;
}
    </style>
</head>
<body>
    <div class="containerPopup">
        <div class="basic-blocks">
            <div class="block-item" id="block-zoom">
                <span class="icon">🔍</span>
                <div class="block-content">
                    <span class="block-title">Zoom</span>
                    <span class="block-description">Aumente ou diminua o zoom da página.</span>
                </div>
                <div class="popup" id="zoom-options">
                    <div class="popup-item" data-zoom="100">
                        <span class="icon">100%</span>
                        <span class="text">Zoom 100%</span>
                    </div>
                    <div class="popup-item" data-zoom="125">
                        <span class="icon">125%</span>
                        <span class="text">Zoom 125%</span>
                    </div>
                    <div class="popup-item" data-zoom="150">
                        <span class="icon">150%</span>
                        <span class="text">Zoom 150%</span>
                    </div>
                    <div class="popup-item" data-zoom="175">
                        <span class="icon">175%</span>
                        <span class="text">Zoom 175%</span>
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
                    <div class="popup-item" data-font-size="25">
                        <span class="icon" id="px25">25px</span>
                        <span class="text">Tamanho da fonte 25px</span>
                    </div>
                    <div class="popup-item" data-font-size="40">
                        <span class="icon" id="px40">40px</span>
                        <span class="text">Tamanho da fonte 40px</span>
                    </div>
                    <div class="popup-item" data-font-size="50">
                        <span class="icon" id="px50">50px</span>
                        <span class="text">Tamanho da fonte 50px</span>
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
            <div class="boxPopup">
                <div class="footerPopup">
                    <h4>VILIBRAS |</h4>
                    <img src="../../../public/images/Logo.png" alt="">
                </div>
            </div>
        </div>
        <button class="close-btn">X</button>
    </div>

    <script>

document.addEventListener('DOMContentLoaded', function() {
    const zoomItems = document.querySelectorAll('#zoom-options .popup-item');
    const fontSizeItems = document.querySelectorAll('#font-size-options .popup-item');
    const fontFamilyItems = document.querySelectorAll('#block-font-family .popup-item');


    zoomItems.forEach(item => {
        item.addEventListener('click', function() {
            const zoomLevel = this.getAttribute('data-zoom');
            document.body.style.zoom = zoomLevel + '%';
        });
    });

    fontSizeItems.forEach(item => {
        item.addEventListener('click', function() {
            const fontSize = this.getAttribute('data-font-size') + 'px';
            document.querySelectorAll('p').forEach(p => {
                p.style.fontSize = fontSize;
            });
        });
    });

    fontFamilyItems.forEach(item => {
        item.addEventListener('click', function() {
            const fontFamily = this.getAttribute('data-font-family');
            document.querySelectorAll('p').forEach(p => {
                p.style.fontFamily = fontFamily;
            });
        });
    });
});

let timer = null;
let isHolding = false;
let clickX, clickY;

document.addEventListener('mousedown', function(event) {
  isHolding = true;
  clickX = event.clientX;
  clickY = event.clientY;
  timer = setTimeout(function() {
    if (isHolding) {
      const containerPopup = document.querySelector('.containerPopup');
      containerPopup.style.top = `${clickY}px`;
      containerPopup.style.left = `${clickX}px`;
      containerPopup.classList.add('show');
    }
  }, 500);
});

document.addEventListener('mouseup', function(event) {
  isHolding = false;
  clearTimeout(timer);
});

document.querySelector('.close-btn').addEventListener('click', function() {
  document.querySelector('.containerPopup').classList.remove('show');
});
    </script>
</body>
</html>
