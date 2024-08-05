const contentMap = {
    content1: `
        <h2>Introdução</h2>
        <p>Bem-vindo à introdução da LIBRAS...</p>
    `,
    content2: `
        <h2>O que é a LIBRAS</h2>
        <p>A LIBRAS é a Língua Brasileira de Sinais...</p>
    `,
    content3: `
        <h2>Teste 1</h2>
        <p>Conteúdo do Teste 1...</p>
    `,
    content4: `
        <h2>Teste 2</h2>
        <p>Conteúdo do Teste 2...</p>
    `
    // Adicione mais conteúdos conforme necessário
};

document.querySelectorAll('#sidebar nav ul li').forEach(li => {
    li.addEventListener('click', function() {
        const contentKey = this.getAttribute('data-content');
        if (contentMap[contentKey]) {
            document.querySelector('main').innerHTML = contentMap[contentKey];
            document.getElementById('sidebar').classList.add('hidden');
        }
    });
});

document.getElementById('theme-toggle').addEventListener('click', function() {
    document.body.classList.toggle('light-theme');
    if (document.body.classList.contains('light-theme')) {
        this.textContent = '🌙';
    } else {
        this.textContent = '🌞';
    }

    if (document.body.style.backgroundColor === 'rgb(249, 249, 249)') {
        document.body.style.backgroundColor = '#03000a'; // Dark color
        document.body.style.color = '#FFFFFF';
        this.textContent = '🌙';
    } else {
        document.body.style.backgroundColor = '#f9f9f9'; // Light color
        document.body.style.color = '#000000';
        document.body.style.border = '1px solid lightgray';
        this.textContent = '🌞';
    }
});

document.getElementById('menu-toggle').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('hidden');
    document.body.classList.toggle('aside-hidden', sidebar.classList.contains('hidden'));
});

document.getElementById('close-sidebar').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.add('hidden');
    document.body.classList.add('aside-hidden');
});