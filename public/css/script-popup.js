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