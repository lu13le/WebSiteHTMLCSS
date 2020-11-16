<?php
session_start();
include('dbh.php');
$status=1;
// print_r($_SESSION);
if (isset($_POST['code']) && $_POST['code']!=""){
    $code = $_POST['code'];
    $query = "SELECT * FROM products WHERE code =" . $code;
    $result = mysqli_query( $conn, $query);


    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $code = $row['code'];
    $price = $row['price'];
    $image = $row['image'];

    $cartArray = array(
       $code=>array(
           'name'=>$name,
           'code'=>$code,
           'price'=>$price,
           'quantity'=>1,
           'image'=>$image)
   );

    if(empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Proizvod je dodat u korpu!</div>";
         $status = 2;
    }else{
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if(in_array($code,$array_keys)) {
           $status = "<div class='box' style='color:red;'>
           Proizvod vec postoji u korpi!</div>"; 
           $status = 3;
       } else {
        $_SESSION["shopping_cart"] = array_merge(
            $_SESSION["shopping_cart"],
            $cartArray
        );
        $status = "<div class='box'>Proizvod je dodat u korpu!</div>";
         $status = 4;
    }

}
    header('Location: racunari.php?status=' . $status);
    exit();
}

?>