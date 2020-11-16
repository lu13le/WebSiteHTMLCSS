

<?php if(!isset($_SESSION)){ session_start(); } 

$user_logged_in = false;
if (isset($_SESSION["is_loggedin"]) && $_SESSION["is_loggedin"]){
  $user_logged_in = true;
}




?>
<nav class="navbar navbar-default" style="background: black; color: red;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header"style="background: black; color: red;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="pocetna.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Pocetna strana</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav" style="background: black; color: white;">
            <li><a href="onama.php">O nama</a></li>
            
                <li><a href="kafe.php">Proizvodi</a></li>
               
            <li><a href="kontakt.php">Kontakt</a></li>


          </ul>
          <!-- <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <span class="glyphicon glyphicon-search" aria-hidden="true"> </span>
          </form> -->
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" > <span class="caret"></span></a>
              <ul class="dropdown-menu" style="background: black; color: white;">
                <?php
                if(isset($_SESSION["is_loggedin"]) && $_SESSION["is_loggedin"]) {


                ?>


                <li><a href="login.php">Izlogujte se</a></li>

                <?php } else { 


                ?>
                <li><a href="logout.php">Ulogujte se</a></li>
              <?php } ?>
                <li><a href="registracija.php">Napravite nalog</a></li>
                


              </ul>
            </li>
            <?php 

              $cart_counter = 0;
              if (isset($_SESSION['username'])){
                    //$cart_counter = count($_SESSION['shopping_cart']);

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "kafeterijanbgd";

                $conn = new mysqli($servername, $username, $password, $dbname);
                  // Check connection
                  if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  }

                $sql = "SELECT COUNT(*) AS broj FROM cart WHERE username='".$_SESSION['username']."'";

                $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      // output data of each row
                      /*while($row = $result->fetch_assoc()) {
                          echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                      }*/
                      $row = $result->fetch_assoc();
                      $cart_counter = $row["broj"];
                      
                  } else {
                      echo "0 results";
                  }


              }
            ?>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> <?php echo $cart_counter; ?></a></li>
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  