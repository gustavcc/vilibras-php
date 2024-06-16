// const connection = require('../../db_conecta.js');
// import connection from '../../db_conecta.js';

function selectQuestoes(connection){
    connection.query('SELECT * FROM questoes', (err, results, fields) => {
        if (err) {
            console.error('Erro ao executar a consulta:', err.stack);
            return;
        }
        var resultsQuestoes = results;
        return resultsQuestoes
    });
}

// console.log(selectQuestoes(connection));

const questoes = document.querySelectorAll(".questoes"); 

questoes.forEach(questao => {
    const id_questao = questao.value;
    console.log(id_questao);
    
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
        const sla = answer.parentElement;
        const quiz = sla.parentElement;
        const questao = quiz.parentElement;
        const text_elem = questao.children[0]
        text_elem.classList.add('acertou');

        
    }
    else{
        botaoSelecionado.classList.add("incorrect");
    }
}