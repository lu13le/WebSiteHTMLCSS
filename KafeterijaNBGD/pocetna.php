



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pocetna strana</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/all.min.css"> 
  <link rel="stylesheet" type="text/css" href="css/body.css">
</head>

<body>
  <div class="container" >
    <?php include "header.php"; ?>
    
    <?php include "nav.php"; ?>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        <!-- <li data-target="#carousel-example-generic" data-slide-to="4"></li> -->
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/slide3.jpg" alt="sl1">
          <div class="carousel-caption">
            <h3><b>Dobro dosli u Kafeteriju NBGD</b></h3>
            <p><b>Mesto gde stanuje dobra kafa!</b></p>
          </div>
        </div>
        <div class="item">
          <img src="img/slide2.jpg" alt="sl2">
          <div class="carousel-caption">
            <h3><b>Najveći izbor kafe</b></h3>
            <p><b>Nudimo vam veliki izbor kafe, od cappuccina do americana!</b></p>
          </div>
        </div>
        <div class="item">
          <img src="img/slide1.jpg" alt="sl3">
          <div class="carousel-caption">
            <h3><b>Najkvalitetnija kafa</b></h3>
            <p><b>Naša kafa je visokog kvaliteta, uverite se u to!</b></p>
          </div>
        </div>
        
        
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><br><br><br>
    <h3 style="text-align: center;"><strong>INOVATIVNOST I INVENTIVNOST! TAJNA NAŠEG USPEHA!</strong></h3><br><br>
    <p align="justify">Osim prve jutarnje, naši svakodnevni rituali su i praćenje onog najboljeg što pasionirani inovatori iz sveta kafe mogu da ponude kako bi se održao kvalitet proizvoda, a usluga podigla na nivo novog uživanja u tradicionalnom napitku.</p><br>
    <p>Tako, osim što gotovo pred očima gostiju pržimo kafu za svaki od naših objekata u Srbiji, svakom posetiocu pružamo mogućnost da uz pomoć novih metoda i sam učestvuje u procesu ne samo ispijanja, već i specifičnog načina pripreme kafe.</p><br>
    <p>Osim toga što idemo u korak sa onim najboljim što svet kafe može da ponudi, kada je reč o kreativnosti uvek smo korak ispred. Svaki od naših objekata posebno je uređen i u potpunosti podređen uživanju u omiljenoj vrsti kafe, uz osećaj da sedite u sopstvenoj dnevnoj sobi.</p><br>
    <p>Tako se naš odnos sa gostima, ma gde otvorili vrata, ne razlikuje mnogo od komšijskog – onog iskrenog, pravog i potpuno spontanog.

</p>
<br>



    <div class="row">
      <div class="page-header"style="border-color: black;">
        <h3 >Kafa za svaki trenutak!</h3>
      </div>
      <div class="col-sm-6 col-md-4" >
        <div class="thumbnail">
          <img src="img/kafa1.jpg" alt="kafa">
          <div class="caption">
            <h3>Espresso</h3>
            <p>Najbolja kafa za početak novog dana...</p>
            <p><a href="kafe.php"class="btn btn-warning" role="button">Detaljnije</a> 
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="img/kafa3.jpg" alt="kafa">
            <div class="caption">
              <h3>Domaća kafa</h3>
              <p>Najbolja kafa za čašicu toplog razgovora...</p>
              <p><a href="kafe.php" class="btn btn-warning" role="button">Detaljnije</a> 
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src="img/kafa2.jpg" alt="kafa">
              <div class="caption">
                <h3>Kafa kao obrok?</h3>
                <p>Najbolja kafa za popodnevno druženje...</p>
                <p><a href="kafe.php" class="btn btn-warning" role="button">Detaljnije</a>
                </div>
              </div>
            </div>
          </div>
          <br>
          

          <?php include "footer.php"; ?>



          <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        </div>

      </body>
      </html>