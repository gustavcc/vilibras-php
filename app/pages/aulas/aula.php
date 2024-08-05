<?php
require_once("../base/popups/popup.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../public/images/Logo.png">
    <title>VILIBRAS</title>
    <link rel="stylesheet" href="../../../public/css/aula-style.css">
</head>
<body>

<header>
    <div class="menu-icon fa-solid fa-bars-staggered" id="menu-toggle"></div>
    <div class="logo"><img src="../../../public/images/logo.png" alt="Logo"><p><a href="">VILIBRAS</a></p></div>
    <div class="search-bar">
        <input type="text" id="search-input" placeholder="Pesquisar">
        <button class="fa-solid fa-magnifying-glass"></button>
        <div id="search-results" class="search-results"></div>
    </div>
    <div class="user-options">
        <button id="theme-toggle">🌙</button>
        <button id="user-button"><i class="fas fa-user user-icon"></i></button>
    </div>
</header>

<div class="container">
    <aside id="sidebar">
        <button id="close-sidebar" class="close-sidebar-button">&#10005;</button>
        <nav>
            <ul>
                <?php
                require_once("../../config/conecta.php");
                conecta();
                global $mysqli;

                $sql = "SELECT id, titulo, descricao, iframe FROM aulas";
                $result = $mysqli->query($sql);
                $aulas = [];
                while ($row = $result->fetch_assoc()) {
                    $aulas[] = $row;
                }
                desconecta();
                ?>

                <?php if (!empty($aulas)): ?>
                    <?php foreach ($aulas as $index => $aula): ?>
                        <li data-content="content<?php echo $index + 1; ?>">📼 <?php echo htmlspecialchars($aula['titulo']); ?></li>
                        <?php if (($index + 1) % 4 === 0): ?>
                            <hr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Nenhuma aula encontrada.</li>
                <?php endif; ?>
                <hr>
                <button class="sign-in-button"><img src="sign-in-icon.png" alt="entrar">teste</button>
                <hr>
                <li><strong>Ajuda</strong></li>
                <div class="help-options">
                    <button><i class="fas fa-cog config-icon"></i></button>
                    <button><i class="fa-solid fa-info"></i></button>
                </div>
            </ul>
        </nav>
    </aside>
    <main>
        <div class="hero">
            <div class="main-intro">
                <div class="logomain">
                    <img src="../../../public/images/Logo.png" alt="">
                </div>

                <p id="text-intro">Seja bem vindo a sessão de vídeos da plataforma <strong>VILIBRAS<strong></p>
                <img class="blocks-img" src="../../../public/images/cubos-3d-abstratos.png" alt="">
            </div>
            <p>Selecione uma aula para assistir!</p>
            <div class="wrapper">
                <div class="box a">
                    <div class="skeleton-box"></div>
                </div>
                <div class="box b">
                    <div class="skeleton-box"></div>
                </div>
                <div class="box c">
                    <div class="skeleton-box"></div>
                </div>
                <div class="box d">
                    <div class="skeleton-box"></div>
                </div>
                <div class="box e">
                    <div class="skeleton-box"></div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
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

    document.querySelectorAll('#sidebar nav ul li').forEach(li => {
        li.addEventListener('click', function () {
            const contentKey = this.getAttribute('data-content');
            if (contentMap[contentKey]) {
                document.querySelector('main').innerHTML = contentMap[contentKey];
                document.getElementById('sidebar').classList.add('hidden');
            }
        });
    });

    document.getElementById('theme-toggle').addEventListener('click', function () {
        document.body.classList.toggle('light-theme');
        if (document.body.classList.contains('light-theme')) {
            this.textContent = '🌞';
        } else {
            this.textContent = '🌙';
        }
    });

    document.getElementById('menu-toggle').addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden');
        document.body.classList.toggle('aside-hidden', sidebar.classList.contains('hidden'));
    });

    document.getElementById('close-sidebar').addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.remove('hidden');
        document.body.classList.remove('aside-hidden');
    });

    document.querySelectorAll('.help-options button').forEach(button => {
        button.addEventListener('click', function () {
        });
    });

    document.querySelector('.sign-in-button').addEventListener('click', function () {
    });
});
</script>
<script src="https://kit.fontawesome.com/2bb7425346.js" crossorigin="anonymous"></script>
</body>
</html>
