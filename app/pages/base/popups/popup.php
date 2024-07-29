<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/style-popup.css">

    <style>
        /* styles.css */

.container {
    position: relative;
    display: inline-block;
    font-family: Arial, sans-serif !important;
    z-index: 10000 !important;
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
    position: absolute;
    top: 100%; /* Ajusta a posição para baixo do bloco */
    left: 0; /* Posiciona o popup diretamente abaixo do bloco */
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
#px60{
    font-size: 60px !important;
}



.text {
    font-size: 14px;
}

/* Mostrar o popup quando o bloco é hovered */
.block-item:hover .popup {
    display: block;
}

.footer{
    display:flex;
    align-items: center;
    margin: 30px 0px 0px 0px;
}


.basic-blocks .box .footer img{
    width: 20px;
    height: 20px;
}

.footer h2{
    font-weight: 300;
    color: gray;
    font-size: 15px;
    margin: 5px;
}

.basic-blocks .box{
    display: flex;
    width: auto;
    flex-wrap: nowrap;
    flex-direction: row !important;
}

.nav{
    flex: 5;
    margin: 30px 0px 0px 10px;
}

.nav::before{
    content: "Página anterior";
    display: inline-flex;
    color: black;
    position: absolute;
    top: 75%;
    font-size: 15px;
    font-weight: 400;
    font-family: system-ui;
    margin: 10px 0px 0px 0px;
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

.container {
    position: absolute;
    display: none;
  }
  
.container.show {
    display: block;
  }

.container.hide {
    display: none;
}

.nav-popup {
    position: absolute;
    background: #fff;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    resize: both;
    overflow: auto;
  }
  
  .popup-header {
    display: flex;
    justify-content: flex-end;
    cursor: move;
  }
  
  .close-popup {
    cursor: pointer;
    font-size: 24px;
  }
  
  .popup-content {
    margin-top: 10px;
    height: 90%;
    overflow: auto;
  }
  
  .popup-content iframe {
    width: 100%;
    height: 100%;
    border: none;
  }
    </style>
</head>
<body>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, atque provident? Recusandae ex possimus ullam doloremque temporibus fugit vel, cum animi deleniti, impedit nemo autem officia eveniet itaque non dicta quae veniam, debitis molestias quos ratione odio soluta labore rem. Iste aut incidunt deleniti enim natus non porro, neque alias nisi hic dolore voluptatem optio perferendis? Nam omnis deleniti aliquid facere optio ut ea velit quisquam obcaecati nulla id, quas corporis iste. Officiis, neque! Nemo quis recusandae, ab beatae adipisci eligendi ducimus repellendus molestias quae sequi ut nulla aliquid laborum quas ipsum nisi corrupti asperiores voluptatem. Libero facere laboriosam architecto dolore magnam accusamus ullam itaque in odio? Sit cum ab earum quos nemo praesentium, nisi voluptatem, vitae explicabo ad velit exercitationem eveniet! Cumque laborum doloribus quae, distinctio maiores voluptates laboriosam. In laudantium molestiae, et repudiandae nesciunt, maxime sit dolore voluptatum hic vero cum delectus commodi ipsam fugiat error atque ipsum optio aut? Ipsam, et esse atque neque corporis dignissimos, saepe repellendus itaque fuga, minus possimus. Quibusdam commodi quidem maiores porro distinctio quis consequuntur, dolorum voluptatum in nisi deserunt rem provident eos necessitatibus saepe? Fugit doloribus quas dolores, debitis eum exercitationem. Sequi quidem impedit accusamus assumenda odio possimus explicabo iste odit.</p>
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
                    <div class="popup-item" data-zoom="100">
                        <span class="icon">100%</span>
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
                    <div class="popup-item" data-font-size="25">
                        <span class="icon" id="px25">25px</span>
                        <span class="text">Tamanho da fonte 25px</span>
                    </div>
                    <div class="popup-item" data-font-size="40">
                        <span class="icon" id="px40">40px</span>
                        <span class="text">Tamanho da fonte 40px</span>
                    </div>
                    <div class="popup-item" data-font-size="60">
                        <span class="icon" id="px60">60px</span>
                        <span class="text">Tamanho da fonte 60px</span>
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
        <button class="close-btn">X</button>
    </div>

    <script src="../../../../public/js/script-popup.js"></script>
    <script>
        // script.js

document.addEventListener('DOMContentLoaded', function() {
    const zoomItems = document.querySelectorAll('#zoom-options .popup-item');
    const fontSizeItems = document.querySelectorAll('#font-size-options .popup-item');

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
      const container = document.querySelector('.container');
      container.style.top = `${clickY}px`;
      container.style.left = `${clickX}px`;
      container.classList.add('show');

      // Adiciona vibração
      navigator.vibrate([100, 30, 100, 30]); // Vibração de 100ms, pausa de 30ms, vibração de 100ms, pausa de 30ms
    }
  }, 500);
});

document.addEventListener('mouseup', function(event) {
  isHolding = false;
  clearTimeout(timer);
});

document.querySelector('.close-btn').addEventListener('click', function() {
  document.querySelector('.container').classList.remove('show');
});

const navItems = document.querySelectorAll('.nav span');

navItems.forEach(item => {
  item.addEventListener('click', function() {
    const popup = document.createElement('div');
    popup.className = 'nav-popup';
    popup.innerHTML = `
      <div class="popup-header">
        <span class="close-popup">&times;</span>
      </div>
      <div class="popup-content">
        <iframe src="${localStorage.getItem('previousPage')}" frameborder="0" width="300" height="200"></iframe>
      </div>
    `;
    document.body.appendChild(popup);
    popup.style.top = `${item.offsetTop + 20}px`;
    popup.style.left = `${item.offsetLeft + 20}px`;

    // Adiciona evento de fechamento
    popup.querySelector('.close-popup').addEventListener('click', () => {
      popup.remove();
    });

    // Adiciona evento de redimensionamento
    let resizing = false;
    popup.querySelector('.popup-content').addEventListener('mousedown', (e) => {
      resizing = true;
      const startX = e.clientX;
      const startY = e.clientY;
      const startWidth = popup.offsetWidth;
      const startHeight = popup.offsetHeight;

      document.addEventListener('mousemove', (e) => {
        if (resizing) {
          const width = startWidth + (e.clientX - startX);
          const height = startHeight + (e.clientY - startY);
          popup.style.width = `${width}px`;
          popup.style.height = `${height}px`;
        }
      });

      document.addEventListener('mouseup', () => {
        resizing = false;
      });
    });

    // Adiciona evento de movimento
    let moving = false;
    popup.querySelector('.popup-header').addEventListener('mousedown', (e) => {
      moving = true;
      const startX = e.clientX;
      const startY = e.clientY;
      const startLeft = popup.offsetLeft;
      const startTop = popup.offsetTop;

      document.addEventListener('mousemove', (e) => {
        if (moving) {
          const left = startLeft + (e.clientX - startX);
          const top = startTop + (e.clientY - startY);
          popup.style.left = `${left}px`;
          popup.style.top = `${top}px`;
        }
      });

      document.addEventListener('mouseup', () => {
        moving = false;
      });
    });
  });
});
    </script>
</body>
</html>
