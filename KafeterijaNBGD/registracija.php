<?php 

include 'dbh.php';
if(isset($_POST['reg'])){

  $ime=$_POST['ime'];
  $prezime=$_POST['prezime'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];

  //$id=uniqid(rand(),true); za pravljenje varchar lozinke
  
  
  
  $provera="SELECT * FROM korisnici WHERE username='".$username."'";
  
  $usernameFound=$conn->query($provera);
  
  if(mysqli_num_rows($usernameFound)>0){
    echo "korisnicko ime vec postojii";
  }
  else if (empty($ime) || empty($prezime) || empty($email) || empty($username) || empty($password)) {
    header("Location: registracija.php?error=emptyfields&username=".$username."&email=".$email);
    exit();
  }
  else{

    $hashedPwd=password_hash($password, PASSWORD_DEFAULT);
    echo $ime;
    echo $prezime;
    echo $email;
    echo $username;
    echo $hashedPwd;
    $sql="INSERT INTO korisnici (ime,prezime,email,username,password) VALUES('".$ime."','".$prezime."','".$email."','".$username."','".$hashedPwd."')";

    
  }
  
}

?>












<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registracija</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/all.min.css"> 
  <link rel="stylesheet" type="text/css" href="css/body.css">
    <link rel="stylesheet" type="text/css" href="css/kon.css">
</head>

<body>
  <div class="container">
   <?php include "header.php"; ?>
   <?php include "nav.php"; ?>

   <div style="width: 500px;
   height: 270px;
   margin: auto;">
   <form class="form-horizontal" method="post" action="registracija.php">
    <h2>Registrujte se!</h2><br><br>
    <div class="form-group">
      <label for="inputIme3" class="col-sm-2 control-label">Ime</label>
      <div class="col-sm-10">
        <input type="text" name="ime" class="form-control" id="inputIme3" placeholder="Ime" style="width: 300px;">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPrezime3" class="col-sm-2 control-label">Prezime</label>
      <div class="col-sm-10">
        <input type="text" name="prezime" class="form-control" id="inputPrezime3" placeholder="Prezime" style="width: 300px;">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" style="width: 300px;">
      </div>
    </div>
    <div class="form-group">
      <label for="inputUser3" class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
        <input type="text" name="username" class="form-control" id="inputUser3" placeholder="Username" style="width: 300px;">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" style="width: 300px;">
      </div>
    </div>
  <!-- <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div> -->
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit"class="btn btn-warning" name="reg" style="width: 300px;">Registruj se</button>
    </div>
  </div>
</form>
</div>

<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>

<?php include "footer.php"; ?>



<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="js/sweetalert.min.js"></script>
</div>
<?php
if($conn->query($sql)===TRUE){
 // header('Location: pocetna.php?success');
 ?>
 <script>
  swal({
    title: "Uspesno ste se registrovali!",
    text: "Dobrodosli u Kafeteriju NBGD",
    icon: "success",
    button: "OK",
  });
</script> 
<?php 

}else{

  echo "Error:".$sql."<br>".$conn->error; 
}
?>

</body>
</html>