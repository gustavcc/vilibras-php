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