// script do slide
const imagens = document.getElementById('imagens');
const img = document.querySelectorAll('#imagens img');
const next = document.getElementById('next-slide');
const back = document.getElementById('back-slide');
const radios = document.querySelectorAll('input[type="radio"]');
const r_1 = document.getElementById('r-1');
const r_2 = document.getElementById('r-2');
const r_3 = document.getElementById('r-3');
const r_4 = document.getElementById('r-4');

var time = 0; 
var interval = 10;
let id = 0;
let buttonClick = null;

function carrossel() {

    time=time+1;

    if (buttonClick === 'Next') {
        id=id+1;
        buttonClick = null;
    }
    else if (buttonClick === 'Back') {
        if (id > 0) {
            id=id-1;
            buttonClick = null;
        } else {
            buttonClick = null;
        }
    }

    if (id > img.length - 1) {
        id = 0
    }

    if (id == 0) {
        r_1.checked = true
        if (time == interval){
            time = 0;
            id = 1;
        }
    }
    if (id == 1) {
        r_2.checked = true
        if (time == interval){
            time = 0;
            id = 2;
        }
    }
    if (id == 2) {
        r_3.checked = true
        if (time == interval){
            time = 0;
            id = 3;
        }
    }
    if (id == 3) {
        r_4.checked = true
        if (time == interval){
            time = 0;
            id = 0;
        }
    }

    imagens.style.transform = `translateX(${-id * 100}%)`;
}   
next.addEventListener('click', () => {
    buttonClick = 'Next';
    time = 0;
    carrossel();
});

back.addEventListener('click', () => {
    buttonClick = 'Back';
    time = 0;
    carrossel();
});

setInterval(carrossel, 1000);

// script do calendário
document.addEventListener('DOMContentLoaded', () => {
    const months = ['janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro'];
    const tableDays = document.getElementById('dias');

    function getDayCalendar(month,year) {

        document.getElementById('mes').innerHTML = months[month];
        document.getElementById('ano').innerHTML = year;

        let firstDayWeek = new Date(year,month,1).getDay()-1;
        let getLastDayMonth = new Date(year,month+1,0).getDate()
        
        for (var i = -firstDayWeek, index = 0; i < (42-firstDayWeek); i++, index++) {
            let dt = new Date(year, month, i);
            let dtNow = new Date()
            let dayTable = tableDays.getElementsByTagName('td')[index];
            dayTable.classList.remove('mes-anterior');
            dayTable.classList.remove('proximo-mes');
            dayTable.classList.remove('dia-atual');
            dayTable.innerHTML = dt.getDate();

            if (dt.getFullYear() == dtNow.getFullYear() && dt.getMonth() == dtNow.getMonth() && dt.getDate() == dtNow.getDate()) {
                dayTable.classList.add('dia-atual')
            }

            if (i < 1){
                dayTable.classList.add('mes-anterior')
            }
            if (i > getLastDayMonth){
                dayTable.classList.add('proximo-mes')
            }
        }
    }

    let month = new Date().getMonth();
    let year = new Date().getFullYear();
    getDayCalendar(month,year);

    const next = document.getElementById('next');
    const previous = document.getElementById('previous');

    next.addEventListener('click', ()=>{
        if (month >= 11){
            month = 0;
            year++;
        } else{
            month++;
        }
        getDayCalendar(month,year);
    })
    previous.addEventListener('click', ()=>{
        if (month <= 0){
            month = 11;
            year--;
        } else{
            month--;
        }
        getDayCalendar(month,year);
    })
    
    
})