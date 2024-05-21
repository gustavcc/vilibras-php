// Questões
const  questoes = document.querySelectorAll(".questoes"); //elemento das respostas (div com os botões)

questoes.forEach(questao => {
    // var currentQuestion = questao;
    const respostas = questao.querySelectorAll(".btn");
    respostas.forEach(resposta  => {
        if(resposta.id == resposta.value){
            resposta.id = 'correct';
        }
        resposta.addEventListener('click', selecionaResposta_Correta);
    });
});

function selecionaResposta_Correta(e){ 
    const botaoSelecionado = e.target; 
    let isCorrect = false;
    if (botaoSelecionado.id == 'correct'){
        isCorrect = true;
    }
    if(isCorrect){ 
        botaoSelecionado.classList.add("correct");
        const answer = this.parentElement;
        answer.parentElement.id = 'acertou';
    }
    else{
        botaoSelecionado.classList.add("incorrect");
    }
}