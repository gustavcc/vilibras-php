<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login-admin'])) {
    header("Location: ../../pages/admin/loginAdmin.php?");
    exit();
}
?>

<?php
require_once("../base/popups/popup.php");
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../../public/css/faq.css">
<link rel="stylesheet" href="../../../public/css/base.css">

<style>

.return {
            font-size: 20pt;
            color: #00b7ff;
            position: fixed;
            cursor: pointer;
            top: 40px;
            left: 30px;
        }

main{
    margin:  0 10px 0 25px;
}

</style>

<body>

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
          <div class="vw-plugin-top-wrapper"></div>
        </div>
        </div>

            <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
      <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
      </script>



<main>

<div class="return">
            <a href="../admin/dashboardAdmin.php"><i class="fa-solid fa-rotate-left"></i></a>
        </div>

<!-- Botão que abre o pop-up -->
<button class="btn">
    
    
    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
    width="40pt" height="40pt" viewBox=" 0 0 512 505"
    preserveAspectRatio="xMidYMid meet">
   
   <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
   fill="rgb(0, 0, 255)" stroke="none">
   <path d="M2330 5110 c-494 -48 -950 -230 -1350 -538 -195 -150 -448 -432 -594
   -662 -63 -99 -186 -351 -230 -471 -49 -134 -102 -340 -128 -499 -31 -195 -31
   -565 0 -760 45 -276 116 -498 237 -745 132 -269 269 -460 489 -681 221 -220
   412 -357 681 -489 247 -121 469 -192 745 -237 195 -31 565 -31 760 0 276 45
   498 116 745 237 269 132 460 269 681 489 220 221 357 412 489 681 121 247 194
   477 234 739 27 172 37 388 22 444 -37 134 -210 196 -324 116 -73 -51 -88 -93
   -98 -262 -13 -241 -42 -394 -110 -595 -159 -470 -484 -874 -919 -1142 -522
   -322 -1191 -395 -1783 -194 -470 159 -874 484 -1142 919 -322 522 -395 1191
   -194 1783 235 695 839 1240 1549 1397 212 47 496 63 705 40 465 -52 895 -254
   1242 -582 77 -73 138 -102 203 -96 113 11 195 101 195 213 -1 77 -15 103 -112
   197 -369 362 -859 600 -1403 683 -122 18 -467 27 -590 15z"/>
   <path d="M2513 3621 c-51 -13 -96 -44 -128 -90 l-30 -43 -5 -356 -5 -357 -357
   -5 -356 -5 -44 -30 c-123 -87 -123 -263 0 -350 l44 -30 356 -5 357 -5 5 -357
   5 -356 30 -44 c87 -123 263 -123 350 0 l30 44 5 356 5 357 357 5 356 5 44 30
   c123 87 123 263 0 350 l-44 30 -356 5 -357 5 -5 357 -5 356 -30 44 c-50 70
   -144 108 -222 89z"/>
   </g>
   </svg></button>

<!-- O pop-up -->

            <form action="../../actions/faqAdmin/addPerguntaAdmin.php" class="receivers" method = "get">

            <div class="fundo">

            <div class="confirm">

            <div>
                <div class="teste">
                    <h2 for="Title" class="inform">Titulo: </h2>
                    <span class="close">×</span>
                </div>
                
                <textarea type="text" name="Title"  class="textAreaEdit" placeholder="O que é o VILIBRAS?" rows="2" required></textarea>
            </div>
            
            <div> 
                <h2 for="Content-Question" class="inform">Descrição: </h2>     
                <textarea name="Content-Question" class="textAreaEdit" cols="20" rows="2" 
                placeholder="Qual é o foco principal?"
                required></textarea>
            </div>

            <div class = "organizer">

                <button type="reset">Limpar</button>

                <button type="submit">Enviar</button>

            </div>

            </div>

            </div>


            </div>

            </form>


</main>

</body>

<?php
require_once("../../actions/faqAdmin/modificationsAdmin.php");
?>

<script>
    function restoreScrollPosition() {
        let savedScrollPosition = localStorage.getItem('scrollPosition');
        if (savedScrollPosition !== null) {
            scrollPosition = parseInt(savedScrollPosition, 10);
            window.scrollTo(0, scrollPosition);
        }
        localStorage.removeItem('scrollPosition');
    }

    // Chama restoreScrollPosition quando a página é carregada
    document.addEventListener('DOMContentLoaded', restoreScrollPosition);
</script>

<script src="../../../public/js/faq.js"></script>