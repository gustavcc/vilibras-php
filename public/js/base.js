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

var lastScrollTop = 0;
const header = document.getElementsByTagName('header')[0];

window.addEventListener('scroll', function (e) {
  
    // mesma posição
    if (e.scrollY === lastScrollTop) return;

    this.scrollY < lastScrollTop ? header.style.top = '-1px' : header.style.top = '-120px';

    lastScrollTop = this.scrollY;

  }, true)