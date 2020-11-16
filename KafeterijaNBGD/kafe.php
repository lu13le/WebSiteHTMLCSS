<?php
include('dbh.php');
session_start();

$user_logged_in = false;
if (isset($_SESSION["is_loggedin"]) && $_SESSION["is_loggedin"]){
  $user_logged_in = true;
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Proizvodi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/all.min.css"> 
  <link rel="stylesheet" type="text/css" href="css/cart.css">
  <link rel="stylesheet" type="text/css" href="css/body.css">
  <link rel="stylesheet" type="text/css" href="css/dug.css">
</head>

<body>
  <div class="container" >

    <?php include "header.php"; ?>
    <?php include "nav.php"; ?>


    

    <br><br><br><br>

    
      
<?php
    if(isset($_POST['trazi']))
    {
      foreach($_POST['pretraga'] as $select)
      {
        if(isset($_POST["sortiraj"])){
          

          $a = $_POST["sortiraj"];
          if($a=="cena"){
            $upit3="SELECT * FROM products1 WHERE $select LIKE '%" . $_POST['pretr'] . "%' ORDER BY price ASC";
          }else{
            $upit3="SELECT * FROM products1 WHERE $select LIKE '%" . $_POST['pretr'] . "%' ORDER BY name ASC";
          }

        }else{
          $upit3="SELECT * FROM products1 WHERE $select LIKE '%" . $_POST['pretr'] . "%'";
        }
        
        $rez=$conn->query($upit3);
        if(!$rez)
        {
          
          die($conn->error);
        }
/*
        if(!($red=$rez->fetch_assoc()))
        {
          print "Nema trazenog proizvoda";
        }*/
        else
        {
          /*$id=$red['id'];
          $type=$red['type'];
          $ime=$red['name'];*/
          

          $message="";
          if($rez->num_rows>0)
          {
            //echo "Prvi proizvod u bazi sa zadatim kriterijumom je:";
            $message .= "Ostali proizvodi:<br>"
            . "<table border= '2px' align='center'><tr>"
            . "<th width='50'> id </th>"
            . "<th width='50'> tip </th>"
            . "<th width='50'> ime </th>"
            . "<th width='50'> model </th>"
            . "<th width='50'> kod </th>"
            . "<th width='50'> cena </th>"
            . "<th width='50'>  </th></tr>";
            //[{ime,prezime},{ime,prezime},{ime,prezime},{ime,prezime}]
            while($row=$rez->fetch_assoc())
            {
              $message .= "<tr><td>" . $row['id']
              . "</td><td>" . $row['type']
              . "</td><td>" . $row['name']
              . "</td><td>" . $row['model']
              . "</td><td>" . $row['code'] 
              . "</td><td>" . $row['price']
              . "</td><td>
              <form action='addtocart.php' method='post'>
              <input type='hidden' name='kolicina' value='1'>
              <input type='hidden' name='product_id' value='".$row['id']."'>
              <input type='hidden' name='username' value='".$_SESSION['username']."'>
              <button type='submit' class='btn btn-warning' name='add'>Dodaj u korpu</button></form></td></tr>";
            }
            //username,product_id,kolicina
            $message .= "</table><br>";
          }
          else
          {
            echo "1 rezultat u bazi po zadatom kriterijumu:";
          }
        }
      }
    }
?>

<form method="post" action="kafe.php">

  <select name="pretraga[]">
      <option value="id">ID</option>
    
      <option value="name">Ime</option>
      
    </select>
    <input type="text" name="pretr">
    <input type="submit" name="trazi" value="TRAZI"><br>
    <input type="radio" name="sortiraj" value="cena">sortiraj po ceni<br>
    <input type="radio" name="sortiraj" value="ime">sortiraj po imenu
</form>

<?php
  if(isset($message)){
    echo "<br>$message";
  }


  ?>

    

    <br><br><br><br>

    

    <?php
    $result = mysqli_query($conn,"SELECT * FROM products1");
    while($row = mysqli_fetch_assoc($result)){
      echo "<div class='product_wrapper'>
      <form method='post'";
     
      if (!$user_logged_in){ 
        echo "onsubmit='return print_userLoginAlarm()'; ";
      }
      echo "action='addtocart.php'><input type='hidden' name='code' value=".$row['code']." />
      <div class='image'><img src='".$row['image']."' /></div>

      <div class='name'>".$row['name']."</div>
      <div class='model'>".$row['model']."</div>
      <div class='price'>".$row['price']." RSD</div>";

      ?>
      
        <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
        <input type="text" name="kolicina" value="0" style="width: 30px;">
        <input type="hidden" name="product_id" value="<?php echo $row['id'] ?>"><br>
        <br><button type="submit" class='btn btn-warning' name="add">Dodaj u korpu</button>
      </form>
      <?php

      //echo "<button type='submit'";

      //echo "class='buy'>Dodaj u korpu</button></form></div>";
      echo "</div>";
    }
    mysqli_close($conn);
    ?>

    <div style="clear:both;"></div>

    <div class="message_box" style="margin:10px 0px;">
      <?php 
      if (isset($_GET["status"]) && $_GET["status"] != null){
        $status = $_GET["status"];
        switch ($status) {
          case 0: 
          echo "";
          break;
          case 1:
          echo " ";
          break;
          case 2:
          echo "Proizvod je dodat u korpu!";
          break;
          case 3:
          echo "Proizvod vec postoji u korpi!";
          break;
          case 4:
          echo "Proizvod je dodat u korpu!";
          break;
          default:
        // Do nothing 

        }
    // TODO Parse error/ status code 
        echo $status; 
      }
      else {

      }
      ?>
    </div>
    



      <?php include "footer.php"; ?>



      <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
      <script>
          function print_userLoginAlarm(){ alert("Morate biti ulogovani!"); return false;}
      </script>
    </div>

  </body>
  </html>