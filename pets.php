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
									<li><a href="index.php"><b>Главная</b></a></li>
									<li class="active"><a href="#"><b>Питомцы</b></a></li>
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
						<h1>Поиск <span>Ваших</span> будущих <span>питомцев!</span></h1>
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
					<h2>Мы всегда готовы помочь вам и вашей семье</h2>
					<img src="assets/img/section-img.png" alt="#">
					<p>Особеность компании онлайн знакомства с клиентам, главный место хранения разработчика.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container d-flex justify-content-center">
			    <div class="card mt-5 p-4">
			        <div class="input-group mb-3"> <input type="text" class="form-control">
			            <div class="input-group-append"><button class="btn" style="border-radius: 0 !important;"><i class="fa fa-search"></i></button></div>
			        </div> <span class="text mb-4">Заполнитель</span>
			        
					<div class="d-flex flex-row justify-content-between mb-3">
			            <div class="d-flex flex-column p-3">
			                <p class="mb-1">Заполнитель</p> <small class="text-muted">Small Заполнитель</small>
			            </div>
			            <div class="price pt-3 pl-3"> <span class="mb-2">Заполнитель</span>
			                <h5><span>&dollar;</span>1,500</h5>
			            </div>
			        </div>
			        <div class="d-flex flex-row justify-content-between mx-1">
			            <div class="d-flex flex-column p-3">
			                <p class="mb-1">Заполнитель</p> <small class="text-muted">Small Заполнитель</small>
			            </div>
			            <div class="price pt-3 pl-3"> <span class="mb-2">Заполнитель</span>
			                <h5><span>&dollar;</span>40</h5>
			            </div>
			        </div>
			    </div>
			</div>
			<div class="container">
				<h2>Поиск домашних животных:</h2>
				<form id="owners" method="post" onsubmit="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
				    <div class="input-group mb-3">Введите имя владельца: <input type="text" name="owner">
			            <div class="input-group-append"><button class="btn-primary btn-sm" style="border-radius: 0 !important;">Поиск</i></button></div>
			        </div>
				</form><br/>
				<?php
					$conn = mysqli_connect("localhost", "root", "root", "vet_db");
					if (! $conn){
						die("Connection Failied: ". mysqli_connect_error());
					}

					if ($_SERVER["REQUEST_METHOD"] == "POST"){
						if (empty($_POST["owner"])){
							echo "<h3>Список найденых питомцев:</h3>";
							echo "Имя обязательно!";
						} else {
							 $result = mysqli_query($conn,
							"SELECT Owner.Name, Animal.Petname, Animal.DOB
							FROM Owner_Animal
							INNER JOIN Owner ON Owner_Animal.Owner=Owner.OwnerID
							INNER JOIN Animal ON Owner_Animal.Animal=Animal.AnimalID
							WHERE Owner.Name LIKE '".$_POST["owner"]."%'");
							echo "<h3>Список найденых питомцев:</h3>";
							if(mysqli_num_rows($result) > 0){
								while ($r = mysqli_fetch_assoc($result)) {
									echo $r["Name"],"</td><td> ";
									echo $r["Petname"],"</td><td> ";
									echo $r["DOB"],"</td><br></tr>";
								}
							} else {
								echo "Нечего ненайдено!";
							}
							mysqli_free_result($result);
						}
					}
					echo "<br><br><br>";
				?>
			</div>
		</div>
	</div>
</section>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/includes/_scripts.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/_footer.php');
?>