<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/cadastro-basic.css">
    <link rel="stylesheet" href="../../../public/css/cadastro-portrait.css" media="screen and (orientation: portrait)">
    <link rel="stylesheet" href="../../../public/css/cadastro-landscape.css" media="screen and (orientation: landscape)">
    <title>Document</title>
</head>
<body>
    <div class="site-content">
        <video autoplay muted loop id="heroVideo">
            <source src="../../../public/images/COSTA RICA IN 4K 60fps HDR (ULTRA HD).mp4" type="video/mp4">
        </video>
    </div>

    <div class="container">
        <div class="nav">
            <div class="logo">
                <a href="#">vilibras</a>
                <img id="logo-vilibras" src="../../../public/images/Logo.png" alt="" srcset="">
            </div>
            <div class="links">
                <img src="../../../public/images/enter_1828395.png" alt="Ícone de Pixel perfect">
                <a id="login-a" href="login.php"></a>
            </div>
        </div>

        <div class="hero-copy">
            <h1>vilibras</h1>
            <p>cadastro</p>

            <div class="forms">
                <form method="POST" action="../../actions/usuario/cadastroUsuario.php">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome"  placeholder="Nome:" required tabindex="1">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email"  required tabindex="2">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha"  required tabindex="3">
                    <button type="submit" tabindex="4">Cadastrar</button>
                </form>
            </div>
        </div>

        <div class="footer">
            <div class="links">
                <a id="help-btn" href="#">
                    <img id="help-a" src="../../../public/images/help-web-button_18436.png" alt="">
                    <span id="help-text">Ajuda</span>
                </a>
                  
                <a id="vilibras-a-c" href="#">VILIBRAS</a>

            </div>
        </div>
    </div>
    <canvas id="draw"></canvas>

    <div id="popup" class="popup">
        <img id="assistent-img" src="../../../public/images/customer_6842168.png" alt="">
        Posso ajudar com alguma coisa?
        <button id="close-popup" class="close-popup">X</button>
    </div>

    <div id="menuPopup" class="popup">
        <img src="../../../public/images/customer_6842168.png" alt="">
        <ul>
            <li data-link="#"><a href="#">Item 1</a></li>
            <li data-link="#"><a href="#">Item 2</a></li>
            <li data-link="#"><a href="#">Item 3</a></li>
            <li data-link="#"><a href="#">Item 4</a></li>
        </ul>
    </div>

    <div id="sidebar" class="sidebar">
        <div class="sidebar-container">
            <button class="close-sidebar" onclick="toggleSidebar()">Fechar</button>
            <div id="sidebar-hero">
                <img id="assistent-bar-img" src="../../../public/images/customer_6842168.png" alt="">
                <h2>Você precisa de ajuda?</h2>
            </div>
            <div id="sidebar-info">
                <p id="text-sidebar">Utilize as teclas do teclado para te ajudar!</p>
                <p id="text-sidebar2">Utilize o <span>TAB ou SHIFT + TAB</span> para navegar no formulário.</p>
                <p id="text-sidebar-portrait">Toque e segure em qualquer canto da página para ativar o <span>menú flutuante !</span></p>
                <img id="keyboard-gif" src="../../../public/images/animated-keyboard.gif" alt="">
                <img id="screen-gif" src="../../../public/images/animate-screen-phone.gif" alt="">

            </div>
        </div>
    </div>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const body = document.body;

            if (sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                body.classList.remove('sidebar-visible');

            } else {
                sidebar.classList.add('show');
                body.classList.add('sidebar-visible');

            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const canvas = document.querySelector("canvas");
            const ctx = canvas.getContext("2d");

            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            ctx.fillStyle = "black";
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            ctx.lineJoin = "round";
            ctx.lineCap = "round";
            ctx.lineWidth = 200;

            ctx.globalCompositeOperation = "destination-out";

            let isDrawing = false;
            let lastX = 0;
            let lastY = 0;

            function draw(e) {
                if (!isDrawing) return;
                ctx.beginPath();
                ctx.moveTo(lastX, lastY);
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
                [lastX, lastY] = [e.offsetX, e.offsetY];
            }

            canvas.addEventListener("mousedown", (e) => {
                isDrawing = true;
                [lastX, lastY] = [e.offsetX, e.offsetY];
            });

            canvas.addEventListener("mousemove", draw);
            canvas.addEventListener("mouseup", () => (isDrawing = false));
            canvas.addEventListener("mouseout", () => (isDrawing = false));

            const form = document.querySelector('.forms form');
            const heroVideo = document.getElementById('heroVideo');

            form.addEventListener('focusin', () => {
                heroVideo.classList.add('blur-background');
            });

            form.addEventListener('focusout', () => {
                heroVideo.classList.remove('blur-background');
            });

            function handleKeyPress(event) {
                const form = document.querySelector('.forms form');
                const fields = form.querySelectorAll('input, button');

                if (event.key === 'Tab') {
                    event.preventDefault(); 

                    const currentFieldIndex = Array.from(fields).findIndex(field => field === document.activeElement);

                    const nextField = fields[currentFieldIndex + (event.shiftKey ? -1 : 1)] || fields[event.shiftKey ? fields.length - 1 : 0];

                    nextField.focus();
                }
            }

            document.addEventListener('keydown', handleKeyPress);

            const popup = document.getElementById('popup');
            const helpLink = document.getElementById('help-a');
            const closePopupBtn = document.getElementById('close-popup');
            const sidebar = document.getElementById('sidebar');
            const container = document.querySelector('.container');
            const helpbtn = document.getElementById('help-btn');

            let timeout;
            let popupVisible = false;

            function showPopup() {
                const rect = helpLink.getBoundingClientRect();
                if (window.matchMedia("(orientation: portrait)").matches) {
                    popup.style.left = `50%`;
                    popup.style.top = `50%`;
                    popup.style.transform = `translate(-50%, -50%)`;
                } else {
                    popup.style.left = `${rect.right - 40}px`;
                    popup.style.top = `${rect.top - 120}px`;
                    popup.style.transform = `none`;
                }
                popup.style.display = 'block';
                popupVisible = true;
            }

            function hidePopup() {
                popup.style.display = 'none';
                popupVisible = false;
            }

            function resetTimer() {
                if (!popupVisible) {
                    clearTimeout(timeout);
                    timeout = setTimeout(showPopup, 50000);
                }
            }

            closePopupBtn.addEventListener('click', hidePopup);

            popup.addEventListener('click', toggleSidebar);
            helpbtn.addEventListener('click',toggleSidebar);

            document.onmousemove = resetTimer;
            document.onkeypress = resetTimer;

            timeout = setTimeout(showPopup, 50000);

            let timeoutPopup;
            let menuPopupVisible = false;

            function showMenuPopup() {
                menuPopup.style.display = 'block';
                menuPopupVisible = true;
            }

            function hideMenuPopup() {
                menuPopup.style.display = 'none';
                menuPopupVisible = false;
            }

            function resetMenuTimer() {
                clearTimeout(timeoutPopup);
                if (menuPopupVisible) return;
                timeoutPopup = setTimeout(showMenuPopup, 20000);
            }

            function activateButton(e) {
                if (e.type === "touchstart") {
                    resetMenuTimer();
                }
            }

            document.addEventListener("touchstart", activateButton);
            document.addEventListener("touchend", hideMenuPopup);
            let timeoutId;
    const menuPopup = document.getElementById('menuPopup');
    const items = menuPopup.querySelectorAll('li');
    let selectedItemIndex = -1;

    function showMobilePopup(event) {
        if (window.innerWidth <= 768) {
            menuPopup.style.display = 'block';
            menuPopup.style.top = `${event.touches ? event.touches[0].clientY : event.clientY}px`;
            menuPopup.style.left = `${event.touches ? event.touches[0].clientX : event.clientX}px`;

            if (navigator.vibrate) {
                navigator.vibrate(100);
            }
        }
    }

    function hideMobilePopup() {
        menuPopup.style.display = 'none';
        selectedItemIndex = -1;
        items.forEach(item => item.classList.remove('selected'));
    }

    // Função para selecionar item com base na posição do toque
    function selectItem(event) {
        const y = event.touches ? event.touches[0].clientY : event.clientY;
        items.forEach((item, index) => {
            const rect = item.getBoundingClientRect();
            if (y >= rect.top && y <= rect.bottom) {
                items.forEach(i => i.classList.remove('selected'));
                item.classList.add('selected');
                selectedItemIndex = index;
            }
        });
    }

    function openSelectedItem() {
        if (selectedItemIndex >= 0 && selectedItemIndex < items.length) {
            const link = items[selectedItemIndex].querySelector('a').href;
            window.location.href = link;
        }
    }

    document.addEventListener('touchstart', function(event) {
        timeoutId = setTimeout(() => showMobilePopup(event), 1000);
    });

    document.addEventListener('touchmove', function(event) {
        selectItem(event);
    });

    document.addEventListener('touchend', function(event) {
        clearTimeout(timeoutId);
        openSelectedItem();
    });

    document.addEventListener('mousedown', function(event) {
        if (window.innerWidth <= 768) { 
            timeoutId = setTimeout(() => showMobilePopup(event), 1000);
        }
    });

    document.addEventListener('mousemove', function(event) {
        if (window.innerWidth <= 768 && timeoutId) {
            selectItem(event);
        }
    });

    document.addEventListener('mouseup', function(event) {
        clearTimeout(timeoutId);
        openSelectedItem();
    });

    document.addEventListener('click', function(event) {
        if (!menuPopup.contains(event.target)) {
            hideMobilePopup();
        }
    });
        });
        
    </script>
</body>
</html>
