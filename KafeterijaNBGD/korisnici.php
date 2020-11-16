<?php

include "dbh.php"

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Azuriranje korisnika</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/all.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/body.css">
	
</head>

<body>
	<div class="container" >
		<?php include "header.php"; ?>

		<?php include "nav.php"; ?>

		<h1>Azuriranje podataka o korisnicima</h1>

		<form action="korisnici.php" method="post">

			<?php

			$ime="";
			$prezime="";
			$email="";
			$username="";
			$password="";
			$noupit="Ne moze se izvrsiti upit!<br>"; 


			//pretraga po prezimenu

			if(isset($_POST['time']))
			{
				$upit="SELECT * FROM korisnici WHERE ime LIKE '" . $_POST['ime'] . "'";
				$rez=$conn->query($upit);
				if (!$rez) {
					print($noupit);
					die($conn->error);
				}

				if(!($red=$rez->fetch_assoc()))
				{
					print "Nema takvog korisnika. <br>";
				}
				else
				{
					$ime=$red['ime'];
					$prezime=$red['prezime'];
					$email=$red['email'];
					$username=$red['username'];
					$password=$red['password'];
				}

			}

			else if(isset($_POST['dodaj']))
			{
				if((!$_POST['ime']) || (!$_POST['prezime']) || (!$_POST['email']) || (!$_POST['username']) || (!$_POST['password']))
				{
					echo "Morate uneti sve podatke!";
				}
				else
				{
					$upitadd="INSERT INTO korisnici (ime,prezime,email,username,password,id) VALUES 
					('" . $_POST['ime'] . "','" . $_POST['prezime'] . "','" . $_POST['email'] . "','"
					. $_POST['username'] . "','" . $_POST['password'] . "',null)";

					if(!$rezadd=$conn->query($upitadd))
					{
						echo "Korisnik nije dodat!<br>";
						die($conn->error);
					}

					$message="Korisnik je dodat u bazu!";
				}

				$ime=$_POST['ime'];
				$prezime=$_POST['prezime'];
				$email=$_POST['email'];
				$username=$_POST['username'];
				$password=$_POST['password'];
			}


			elseif(isset($_POST['obrisi'])){
				$upitdel= "DELETE FROM korisnici WHERE ime = '". $_POST['ime']. "' AND prezime='".$_POST["prezime"]."' AND username='".$_POST["username"]."'";
				if(!$rezd= $conn->query($upitdel)){
					echo "Brisanje nije moguce.<br>";
					die($conn->error);
				}
				printf("Obrisano: %d red\n", $conn->affected_rows);
				$ime="";
				$prezime="";
				$email="";
				$username ="";
				$password="";   
				if($conn->affected_rows!=0){
					$message= "Uspesno obrisan unos!";
				}
			}

			else if(isset($_POST['azuriraj']))
			{
				if((!$_POST['ime']) || (!$_POST['prezime']) || (!$_POST['email']) || (!$_POST['username']) || (!$_POST['password']))
				{
					echo "Morate uneti sve podatke!";
				}
				else
				{
					$upitupd="UPDATE korisnici SET "
					. "prezime = '" . $_POST['prezime'] . "',"
					. "email = '" . $_POST['email'] . "',"
					. "username = '" . $_POST['username'] . "',"
					. "password = '" . $_POST['password'] . "'"
					. "WHERE ime = '" . $_POST['ime'] . "'";

					if(!$rezupd=$conn->query($upitupd))
					{
						echo "Nisu se azurirali podaci!<br>";
						die($conn->error);
					}
					$message="Podaci su azurirani!<br>";
				}
				$ime=$_POST['ime'];
				$prezime=$_POST['prezime'];
				$email=$_POST['email'];
				$username=$_POST['username'];
				$password=$_POST['password'];

			}




			?>



			<fieldset>
				<legend>Korisnik</legend>
				<p>Ime: <input type="text" name="ime" id="" size="10" value="<?=$ime?>"></p>
				<p>Prezime: <input type="text" name="prezime" id="" size="10" value="<?=$prezime?>"></p>
				<p>Email: <input type="email" name="email" id="" size="10" value="<?=$email?>"></p>
				<p>Username: <input type="text" name="username" id="" size="10" value="<?=$username?>"></p>
				<p>Sifra: <input type="text" name="password" id="" size="10" value="<?=$password?>"></p>
				<input type="submit" name="dodaj" value="DODAJ" class="btn btn-success">
				<input type="submit" name="azuriraj" value="AZURIRAJ" class="btn btn-success">
				<input type="submit" name="obrisi" value="OBRISI" class="btn btn-success">
				<br><br>
				<input type="submit" name="time" value="trazi po imenu" class="btn btn-success">
				<input type="reset" name="reset" value="RESET" class="btn btn-success">
				

			</fieldset>
			<?php
			if(isset($message)){
				echo "<br>$message";
			}


			?>
		</form>
	

		<?php include "footer.php"; ?>



		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	</div>

</body>
</html>