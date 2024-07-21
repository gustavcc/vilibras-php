document.addEventListener('mousedown', handleMouseDown);
document.addEventListener('touchstart', handleTouchStart);

let popup = document.getElementById('popup');
let closePopup = document.getElementById('close-popup');
let isPopupVisible = false;

function handleMouseDown(event) {
    if (!isPopupVisible) {
        setTimeout(() => {
            if (event.buttons === 1) {
                vibrateDevice();
                showPopup(event.clientX, event.clientY);
            }
        }, 500); // 500ms hold
    }
}

function handleTouchStart(event) {
    if (!isPopupVisible) {
        setTimeout(() => {
            vibrateDevice();
            let touch = event.touches[0];
            showPopup(touch.clientX, touch.clientY);
        }, 500); // 500ms hold
    }
}

function vibrateDevice() {
    if (navigator.vibrate) {
        navigator.vibrate(100); // Vibrate for 100ms
    }
}

function showPopup(x, y) {
    popup.style.left = `${x}px`;
    popup.style.top = `${y}px`;
    popup.style.display = 'block';
    isPopupVisible = true;

    dragElement(popup);
}

closePopup.addEventListener('click', () => {
    popup.style.display = 'none';
    isPopupVisible = false;
});

function dragElement(el) {
    let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    const header = document.getElementById("popup-header");

    header.onmousedown = dragMouseDown;
    header.ontouchstart = dragMouseDown;

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        if (e.type === 'touchstart') {
            pos3 = e.touches[0].clientX;
            pos4 = e.touches[0].clientY;
            document.ontouchend = closeDragElement;
            document.ontouchmove = elementDrag;
        } else {
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            document.onmousemove = elementDrag;
        }
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        if (e.type === 'touchmove') {
            pos1 = pos3 - e.touches[0].clientX;
            pos2 = pos4 - e.touches[0].clientY;
            pos3 = e.touches[0].clientX;
            pos4 = e.touches[0].clientY;
        } else {
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
        }
        el.style.top = (el.offsetTop - pos2) + "px";
        el.style.left = (el.offsetLeft - pos1) + "px";
    }

    function closeDragElement() {
        document.onmouseup = null;
        document.onmousemove = null;
        document.ontouchend = null;
        document.ontouchmove = null;
    }
}
