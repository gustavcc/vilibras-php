    let select = document.querySelector('#search');
    let searchbtn = document.querySelector('.search-btn');

    searchbtn.addEventListener('click', () => {
        searchbtn.href = '#' + select.value;
        console.log(searchbtn.value)
    })
