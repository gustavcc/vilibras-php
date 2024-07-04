<?php
require_once("../../actions/usuario/identifyUsuarioLogado.php");

// se não tiver logado, vai para o login
if (!isset($_SESSION['login'])) {
    header("Location: ../usuario/login.php?");
    exit();
}?>

<?php
require_once("../base/cabecalho.php");
?>

<html lang="pt-br">
<link rel="stylesheet" href="../../../public/css/aulas-v2.css" />
<link rel="stylesheet" href="../../../public/css/aulas-portrait.css" media="screen and (orientation: portrait)">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
	<body>
		<div class="container">
			<h1 class="header"></h1>

			<div class="box">
				<div class="left-side">
				  <div id="clip-pth"></div>
				  <h1>VIDEO<br><div id="text-h1">AULAS</div></h1>
				  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt assumenda velit voluptates officiis soluta omnis distinctio repellat eveniet officia quod? Tempore ipsa nihil vel magni culpa atque eveniet veniam quisquam!</p>
				  <div class="buttons">
					<button class="btn-started">Conhecer a plataforma →</button>
					<button class="btn-generator">sla</button>
				  </div>
				</div>
				<div class="right-side">
					<div class="video-grid">
					  <div class="video-item video-border">
						<video autoplay muted loop>
						  <source src="../../../public/images/1118342_Macro_Pattern_1280x720.mp4" type="video/mp4">
						</video>
					  </div>
					  
					  <div class="video-item">
						<video autoplay muted loop>
						  <source src="../../../public/images/1118345_Macro_4k_1280x720.mp4" type="video/mp4">
						</video>
					  </div>
					  <div class="video-grid">
						<div class="video-item">
						  <video autoplay muted loop>
							<source src="../../../public/images/1118342_Macro_Pattern_1280x720.mp4" type="video/mp4">
						  </video>
						</div>
						<div class="video-item video-border">
						  <video autoplay muted loop>
							<source src="../../../public/images/1118345_Macro_4k_1280x720.mp4" type="video/mp4">
						  </video>
						</div>
						<div class="video-grid">
						  <div class="video-item video-border">
							<video autoplay muted loop>
							  <source src="../../../public/images/1118342_Macro_Pattern_1280x720.mp4" type="video/mp4">
							</video>
						  </div>
						  <div class="video-item">
							<video autoplay muted loop>
							  <source src="../../../public/images/1118345_Macro_4k_1280x720.mp4" type="video/mp4">
							</video>
						  </div>
						  <div class="video-grid">
							<div class="video-item">
							  <video autoplay muted loop>
								<source src="../../../public/images/1118342_Macro_Pattern_1280x720.mp4" type="video/mp4">
							  </video>
							</div>
							<div class="video-item video-border">
							  <video autoplay muted loop>
								<source src="../../../public/images/1118345_Macro_4k_1280x720.mp4" type="video/mp4">
							  </video>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				  <img id="logo" src="../../../public/images/Logo.png" alt="">
				  
				  
				  
			<div class="titles">
				<div class="title title-1"><h1> Conheça</h1></div>
				<div class="title title-2"><h1>as</h1></div>
				<div class="title title-3"><h1>videoaulas</h1></div>
			</div>
			<ul class="blocks">
				<li class="block-1 block"></li>
				<li class="block-2 block"></li>
				<li class="block-3 block"></li>
				<li class="block-4 block"></li>
				<li class="block-5 block"></li>
				<li class="block-6 block"></li>
				
			</ul>
		</div>

		<div class="wrapper">
			<div class="item item1"><video autoplay muted loop>
			  <source src="../../../public/images/1118345_Macro_4k_1280x720.mp4" type="video/mp4">
			</video></div>
			<div class="item item2">                  <video autoplay muted loop>
			  <source src="../../../public/images/1118342_Macro_Pattern_1280x720.mp4" type="video/mp4">
			</video></div>
			<div class="item item3"><video autoplay muted loop>
			  <source src="../../../public/images/1118345_Macro_4k_1280x720.mp4" type="video/mp4">
			</video></div>
			<div class="item item4">                  <video autoplay muted loop>
			  <source src="../../../public/images/1118342_Macro_Pattern_1280x720.mp4" type="video/mp4">
			</video></div>
			<div class="item item5"><video autoplay muted loop>
			  <source src="../../../public/images/1118345_Macro_4k_1280x720.mp4" type="video/mp4">
			</video></div>
			<div class="item item6">                  <video autoplay muted loop>
			  <source src="../../../public/images/1118342_Macro_Pattern_1280x720.mp4" type="video/mp4">
			</video></div>
			<div class="item item7"><video autoplay muted loop>
			  <source src="../../../public/images/1118345_Macro_4k_1280x720.mp4" type="video/mp4">
			</video></div>
			<div class="item item8">                  <video autoplay muted loop>
			  <source src="../../../public/images/1118342_Macro_Pattern_1280x720.mp4" type="video/mp4">
			</video></div>
		  </div>
		  <div id="right-bar"></div>
		  <div id="scr-btn"></div>
		</div>

		<section id="target-section">
			<h2>Conheça algumas das vídeo-aulas</h2>
			<button id="exit-btn">Fechar</button>
			<div class="search-bar"><input type="text" placeholder="Pesquisar video-aula"></input></div>
			<div id="videos">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			  <img src="../../../public/images/69603047_uyfydu4.jpg" alt="">
			</div>
		</section>
			<script>
			TweenMax.staggerFrom(
				".titles > div",
				0.8,
				{
					x: "-60",
					ease: Power3.easeInOut,
					opacity: "0",
				},
				2
			);

			TweenMax.staggerTo(
				".titles > div",
				0.8,
				{
					x: "60",
					ease: Power3.easeInOut,
					delay: 1.2,
					opacity: "0",
				},
				2
			);
			TweenMax.staggerFrom(
				"li",
				3,
				{
					x: "-1600",
					delay: 4.2,
					ease: Expo.easeInOut,
				},
				0.16
			);

			TweenMax.staggerTo(
				"li",
				2.6,
				{
					x: "1600",
					delay: 6.8,
					ease: Expo.easeInOut,
				},
				0.2
			);

			var textWrapper = document.querySelector(".header");
			textWrapper.innerHTML = textWrapper.textContent.replace(
				/\S/g,
				"<span class='letter'>$&</span>"
			);

			anime.timeline().add({
				targets: ".header .letter",
				opacity: [0, 1],
				translateY: [80, 0],
				translateZ: 0,
				easing: "easeOutExpo",
				duration: 5000,
				delay: (el, i) => 8400 + 40 * i,
			});

			
			anime.timeline().add({
				targets: ".box .left-side",
				opacity: [0, 1],
				translateY: [80, 0],
				translateZ: 0,
				easing: "easeOutExpo",
				duration: 8000,
				delay: (el, i) => 8400 + 40 * i,
			});

			anime.timeline().add({
				targets: ".box .right-side",
				opacity: [0, 1],
				translateY: [80, 0],
				translateZ: 0,
				easing: "easeOutExpo",
				duration: 8000,
				delay: (el, i) => 8400 + 40 * i,
			});
			anime.timeline().add({
				targets: ".box #logo",
				opacity: [0, 1],
				translateY: [80, 0],
				translateZ: 0,
				easing: "easeOutExpo",
				duration: 8000,
				delay: (el, i) => 8400 + 40 * i,
			});
			anime.timeline().add({
				targets: ".target-section",
				opacity: [0, 1],
				translateY: [80, 0],
				translateZ: 0,
				easing: "easeOutExpo",
				duration: 8000,
				delay: (el, i) => 9400 + 40 * i,
			});

			anime.timeline().add({
				targets: ".wrapper",
				opacity: [0, 1],
				translateY: [80, 0],
				translateZ: 0,
				easing: "easeOutExpo",
				duration: 8000,
				delay: (el, i) => 9400 + 40 * i,
			});

			setTimeout(() => {
            document.getElementById('target-section').style.display = 'block';
        }, 9000);

		document.addEventListener("DOMContentLoaded", function() {
  var scrBtn = document.getElementById("scr-btn");
  var exitBtn = document.getElementById("exit-btn");
  var targetSection = document.getElementById("target-section");

  scrBtn.addEventListener("click", function() {
    targetSection.classList.add("fullscreen");
    targetSection.classList.add("slide-in");
    targetSection.classList.remove("slide-out");
  });

  exitBtn.addEventListener("click", function() {
    targetSection.classList.add("slide-out");
    targetSection.classList.remove("slide-in");
    setTimeout(function() {
      targetSection.classList.remove("fullscreen");
    }, 500);
  });
});

		</script>
	</body>
<?php
require_once("../base/footer.php");
?>
