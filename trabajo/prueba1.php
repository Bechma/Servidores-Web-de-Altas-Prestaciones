<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EDITODO</title>
</head>
<body>

	<?php
		if (isset($_POST["user"]) && isset($_POST["pass"])){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "swap";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$user = $conn->real_escape_string($_POST["user"]);
			$pass = $conn->real_escape_string($_POST["pass"]);
			$sql = "SELECT * FROM vulnerable WHERE user='$user' and pass='$pass'";
			$result = $conn->query($sql);
			
			if ($result !== FALSE && $result->num_rows > 0){
				$row = $result->fetch_assoc();
				die("Bienvenido " . $row["user"] . " el proceso de login se ha completado.");
			}
			die("Error, usuario o contraseña incorrecto.<br>" . $sql);
			
			die( "Error: " . $sql . "<br>" . $conn->error . "<br>" . $result);
		}
	?>
	<form method="POST" action="prueba1.php">
		Username:<br>
		<input type="text" name="user"><br>
		Password:<br>
		<input type="text" name="pass"><br>
		<input type="submit">
	</form>
</body>
</html>