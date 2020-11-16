<?php
  session_start();
$status="";

if(isset($_POST["remove"])){
  $id = $_POST['id'];


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

$sql = "DELETE FROM cart WHERE id=".$id;
echo $sql;

if ($conn->query($sql) === TRUE) {
  echo "uklonjeno";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}

if (isset($_POST['action']) && $_POST['action']=="remove"){


  if(isset($_SESSION["shopping_cart"])) {


    foreach($_SESSION["shopping_cart"] as $key => $value) {
   

      if($_POST["code"] == $value["code"]){
        unset($_SESSION["shopping_cart"][$key]);
        $status = "<div class='box' style='color:red;'>
        Product is removed from your cart!</div>";
      } 
      if(empty($_SESSION["shopping_cart"]))
        unset($_SESSION["shopping_cart"]);

    } 
  }
}


if (isset($_POST['action']) && $_POST['action']=="change"){

  foreach($_SESSION["shopping_cart"] as $key => $value){
    if($value['code'] === $_POST["code"]){
 
     
      $_SESSION['shopping_cart'][$key]["quantity"] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
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
    <title>Pocetna strana</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/all.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <link rel="stylesheet" type="text/css" href="css/body.css">
  </head>

  <body>
    <div class="container" >
      <?php include "header.php"; ?>

      <?php include "nav.php"; ?>

      <div class="cart">
        <?php
        if(isset($_SESSION["username"])){
          $total_price = 0;
          ?> 
          <table class="table">
            <tbody>
              <tr>
                <td></td>
                <td>ITEM NAME</td>
                <td>QUANTITY</td>
                <td>UNIT PRICE</td>
                <td>ITEMS TOTAL</td>
              </tr> 
              <?php 
              
              
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "kafeterijanbgd";
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
$ukupno = 0;
                $sql = "SELECT * FROM cart WHERE username='".$_SESSION['username']."'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                        $id = $row['product_id'];
                        $kolicina = $row["kolicina"];
                        
                        $sql = "SELECT * FROM products1 WHERE id=".$id;
                        $result2 = $conn->query($sql);
                        echo "<tr>";
                        
                        while($row2 = $result2->fetch_assoc()) {
                            $ukupno=$ukupno+(intval($row2["price"])*intval($kolicina));
                            ?>
                            <td>
                              <img src='<?php echo $row2["image"]; ?>' width="50" height="40" />
                            </td>
                            <td><?php echo $row2["name"]; ?><br />
                              <form method='post' action='cart.php'>
                                <input type='hidden' name='id' value='<?php echo $row["id"]; ?>' />
                                <button type='submit' class='remove' name="remove">Remove Item</button>
                              </form>
                            </td>
                            <td>
                              <?php echo $kolicina ?>
                            </td>
                            <!--<td>
                    <form method='post' action='cart.php'>
                      <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                      <input type='hidden' name='action' value="change" />
                      <select name='quantity' class='quantity' onChange="this.form.submit()">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                    </form>
                  </td>-->

                            <td><?php echo $row2["price"]; ?></td>
                            <td><?php echo intval($kolicina)*intval($row2["price"]) ?></td>
                            <?php
                        }

                        echo "</tr>";
                        
                    }
                } else {
                    echo "0 results";
                }
                
                $conn->close();
                

              

/*
              foreach ($_SESSION["shopping_cart"] as $product){
                ?>
                <tr>
                  <td>
                    <img src='<?php echo $product["image"]; ?>' width="50" height="40" />
                  </td>
                  <td><?php echo $product["name"]; ?><br />
                    <form method='post' action='cart.php'>
                      <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                      <input type='hidden' name='action' value="remove" />
                      <button type='submit' class='remove' name="remove">Remove Item</button>
                    </form>
                  </td>
                  <td>
                    <form method='post' action='cart.php'>
                      <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                      <input type='hidden' name='action' value="change" />
                      <select name='quantity' class='quantity' onChange="this.form.submit()">
                        <option <?php if($product["quantity"]==1) echo "selected";?>
                        value="1">1</option>
                        <option <?php if($product["quantity"]==2) echo "selected";?>
                        value="2">2</option>
                        <option <?php if($product["quantity"]==3) echo "selected";?>
                        value="3">3</option>
                        <option <?php if($product["quantity"]==4) echo "selected";?>
                        value="4">4</option>
                        <option <?php if($product["quantity"]==5) echo "selected";?>
                        value="5">5</option>
                      </select>
                    </form>
                  </td>
                  <td><?php echo "$".$product["price"]; ?></td>
                  <td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
                </tr>
                <?php
                $total_price += ($product["price"]*$product["quantity"]);
              }*/
              ?>
              <tr>
                <td colspan="5" align="right">
                  <strong>Ukupna cena: <?php echo $ukupno." dinara"; ?></strong>
                  <br>
                  <form action="addtocart.php" method="post">
                    <input type="hidden" name="racun" value="<?php echo $ukupno ?>">
                    <input type="text" name="adresa" placeholder="adresa isporuke">
                    <button type="submit" name="kupi">Naruči proizvode</button>
                  </form>
                </td>
              </tr>
            </tbody>
          </table> 
          <?php
        }else{
         echo "<h3>Vasa korpa je prazna!</h3>";
       }
       ?>
     </div>

     <div style="clear:both;"></div>

     <div class="message_box" style="margin:10px 0px;">
      <?php echo $status; ?>
    </div>

    <?php include "footer.php"; ?>



    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </div>

</body>
</html>