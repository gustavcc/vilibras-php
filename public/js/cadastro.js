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
});