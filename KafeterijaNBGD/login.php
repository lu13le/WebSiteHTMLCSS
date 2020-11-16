<?php


if(isset($_POST['log']))
{


  require 'dbh.php';

  $username = $_POST['username'];
  $password = $_POST['password'];

  //$sql = "SELECT * FROM korisnici where username LIKE '" . $_POST['username'] . "'";
  //$stmt = mysqli_stmt_init($conn);

  $sql = "SELECT * FROM korisnici where username = ?";
  $stmt = mysqli_stmt_init($conn);
  

  if (!mysqli_stmt_prepare($stmt, $sql) )
  {

    header("Location:login.php?error=sqlerror");
    exit();
  }


  else
  {
    // mozda u dubucnost -> prepared statement: mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_bind_param($stmt,"s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result))
    {


      $pwdCheck = password_verify($password, $row['password']);
      if($pwdCheck == false)
      {

        header("Location:login.php?error=wrongpassword" );
        exit();
      }

      else
      {
        session_start();
        $_SESSION['ime'] = $row['ime'];
        $_SESSION['prezime'] = $row['prezime'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['is_loggedin'] = true; // set false when logged out


      }

      
    }
    else
    {
      header("Location:login.php?error=login_error");
      exit();
    }

  }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/all.min.css"> 
  <link rel="stylesheet" type="text/css" href="css/body.css">
    <link rel="stylesheet" type="text/css" href="css/kon.css">
</head>

<body>
  <div class="container">
    <?php include "header.php"; ?>
    <?php include "nav.php"; ?>

    <div> <?php
    if (isset($_GET["error"]) && $_GET["error"] != null){
      echo "An error has occured! " . $_GET["error"];
    }
    ?>
  </div>

  <?php if (!isset($_SESSION['is_loggedin'])){ ?> 
      <!-- <div class="page-header" >
        <h2>ULOGUJTE SE</h2>
      </div> -->


      <div style="width: 500px;
      height: 270px;
      margin: auto;" >

      <form class="form-horizontal" method="post" action="" >
        <h2 style="font-size: 40px; padding: 10px;">Ulogujte se!</h2>
        
        <div class="form-group" style="padding: 10px;">
          <label for="inputUser3" class="col-sm-2 control-label" >Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputUser3" name="username" placeholder="Username" style="width: 300px;">
          </div>
        </div>
        
        
        <div class="form-group" style="padding: 10px;">
          <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" style="width: 300px;">
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
  <div class="form-group" style="padding: 10px;">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-warning" name="log" style="width: 300px;">Uloguj se</button>
    </div>
  </div> 
</form> 

</div>

<?php } else { ?> 
  <div style="margin-top: 150px;margin-bottom: 150px;text-align: center;">
    <p>Uspesno ste se prijavili!</p>   
    <button type="submit" class="btn btn-success"><a href="pocetna.php"> Nastavi</a></button>
    <button type="submit" class="btn btn-success"><a href="logout.php"> Odjavi me</a></button>
    </div >

    <?php } ?> <br><br><br><br><br><br>
    <?php include "footer.php"; ?>



    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
  </div>


</body>
</html> 
