// Dark mode
const html = document.querySelector('html');
const checkbox = document.getElementById('checkbox');

checkbox.addEventListener('change', function () {
  html.classList.toggle('dark-mode')
})

// Menu
const close = document.getElementById('closeMenu');
openMenu.addEventListener('click', () => {
  close.style.display = 'flex',
  menu.style.left = '0'
})

closeMenu.addEventListener('click', () => {
  menu.removeAttribute('style'),
  close.removeAttribute('style')
})

// Scroll
var lastScrollTop = 0;
const header = document.getElementsByTagName('header')[0];

window.addEventListener('scroll', function (e) {
  
    // mesma posição
    if (e.scrollY === lastScrollTop) return;

    this.scrollY < lastScrollTop ? header.style.top = '-1px' : header.style.top = '-120px';

    lastScrollTop = this.scrollY;

  }, true)

// Search Position
const searchBox = document.getElementById('search-box');
const menuTop = document.getElementById('menu-top');
const menuBottom = document.getElementById('menu-bottom');

window.addEventListener('load', ()=>{
  if (window.innerWidth <= 950) {
    menuBottom.appendChild(searchBox);
  }
  else {
    // menuTop.appendChild(searchBox);
    menuBottom.removeChild(searchBox)
    menuTop.insertBefore(searchBox, menuTop.firstChild);
  }
})

window.addEventListener('resize', ()=>{
  if (window.innerWidth <= 950) {
    menuBottom.appendChild(searchBox);
  }
  else {
    // menuTop.appendChild(searchBox);
    menuBottom.removeChild(searchBox)
    menuTop.insertBefore(searchBox, menuTop.firstChild);
  }
})