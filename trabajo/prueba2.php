<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EDITODO</title>
</head>
<body>

	<?php
		if (!isset($_GET["id"])){
			$ale = rand(1,4);
			header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]?id=$ale");
			die();
		}
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
		
		$user = $conn->real_escape_string($_GET["id"]);
		$sql = "SELECT * FROM prendas WHERE id=$user";
		$result = $conn->query($sql);
		
		if ($result !== FALSE && $result->num_rows > 0){
			$row = $result->fetch_assoc();
			echo "Prenda: ".$row["nombre"]."<br>";
			echo "Precio: ".$row["precio"]."<br>";
			echo "Descripcion: ".$row["descripcion"]."<br>";
		}
	?>
	<form method="GET" action="prueba2.php">
		<input type="submit" value="Seleccionar producto aleatorio">
	</form>
</body>
</html>