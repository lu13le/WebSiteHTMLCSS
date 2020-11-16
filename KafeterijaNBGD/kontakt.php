


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kontakt</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/all.min.css"> 
  <link rel="stylesheet" type="text/css" href="css/body.css">
  <link rel="stylesheet" type="text/css" href="css/kon.css">
  
</head>

<body>
  <div class="container" >
    <?php include "header.php"; ?>
    
    <?php include "nav.php"; ?>
    <div class="col-md-6">
    <div class="kont">

    <form class="contact-form" method="post" action="contactform.php">
      <h2>Kontaktirajte nas!</h2>
      <input type="text" name="name" placeholder="Vaše ime i prezime...">
      <input type="email" name="email" placeholder="Vaš email...">
      <input type="text" name="subject" placeholder="Subject">
      <textarea name="message" placeholder="Vaša poruka..."></textarea>
      <button type="submit" name="submit" class="btn btn-success" style="width: 380px;">POŠALJI MEJL</button>
    </form>
  </div>
  </div>
  <div class="col-md-6">
    <img src="img/kon.jpg">
     <br><br><br><br><br><br>

  </div>

  <br><br><br>

    <?php include "footer.php"; ?>



    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </div>

</body>
</html>