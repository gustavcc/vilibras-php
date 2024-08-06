<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../../public/images/Logo.png" type="image/x-icon">

  <title>VILIBRAS</title>
  <script src="https://kit.fontawesome.com/2bb7425346.js" crossorigin="anonymous"></script>
  <style>
    :root {
      --dark-900: #03000a;
      --dark-500: #101012;
      --dark-100: #202020;
      --light-900: #ffffff;
      --light-500: #f0f0f0;
      --light-100: #dcdcdc;
    }

    body {
      background-color: var(--dark-900);
      color: white;
      font-family: sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }

    body.light {
      background-color: var(--light-500);
      color: black;
    }

    .container {
      background-color: var(--dark-500);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .container.light {
      background-color: var(--light-900);
    }

    .form-group {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .emoji {
      font-size: 24px;
      margin-right: 10px;
    }

    label {
      margin-right: 10px;
    }

    input[type="email"] {
      padding: 10px;
      border: 1px solid var(--dark-100);
      border-radius: 5px;
      width: 100%;
      font-size: 16px;
      background-color: var(--dark-100);
      color: white;
    }

    input[type="email"].light {
      border: 1px solid var(--light-100);
      background-color: var(--light-100);
      color: black;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }

    header {
      position: absolute;
      top: 0;
      width: 97vw;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      background-color: var(--dark-500);
    }

    header.light {
      background-color: var(--light-500);
      border-bottom: 1px solid lightgray;
    }

    .header-links{
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .header-links a {
      color: white;
      text-decoration: none;
      margin: 0 10px;
    }

    .header-links a.light {
      color: black;
    }

    .theme-toggle {
      cursor: pointer;
      font-size: 24px;
    }

    .theme-toggle.light {
      color: black;
    }

    .header-vilibras {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .header-vilibras h2 {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-weight: 400;
    }

    .header-vilibras img {
      width: 50px;
    }

    .status-message {
      margin-top: 20px;
      padding: 10px;
      border-radius: 5px;
    }

    .status-message.success {
      background-color: #4caf50b0;
      color: white;
      opacity: 0.5;
      border-radius: 0;
    }

    .status-message.error {
      background-color: #f44336;
      color: white;
      opacity: 0.5;
      border-radius: 0;
    }
  </style>
</head>
<body>
  <header>
    <div class="header-links">
      <a href="../usuario/login.php" id="login-link">🚪Login</a>
      <a href="../usuario/cadastro.php" id="signup-link">🆔Cadastro</a>
    </div>
    <div class="header-vilibras">
      <img src="../../../public/images/Logo.png" alt="LOGO">
      <h2>VILIBRAS</h2>
    </div>
    <i class="fas fa-moon theme-toggle" id="theme-toggle"></i>
  </header>
  <div class="container" id="container">
    <h2>Redefinição de Senha</h2>
    <form action="../../actions/senha/recuperarSenha.php" method="POST">
      <div class="form-group">
        <span class="emoji">📧</span>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" placeholder="Digite o seu melhor email" required>
      </div>
      <button type="submit">Enviar</button>
    </form>
    <div id="status-message" class="status-message" style="display: none;"></div>
  </div>

  <script>
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;
    const container = document.getElementById('container');
    const emailInput = document.getElementById('email');
    const header = document.querySelector('header');
    const links = document.querySelectorAll('.header-links a');
    const statusMessage = document.getElementById('status-message');

    themeToggle.addEventListener('click', () => {
      body.classList.toggle('light');
      container.classList.toggle('light');
      emailInput.classList.toggle('light');
      header.classList.toggle('light');
      themeToggle.classList.toggle('light');
      links.forEach(link => link.classList.toggle('light'));
      themeToggle.classList.contains('light')
        ? themeToggle.classList.replace('fa-moon', 'fa-sun')
        : themeToggle.classList.replace('fa-sun', 'fa-moon');
    });

    // Função para obter parâmetros da URL
    function getQueryParams() {
      const params = {};
      const queryString = window.location.search.slice(1);
      const queries = queryString.split("&");
      queries.forEach(query => {
        const [key, value] = query.split("=");
        params[key] = decodeURIComponent(value);
      });
      return params;
    }

    // Exibir mensagem de status
    const params = getQueryParams();
    if (params.status && params.message) {
      statusMessage.style.display = 'block';
      statusMessage.textContent = params.message;
      if (params.status === 'success') {
        statusMessage.classList.add('success');
      } else if (params.status === 'error') {
        statusMessage.classList.add('error');
      }
    }
  </script>
</body>
</html>
