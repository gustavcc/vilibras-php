const html = document.querySelector('html');
const checkbox = document.getElementById('checkbox');

checkbox.addEventListener('change', function () {
    html.classList.toggle('dark-mode')
})

const close = document.getElementById('closeMenu');
openMenu.addEventListener('click', () => {
    close.style.display = 'flex',
    menu.style.left = '0'
})

closeMenu.addEventListener('click', () => {
    menu.removeAttribute('style'),
    close.removeAttribute('style')
})