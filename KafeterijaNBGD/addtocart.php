<div align="center">
	<h1>Narudzbina-online kafeterija</h1>

<?php
session_start();

function naridzbenica(){
	$str = "";

	$str = $str."Korisnik  ".$_SESSION["username"]." je porucio sledece proizvode: <br>";

	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kafeterijanbgd";
    $conn = new mysqli($servername, $username, $password, $dbname);
              
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	$ukupno = 0;

    $sql = "SELECT * FROM cart WHERE username='".$_SESSION['username']."'";
    $result = $conn->query($sql);
                
    if ($result->num_rows > 0) {
                  
    while($row = $result->fetch_assoc()) {
                       
        $id = $row['product_id'];
        $kolicina = $row["kolicina"];
                        
        $sql = "SELECT * FROM products1 WHERE id=".$id;
        $result2 = $conn->query($sql);
         
                        
        while($row2 = $result2->fetch_assoc()) {
        $ukupno=$ukupno+(intval($row2["price"])*intval($kolicina));
        $ime = $row2["name"];
        $str = $str."proizvod: ".$ime." kolicina: ".$kolicina." cena po komadu: ".$row2["price"]." RSD"."<br>";
                    }
                    }
                } 
                $conn->close();
    $str = $str."<br><br>Ukupan cena narucenih proizvoda: ".$ukupno." RSD";
    
    return $str;
}

function upisiUfajl($str){
	$ime=date("Y M D")."_".$_SESSION["username"].".txt";

	$myfile = fopen($ime, "w") or die("Unable to open file!");
	fwrite($myfile, $str);
	fclose($myfile);

	return $ime;
}

function postojiVec($userr,$productId){
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

$sql = "SELECT * FROM cart WHERE username='".$userr."' AND product_id=".$productId;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	return true;
} else {
  return false;
}
$conn->close();
}

function upisiNarudzbenicu($user_name,$price,$address,$file){
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

	$sql = "INSERT INTO narudzbenice VALUES (null, '".$user_name."', ".$price.",'".$address."','".$file."')";

	if ($conn->query($sql) === TRUE) {
	  echo "<br>Uspesno upisano u narudzbenice!<br>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

}

//kupi
if(isset($_POST["kupi"])){
if(!isset($_POST["adresa"])){
	echo "neispravna adresa";
}else if($_POST["adresa"]==""){
	echo "neispravna adresa";
}else{

$ukupno = $_POST["racun"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kafeterijanbgd";

$nar =naridzbenica();

$n = str_replace("<br>","\n",$nar);

$fajl=upisiUfajl($n);

$adresa = $_POST["adresa"];

upisiNarudzbenicu($_SESSION["username"],$ukupno,$adresa,$fajl);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM cart WHERE username='".$_SESSION["username"]."'";

if ($conn->query($sql) === TRUE) {
  echo "Proizvodi usepesno poslati na adresu!"."<br><br>"." Ukupan iznos za placanje: ".$ukupno." RSD"."<br>".$nar."<br>"." <a href='kafe.php'>nazad</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error." <a href='kafe.php'>nazad</a>";
}
}
}
if(isset($_POST["add"])){


	$user = $_POST["username"];
	$product_id = $_POST["product_id"];
	$kolicina = $_POST["kolicina"];

	if(!postojiVec($user,$product_id)){
		//echo $username." ".$product_id;

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

	$sql = "INSERT INTO cart VALUES (null, '".$user."', ".$product_id.",".$kolicina.")";

	if ($conn->query($sql) === TRUE) {
	  echo "Proizvod dodat u korpu <a href='kafe.php'>nazad</a>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}else{
	echo "proizvod vec postoji u korpi <a href='kafe.php'>nazad</a>";
}

	
}
?>

</div>