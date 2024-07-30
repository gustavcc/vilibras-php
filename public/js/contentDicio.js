let select = document.querySelector('#search');
let searchbtn = document.querySelector('.search-btn');

searchbtn.addEventListener('click', () => {
    const element = document.querySelector(`#${select.value}`);
    const content = document.querySelectorAll('.Content');

    content.forEach(box => {
        box.classList.remove('select');
    });

    element.classList.add('select');

    searchbtn.href = `#${select.value}`;
});