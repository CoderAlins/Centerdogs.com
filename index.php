<?php
	include($_SERVER['DOCUMENT_ROOT'].'/includes/_header.php');
?>

<header class="header" >
	<div class="header-inner">
		<div class="container">
			<div class="inner">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-12">
						<div class="logo">
							<a href="index.php"><img src="assets/img/logo.png" alt="#"></a>
						</div>
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-7 col-md-9 col-12">
						<div class="main-menu">
							<nav class="navigation">
								<ul class="nav menu">
									<li class="active"><a href="#"><b>Главная</b></a></li>
									<li><a href="pets.php"><b>Питомцы</b></a></li>
									<li><a href="appointments.php"><b>Приемы</b></a></li>
									<li><a href="contacts.php"><b>Контакты</b></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<section class="slider">
	<div class="single-slider" style="background-image:url('assets/img/slider2.jpg'); ">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="text">
						<h1>Мы рады приветствовать <span>Вас</span> на нашем сайте!</h1>
						<p class="under-text">Общественное объединение "Клуб собаководства"</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="why-choose section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<img src="assets/img/section-img.png" alt="#">
						<p class="under-text" style="margin-top: 20px !important; font-size: 16px;">Клуб собаководства проводит занятие по дрессировке всех пород собак. Занятие проходят на дрессировочных площадках круглогодично.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="choose-left">
					<h3>О нас:</h3>
					<p>&emsp;Клуб собаководства, как организация, ставит перед собой задачу по пропагандированию породного поголовья, а также усовершенствование различных пород собак в нашем городе, что требует грамотного разведения, т.е. селекции. </p>
					<p style="margin-bottom: 5px; font-weight: bold; font-size: 16px;">Основными задачами Клуба являются:</p>
					<div class="row">
						<div class="col-lg-12">
							<ul class="list">
								<li><i class="fa fa-caret-right"></i>Объединение собаководов-любителей. </li>
								<li><i class="fa fa-caret-right"></i>Дрессировка, помощь в правильном содержании и воспитании питомцев.</li>
							</ul>
						</div>
						<div class="col-lg-12">
							<ul class="list">
								<li><i class="fa fa-caret-right"></i>Подготовка собак к выставкам по экстерьеру. </li>
								<li><i class="fa fa-caret-right"></i>Разведение (подбор пар, выдача родословных, клеймение и осмотр щенков).</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="choose-right">
					<div class="video-image">
						<div class="promo-video">
							<div class="waves-block">
								<div class="waves wave-1"></div>
								<div class="waves wave-2"></div>
								<div class="waves wave-3"></div>
							</div>
						</div>
						<a href="https://www.youtube.com/watch?v=nLlLMXqKD3g&ab_channel=8KCINEMA" target="_blank" class="video mfp-iframe"><i class="fa fa-play"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="blog section" id="blog">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<img src="assets/img/section-img.png" alt="#">
				</div> 
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-news">
					<div class="news-head">
						<img src="assets/img/blog1.jpg" alt="#">
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-news">
					<div class="news-head">
						<img src="assets/img/blog2.jpg" alt="#">
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-news">
					<div class="news-head">
						<img src="assets/img/blog3.jpg" alt="#">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/includes/_scripts.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/_footer.php');
?>