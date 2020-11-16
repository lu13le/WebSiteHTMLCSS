<?php

$servername="localhost";
$dBUsername="root";
$dBPassword="";
$dBName="kafeterijanbgd";

$conn=mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Greska: " . mysqli_connect_error());
}

?>