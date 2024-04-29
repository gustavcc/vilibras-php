window.addEventListener("load", function () {
    document.body.classList.add("blend-effect");
})

//* ----- Scroll animate -----

// seleciona as seções / class
const sections = document.querySelectorAll('.landing');
const return_top = document.querySelector('.return-top');

// objeto / função que observa os elementos do html
const myObserver = new IntersectionObserver((entries) => { 
    // função arrow / anonima
    // o console funciona quando o scroll está em cima da class
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('show');
            return_top.style.display = 'flex';
        } else{
            entry.target.classList.remove('show');
            return_top.style.display = 'none';
        }
    })
});

sections.forEach((element) => myObserver.observe(element));