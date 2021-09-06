<?php
	include($_SERVER['DOCUMENT_ROOT'].'/includes/_header.php');
	define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', 'root');
    define('DATABASE', 'vet_db');
	$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	if (!$connect) {
    die('Error connect to database!');
	}
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
									<li><a href="index.php"><b>Главная</b></a></li>
									<li><a href="pets.php"><b>Питомцы</b></a></li>
									<li><a href="appointments.php"><b>Приемы</b></a></li>
									<li class="active"><a href="#"><b>Контакты</b></a></li>
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
	<div class="single-slider" style="background-image:url('assets/img/slider3.jpg'); ">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="text">
						<h1>Запись <span>Вашего</span> питомца на <span>прием к ветеренару!</span></h1>
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
					<ul class="fa-ul">
					    <p class="under-text" style="margin-top: 20px !important; font-size: 16px;">
						<li><i class="fa-li fa fa-map-marker"></i>Адрес: Кемерово, Пушкина, дом 29, строение 3</li>
						<li><i class="fa-li fa fa-phone"></i>+7 (923) 000-00-00</a></li>
						<li><i class="fa-li fa fa-envelope"></i>E-mail:  <a href="mail.ru">alinskiy.danil@mail.ru</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-12">
			<div class="choose-left">
				<h3>Сообщения:</h3>
			</div>
		</div>
		<body>
		    <table class="table">
				<thead>
					<style type="text/css">
            			.table { width: 100%;}
						th.col1 {text-align: center;}
						td.col2 {text-align: center;}
					</style>
				</thead>
                <?php
                    $message = mysqli_query($connect, "SELECT * FROM `message`");
                    $message = mysqli_fetch_all($message);
                    foreach ($message as $product) {
                        ?>
                            <tr>
							    <th class="col1">Имя:</th>
                                <th class="col1"><?= $product[1] ?></th>
                            </tr>
							<tr>
							<td class="col2">email:</td>
							<td><?= $product[2] ?></td>
							</tr>
							<td class="col2"></td>
							<td><?= $product[3] ?></td>
                        <?php
                    }
                ?>
            </table>
            <h4>Пишите нам сообщения:</h4>
	        <form action="vendor/create.php" method="post">
                <p>Ваше Имя:</p>
                <input type="text" size="57" name="name" placeholder="Ваше Имя" required/><br><br>
	    	    <p>Ваш emil:</p>
                <input type="text" size="57" name="email" placeholder="Ваш emil" required/><br><br>
                <p>Ваше Сообщение:</p>
	    	    <textarea type="text" name="mess" placeholder="Ваше Сообщение" required/></textarea><br>
	    	    <button class="btn-primary btn-sm btn-block" style="border-radius: 0 !important; type="submit"><th col2>Отправить сообщение</th>
	        </form>
	    </body>
	</div>
</section>
<?php
	include($_SERVER['DOCUMENT_ROOT'].'/includes/_scripts.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/_footer.php');
?>