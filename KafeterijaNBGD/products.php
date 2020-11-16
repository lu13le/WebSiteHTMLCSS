<?php

include "dbh.php"

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Azuriranje proizvoda</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/all.min.css"> 
	

</head>

<body>
	<div class="container" >
		<?php include "header.php"; ?>

		<?php include "nav.php"; ?>

		<h1>Azuriranje proizvoda</h1>
		<div class="kont">
		<form action="products.php" method="post">

			<?php

			$id="";
			$type="";
			$name="";
			$model="";
			$code="";
			$price="";
			$image="";
			$noupit="Ne moze se izvrsiti upit!<br>"; 


			//pretraga po prezimenu

			if(isset($_POST['tvrsta']))
			{
				$upit="SELECT * FROM products1 WHERE type LIKE '" . $_POST['type'] . "'";
				$rez=$conn->query($upit);
				if (!$rez) {
					print($noupit);
					die($conn->error);
				}

				if(!($red=$rez->fetch_assoc()))
				{
					print "Nema takvog proizvda. <br>";
				}
				else
				{
					$id=$red['id'];
					$type=$red['type'];
					$name=$red['name'];
					$model=$red['model'];
					$code=$red['code'];
					$price=$red['price'];
					$image=$red['image'];

				}

			}

			else if(isset($_POST['dodaj']))
			{
				if((!$_POST['type']) || (!$_POST['type']) || (!$_POST['name']) || (!$_POST['model']) || (!$_POST['code']) || (!$_POST['price']) || (!$_POST['image']))
				{
					echo "Morate uneti sve podatke!";
				}
				else
				{
					$upitadd="INSERT INTO products1 (id,type,name,model,code,price,image) VALUES 
					(null,'" . $_POST['type'] . "','" . $_POST['name'] . "','"
					. $_POST['model'] . "','" . $_POST['code'] ."',". $_POST['price'] .",'". $_POST['image'] . "')";

					if(!$rezadd=$conn->query($upitadd))
					{
						echo "Proizvod nije dodat!<br>";
						die($conn->error);
					}

					$message="Proizvod je dodat u bazu!";
				}

				$id=$_POST['id'];
				$type=$_POST['type'];
				$name=$_POST['name'];
				$model=$_POST['model'];
				$code=$_POST['code'];
				$price=$_POST['price'];
				$image=$_POST['image'];
			}


			elseif(isset($_POST['obrisi'])){
				$upitdel= "DELETE FROM products1 WHERE id = ". $_POST['id'];
				if(!$rezd= $conn->query($upitdel)){
					echo "Brisanje nije moguce.<br>";
					die($conn->error);
				}
				printf("Obrisano: %d red\n", $conn->affected_rows);
				// $id="";
				$type="";
				$name="";
				$model="";
				$code="";
				$price="";
				$image="";  
				if($conn->affected_rows!=0){
					$message= "Uspesno obrisan unos!";
				}
			}


			else if(isset($_POST['azuriraj']))
			{
				if((!$_POST['id']) || (!$_POST['type']) || (!$_POST['name']) || (!$_POST['model']) || (!$_POST['code']) || (!$_POST['price']) || (!$_POST['image']))
				{
					echo "Morate uneti sve podatke!";
				}
				else
				{
					$upitupd="UPDATE products1 SET type = '" . $_POST['type'] . "',name = '" . $_POST['name'] . "',model = '" . $_POST['model']."', code = '" . $_POST['code'] . "', price = " . $_POST['price'].", image = '" . $_POST['image'] . "' WHERE id = " . $_POST['id'];

					if(!$rezupd=$conn->query($upitupd))
					{
						echo "Nisu se azurirali podaci!<br>";
						die($conn->error);
					}
					$message="Podaci su azurirani!<br>";
				}
				$id=$_POST['id'];
				$type=$_POST['type'];
				$name=$_POST['name'];
				$model=$_POST['model'];
				$code=$_POST['code'];
				$price=$_POST['price'];
				$image=$_POST['image'];

			}




			?>



			<fieldset>
				<legend>Proizvodi</legend>
				<p>Id: <input type="text" name="id" id="" size="10" value="<?=$id?>"></p>
				<p>Type: <input type="text" name="type" id="" size="10" value="<?=$type?>"></p>
				<p>Naziv: <input type="text" name="name" id="" size="10" value="<?=$name?>"></p>
				<p>Model: <input type="text" name="model" id="" size="10" value="<?=$model?>"></p>
				<p>Kod: <input type="text" name="code" id="" size="10" value="<?=$code?>"></p>
				<p>Cena: <input type="text" name="price" id="" size="10" value="<?=$price?>"></p>
				<p>Slika: <input type="text" name="image" id="" size="10" value="<?=$image?>"></p>
				<input type="submit" name="dodaj" value="DODAJ" class="btn btn-success">
				<input type="submit" name="azuriraj" value="AZURIRAJ" class="btn btn-success">
				<input type="submit" name="obrisi" value="OBRISI" class="btn btn-success">
				<br><br>
				<input type="submit" name="tvrsta" value="trazi po vrsti" class="btn btn-success">
				<input type="reset" name="reset" value="RESET" class="btn btn-success">
				

			</fieldset>
			<?php
			if(isset($message)){
				echo "<br>$message";
			}


			?>
		</form>
	</div>

		<?php include "footer.php"; ?>



		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	</div>

</body>
</html>