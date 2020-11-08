<?php
	// See all errors and warnings
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);

//    $server = "localhost";
//    $username = "root";
//    $password = "";
//    $database = "dbRush";
//    //Create Connection
//    $conn = mysqli_connect($server, $username, $password, $database);
//    //Check Connection
//    if(!$conn){
//        die("Connection failed: ". mysqli_connect_error());
//    }

	//echo $_POST["regPass"];
        $name = $_POST["regName"];
        $surname = $_POST["regSurname"];
        $email = $_POST["regEmail"];
        $date = $_POST["regBirthDate"];
        $pass = $_POST["regPass"];
        $username = $_POST["regEmail"];

        $query = "INSERT INTO tbusers (name, username, surname, email, birthdate, password) VALUES ('$name','$username','$surname', '$email', '$date', '$pass');";
        global $conn;
        include ('includes/config.php');
        $res = mysqli_query($conn, $query) == TRUE;



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>IMY 220 - Assignment 2</title>
	<meta name="author" content="Dean Nortje">
	<!-- Replace Name Surname with your name and surname -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<?php 
			if($res)
				echo '<div class="alert alert-primary mt-3" role="alert">
  						The account has been created you can return to the login page 					
                        <a href="../index.html">Login Click Here</a>
  					</div>';
  			else
  				echo '<div class="alert alert-danger mt-3" role="alert">
  						The account could not be created
  						<a href="../index.html">Error Click Here and Retry</a>
  					</div>';
		?>
	</div>
</body>
</html>