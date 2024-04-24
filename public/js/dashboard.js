const imagens = document.getElementById('imagens');
const img = document.querySelectorAll('#imagens img');
const next = document.getElementById('next-slide');
const back = document.getElementById('back-slide');
const radios = document.querySelectorAll('input[type="radio"]');
const r_1 = document.getElementById('r-1');
const r_2 = document.getElementById('r-2');
const r_3 = document.getElementById('r-3');
const r_4 = document.getElementById('r-4');

let id = 0;
let buttonClick = null;
function carrossel() {
    if (buttonClick === 'Next') {
        id++;
        buttonClick = null;
    }
    else if (buttonClick === 'Back') {
        if (id > 0) {
            id--;
            buttonClick = null;
        } else {
            buttonClick = null;
        }
    }
    else {
        id++;
    }

    if (id > img.length - 1) {
        id = 0
    }

    if (id === 0) {
        r_1.checked = true
    }
    if (id === 1) {
        r_2.checked = true
    }
    if (id === 2) {
        r_3.checked = true
    }
    if (id === 3) {
        r_4.checked = true
    }

    imagens.style.transform = `translateX(${-id * 100}%)`;
}
next.addEventListener('click', () => {
    buttonClick = 'Next';
    carrossel()
});

back.addEventListener('click', () => {
    buttonClick = 'Back';
    carrossel()
});

setInterval(carrossel, 10000);