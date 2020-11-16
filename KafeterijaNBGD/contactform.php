<?php
session_start();

function dodajMail($ime,$korime,$email,$naslov,$poruka){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kafeterijanbgd";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO mail VALUES (null, '".$ime."', '".$korime."','".$email."','".$naslov."','".$poruka."')";

	if ($conn->query($sql) === TRUE) {
	  echo "mail poslat <a href='kontakt.php'>nazad</a>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$mailFrom = $_POST['email'];
	$message = $_POST['message'];
	

	if(isset($_SESSION["username"])){
		$korime = $_SESSION["username"];
	}else{
		$korime = "neulogovan";
	}


	$mailTo = "raicevic12345@gmail.com";
	$headers = "Od: " . $mailFrom;
	$txt = "Dobili ste e-mail od " .$name.".\n\n" .$message;


	dodajMail($name,$korime,$mailFrom,$subject,$message);

	//mail($mailTo, $subject, $txt, $headers);
	//header("Location: kontakt.php?mailsend");

}





?>