let button = document.querySelector(".buttonConfirm");
let popup = document.querySelector(".receivers");
let buttonFechar = document.querySelector(".buttonCancel");
let body = document.querySelector('body');
const criarBottom = document.createElement('div');
let textAreaEdit = document.querySelectorAll(".textAreaEdit");

var scrollPosition = 0;

button.addEventListener('click', function () {
    scrollPosition = window.scrollY; // Salva a posição de rolagem atual
    localStorage.setItem('scrollPosition', scrollPosition); // Salva a posição de rolagem no localStorage
    document.body.style.top = `-${scrollPosition}px`; // Define a posição de rolagem no estilo top do body
    document.body.classList.add('no-scroll'); // Adiciona a classe para desativar a rolagem

    criarBottom.className = 'fundo';
    body.appendChild(criarBottom);

    popup.style.display = 'flex';
    button.style.display = 'none';
})

buttonFechar.addEventListener('click', function () {
    popup.style.display = 'none';
    button.style.display = 'block';
    
    textAreaEdit.forEach(function(textArea) {
        textArea.value = '';
    });

    body.removeChild(criarBottom);

    document.body.classList.remove('no-scroll'); // Remove a classe para reativar a rolagem
    window.scrollTo(0, scrollPosition); // Restaura a posição de rolagem
})

function saveScrollPosition() {
    // Salva a posição de rolagem ao clicar no botão Enviar
    localStorage.setItem('scrollPosition', scrollPosition);
}

function restoreScrollPosition() {
    // Restaura a posição de rolagem ao carregar a página
    let savedScrollPosition = localStorage.getItem('scrollPosition');
    if (savedScrollPosition !== null) {
        scrollPosition = parseInt(savedScrollPosition, 10);
        window.scrollTo(0, scrollPosition);
    }
    localStorage.removeItem('scrollPosition'); // Remove o item após restaurar
}

function autoResize(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
}