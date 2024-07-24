// save dark mode in database
const html = document.querySelector('html');
const checkbox = document.getElementById('checkbox');

window.addEventListener('load', ()=>{

    // Verifico se o item do navegar está salvo como habilitado, se sim, adiciona o dark-mode e atribue true ao checkbox (para mostrar o sol no icon)
    if (localStorage.getItem('dark-mode') === 'anabled') {
        html.classList.add('dark-mode');
        checkbox.checked = true;
    }

    checkbox.addEventListener('click', function () {
        
        checkbox.checked ? html.classList.add('dark-mode') : html.classList.remove('dark-mode');
        
        // Quando o dark-mode está ativado, atribui habilitado ao item do navegador, que fica armazenado internamente nele
        if (html.classList.contains('dark-mode')) {
            localStorage.setItem('dark-mode', 'anabled')
        } else {
            localStorage.removeItem('dark-mode')
        }
    })
})