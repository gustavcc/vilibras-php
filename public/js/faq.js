let button = document.querySelector(".btn");
let popup = document.querySelector(".receivers");
let buttonFechar = document.querySelector(".close");
let body = document.querySelector('body');
const criarBottom = document.createElement('div');

var scrollPosition = 0;

button.addEventListener('click', function () {

    scrollPosition = window.scrollY; // Salva a posição de rolagem atual
    document.body.style.top = `-${scrollPosition}px`; // Define a posição de rolagem no estilo top do body
    document.body.classList.add('no-scroll'); // Adiciona a classe para desativar a rolagem

    criarBottom.className = 'fundo';
    body.appendChild(criarBottom);

    popup.style.display = 'flex';
    this.style.display = 'none';
})

buttonFechar.addEventListener('click', function () {
    popup.style.display = 'none';
    button.style.display = 'block';

    body.removeChild(criarBottom);

    document.body.classList.remove('no-scroll'); // Remove a classe para reativar a rolagem
                window.scrollTo(0, scrollPosition); // Restaura a posição de rolagem
})

function autoResize(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
}