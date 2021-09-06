
<!-- http://localhost/VetWebsite.php -->

<?php
$conn = mysqli_connect("localhost", "root", "", "vet_db"); //подключается к базе данных mysql
if (! $conn){ //в случае ошибки доступа к базе данных mysql
	die("Connection Failied: ". mysqli_connect_error());
}
?>

<!-- СОЗДАЕТ МАКЕТ ВЕБ-СТРАНИЦЫ -->

<!DOCTYPE HTML>
<html>
<title> Vets Database </title>

<head>
<h1> Veterinary Centres </h1>
</head>

<body>
<p id="text"> 

<!-- ДИСПЛЕИ КОМПАНИЯ И СТРОИТЕЛЬНАЯ ИНФОРМАЦИЯ -->

<?php
$result = mysqli_query($conn, //запросы к базе данных MySQL
"SELECT Company.Name, Building.City, Building.Postcode, Building.BuildingID
FROM Building
INNER JOIN Company ON Building.Company=Company.CompanyID"); //выбирает записи с совпадающими значениями в обеих таблицах
echo "<h2>Practices:</h2><br>"; //отображает заголовок
if(mysqli_num_rows($result) > 0){ //делает это только в том случае, если существуют данные для предотвращения ошибок
	while ($r = mysqli_fetch_assoc($result)) { //повторяется для каждой выбранной записи
		echo "<tr><strong><td>",$r["Name"],"</td><td> "; //читает данные из результата запроса mysql
		echo $r["City"],"</td></strong><td>  ";
		echo $r["Postcode"],"</td><td> Building:";
		echo $r["BuildingID"],"</td><br></tr>";
	}
} else {
	echo "0 results";
}
mysqli_free_result($result); //освобождает результат запроса mysql, чтобы можно было выполнять больше запросов
echo "<br><br><br>";

// ДИСПЛЕИ ПЕРСОНАЛ//

$result = mysqli_query($conn, //запросы к базе данных MySQL
"SELECT Name, Email, Building
FROM Staff 
ORDER BY Name ASC"); //отображает выбранные записи в алфавитном порядке названий
echo "<h2>Staff:</h2><br>";
if(mysqli_num_rows($result) > 0){ //делает это только в том случае, если существуют данные для предотвращения ошибок
	while ($r = mysqli_fetch_assoc($result)) { //повторяется для каждой выбранной записи
		echo "<tr><strong><td>",$r["Name"],"</td></strong><td>   "; //читает данные из результата запроса mysql
		echo $r["Email"],"</td><td>   Building:";
		echo $r["Building"],"</td><br></tr>";
	}
} else {
	echo "0 results";
}
mysqli_free_result($result); //освобождает результат запроса mysql, чтобы можно было выполнять больше запросов
echo "<br><br><br>";

// ДИСПЛЕИ НАЗНАЧЕНИЯ //

$result = mysqli_query($conn, //запросы к базе данных MySQL
"SELECT Appointment.Time, Appointment.Room, Staff.Building, Staff.Name, Animal.Petname
FROM Appointment
INNER JOIN Vet ON Appointment.Vet=Vet.VetID
INNER JOIN Staff ON Appointment.Vet=Staff.StaffID
INNER JOIN Animal ON Appointment.Animal=Animal.AnimalID 
ORDER BY Time ASC LIMIT 5"); //отображает только следующие 5 встреч
echo "<h2>Appointments:</h2>";
if(mysqli_num_rows($result) > 0){ //делает это только в том случае, если существуют данные для предотвращения ошибок
	echo "<table class='table'><tr><th>Time</th><th>Room</th><th>Building</th><th>Vet</th><th>Pet</th></tr>"; //таблица для отображения данных
	while ($r = mysqli_fetch_assoc($result)) { //повторяется для каждой выбранной записи
		echo "<tr><td>",$r["Time"],"</td><td>  "; //читает данные из результата запроса mysql
		echo $r["Room"],"</td><td>  ";
		echo $r["Building"],"</td><td>";
		echo $r["Name"],"</td><td>  ";
		echo $r["Petname"],"</td><br></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_free_result($result); //освобождает результат запроса mysql, чтобы можно было выполнять больше запросов
echo "<br><br><br>";

?>
</p>

<!-- ДИСПЛЕИ ВЛАДЕЛЬЦА ЖИВОТНЫХ НА ОСНОВЕ ПОИСКА С ПОМОЩЬЮ ТЕКСТОВОГО БЛОКА-->

<h2>Pet Search:</h2>
<form id="owners" method="post" onsubmit="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
<!-- $ _SERVER ["PHP_SELF"] - это суперглобальное сохраняющее имя файла текущего скрипта, поэтому на этой странице отображаются сообщения об ошибках. -->
<!-- htmlspecialchars предотвращает раскрытие кода злоумышленниками путем внедрения HTML или Javascript путем преобразования символов -->
Enter Owner Name: <input type="text" name="owner"><br> 
<input type="submit" value="Submit"> 
</form> 

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){ //проверяет, отправлена ​​ли форма (валидация)
	if (empty($_POST["owner"])){ //проверяет, пусто ли текстовое поле (проверка)
		echo "<br>Name is required.";
	} else {
		 $result = mysqli_query($conn, //запросы к базе данных MySQL
		"SELECT Owner.Name, Animal.Petname
		FROM Owner_Animal
		INNER JOIN Owner ON Owner_Animal.Owner=Owner.OwnerID
		INNER JOIN Animal ON Owner_Animal.Animal=Animal.AnimalID
		WHERE Owner.Name LIKE '".$_POST["owner"]."%'"); //где имя начинается с введенного значения, поэтому не нужно вводить полное имя
		echo "<h3>Pets:</h3>";
		if(mysqli_num_rows($result) > 0){ //делает это только в том случае, если существуют данные для предотвращения ошибок
			while ($r = mysqli_fetch_assoc($result)) { //повторяется для каждой выбранной записи
				echo "<tr><td>",$r["Name"],"</td><td> Owns "; //читает данные из результата запроса mysql
				echo $r["Petname"],"</td><br></tr>";
			}
		} else {
			echo "0 results";
		}
		mysqli_free_result($result); //освобождает результат запроса mysql, чтобы можно было выполнять больше запросов
	}
}
echo "<br><br><br>";
 ?>

<!-- ОТОБРАЖАЕТ ЖИВОТНЫХ НА ОСНОВЕ ВВОДА ИЗ ВЫПАДАЮЩЕГО ЯЩИКА -->

<h2>Patients:</h2>
<form id="patients" method="get" onsubmit="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
<!-- $ _SERVER ["PHP_SELF"] - это суперглобальное сохраняющее имя файла текущего скрипта, поэтому на этой странице отображаются сообщения об ошибках. -->
<!--htmlspecialchars предотвращает раскрытие кода злоумышленниками путем внедрения HTML или Javascript путем преобразования символов -->
Select Pet Type: <select name="patient"> <!-- выпадающий список -->
	<option value="cat">Cat</option>
	<option value="dog">Dog</option>
	<option value="other">Other</option>
<input type="submit" value="Submit"> 
</form> 

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET"){ //проверяет, отправлена ​​ли форма (валидация)
	if ($_GET["patient"] == "cat"){ //если выбрана кошка, отображаются все кошки
		$result = mysqli_query($conn, 
		"SELECT Animal.Petname, Animal.Gender, Animal.DOB, Cat.Colour
		FROM Animal
		INNER JOIN Cat ON Animal.AnimalID=Cat.CatID
		ORDER BY DOB DESC"); //заказано DOB в порядке убывания
		echo "<h2>Cats:</h2>";
		if(mysqli_num_rows($result) > 0){
			while ($r = mysqli_fetch_assoc($result)) {
				echo "<tr><td>",$r["Petname"],"</td>  <td>";
				echo "<td>",$r["Gender"],"</td>  <td>";
				echo "<td>",$r["DOB"],"</td>  <td>";
				echo $r["Colour"],"</td><br></tr>";
			}
		} else {
			echo "0 results";
		}
	} elseif ($_GET["patient"] == "dog"){ //иначе, если выбрана собака, отображаются все собаки
		$result = mysqli_query($conn, 
		"SELECT Animal.Petname, Animal.Gender, Animal.DOB, Dog.Breed
		FROM Animal
		INNER JOIN Dog ON Animal.AnimalID=Dog.DogID
		ORDER BY DOB DESC"); //заказано DOB в порядке убывания
		echo "<h2>Dogs:</h2>";
		if(mysqli_num_rows($result) > 0){
			while ($r = mysqli_fetch_assoc($result)) {
				echo "<tr><td>",$r["Petname"],"</td>  <td>";
				echo "<td>",$r["Gender"],"</td>  <td>";
				echo "<td>",$r["DOB"],"</td>  <td>";
				echo $r["Breed"],"</td><br></tr>";
			}
		} else {
			echo "0 results";
		}
	} else { //иначе означает, что было выбрано другое, поэтому отображаются животные, которые не являются кошками или собаками
		$result = mysqli_query($conn, 
		"SELECT Petname, Gender, DOB
		FROM Animal
		WHERE AnimalID NOT IN ((SELECT CatID FROM Cat) UNION (SELECT DogID FROM Dog))
		ORDER BY DOB DESC"); //использует подзапрос и объединение для выбора всех животных, которых нет в таблицах Cat или Dog
		echo "<h2>Other Animals:</h2>";
		if(mysqli_num_rows($result) > 0){
			while ($r = mysqli_fetch_assoc($result)) {
				echo "<tr><td>",$r["Petname"],"</td>  <td>";
				echo "<td>",$r["Gender"],"</td>  <td>";
				echo "<td>",$r["DOB"],"</td>  <td></tr>";
			}
		} else {
			echo "0 results";
		}
	}
	mysqli_free_result($result); //освобождает результат запроса mysql, чтобы можно было выполнять больше запросов
}
echo "<br><br><br>";
 ?>
</body>
</html>

<!-- ОТКЛЮЧАЕТ ПОДКЛЮЧЕНИЕ К БАЗЕ ДАННЫХ MYSQL -->

<?php
mysqli_close($conn);
?>

