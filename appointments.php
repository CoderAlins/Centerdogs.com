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
									<li><a href="pets.php"><b>Питомцы</b></a></li>
									<li class="active"><a href="#"><b>Приемы</b></a></li>
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
						<p class="under-text" style="margin-top: 20px !important; font-size: 16px;">Режим работы: ежедневно с 09:00 до 17:00 без обеда, выходные дни: суббота, воскресенье. Записаться на прием Вы можете предварительно по сообщению на страницы "Контакты".</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="choose-left">
					<h3>Приемы:</h3>
				</div>
			</div>
			<div class="container">
				<?php
					$conn = mysqli_connect("localhost", "root", "root", "vet_db");
					if (! $conn){
						die("Connection Failied: ". mysqli_connect_error());
					}

					$result = mysqli_query($conn,
					"SELECT Appointment.Time, Appointment.Room, Staff.Building, Staff.Name, Animal.Petname
					FROM Appointment
					INNER JOIN Vet ON Appointment.Vet=Vet.VetID
					INNER JOIN Staff ON Appointment.Vet=Staff.StaffID
					INNER JOIN Animal ON Appointment.Animal=Animal.AnimalID 
					ORDER BY Time ASC LIMIT 5");
					
					if(mysqli_num_rows($result) > 0){
						echo "<table class='table'><tr><th>Время<th>Комната</th><th>Здание</th><th>Ветеринар</th><th>Питомец</th></tr>";
						while ($r = mysqli_fetch_assoc($result)) {
							echo "<tr><td>",$r["Time"],"</td><td>  ";
							echo $r["Room"],"</td><td>  ";
							echo $r["Building"],"</td><td>";
							echo $r["Name"],"</td><td>  ";
							echo $r["Petname"],"</td></tr>";
						}
						echo "</table>";
					} else {
						echo "0 results";
					}
					mysqli_free_result($result);
					echo "<br><br>";
				?>
			</div>
		</div>
	</div>
</section>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/includes/_scripts.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/_footer.php');
?>