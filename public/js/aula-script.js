document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('search-input').addEventListener('input', function () {
        const query = this.value;
        if (query.length > 2) {
            fetch(`search.php?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    const resultsContainer = document.getElementById('search-results');
                    resultsContainer.innerHTML = '';
                    data.forEach(aula => {
                        const resultItem = document.createElement('div');
                        resultItem.classList.add('result-item');
                        resultItem.innerHTML = `<strong>${aula.titulo}</strong><p>${aula.descricao}</p>`;
                        resultsContainer.appendChild(resultItem);
                    });
                });
        } else {
            document.getElementById('search-results').innerHTML = '';
        }
    });

    const contentMap = {
        <?php foreach ($aulas as $index => $aula): ?>
            content<?php echo $index + 1; ?>: `
                <h2><?php echo htmlspecialchars($aula['titulo']); ?></h2>
                <h3><?php echo htmlspecialchars($aula['descricao']); ?></h3>
                <iframe src="<?php echo htmlspecialchars($aula['iframe']); ?>" frameborder="0" allowfullscreen></iframe>
            `,
        <?php endforeach; ?>
    };

    document.querySelectorAll('#sidebarMenu nav ul li').forEach(li => {
        li.addEventListener('click', function () {
            const contentKey = this.getAttribute('data-content');
            if (contentMap[contentKey]) {
                document.querySelector('main').innerHTML = contentMap[contentKey];
                document.getElementById('sidebarMenu').classList.add('hidden');
            }
        });
    });

    document.getElementById('theme-toggle').addEventListener('click', function () {
        document.body.classList.toggle('light-theme');
        if (document.body.classList.contains('light-theme')) {
            this.textContent = '🌞';
            document.body.style.backgroundColor = '#f9f9f9'; // Mudar a cor do background para branco no tema claro
        } else {
            this.textContent = '🌙';
            document.body.style.backgroundColor = ''; // Resetar a cor do background no tema escuro
        }
    });

    document.getElementById('menu-toggle').addEventListener('click', function () {
        const sidebarMenu = document.getElementById('sidebarMenu');
        sidebarMenu.classList.toggle('hidden');
        document.body.classList.toggle('aside-hidden', sidebarMenu.classList.contains('hidden'));
    });

    document.getElementById('close-sidebar').addEventListener('click', function () {
        const sidebarMenu = document.getElementById('sidebarMenu');
        sidebarMenu.classList.remove('hidden');
        document.body.classList.remove('aside-hidden');
    });

    document.querySelectorAll('.help-options button').forEach(button => {
        button.addEventListener('click', function () {
        });
    });

    document.querySelector('.sign-in-button').addEventListener('click', function () {
    });
});