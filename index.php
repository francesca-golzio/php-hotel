<?php

// Store variables
require './hotels.php';


// SPOSTATO
/*     $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'description' => 'Hotel Milano Descrizione',
            'name' => 'Hotel Milano',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ]; */

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Import custom CSS -->
  <link rel="stylesheet" href="./src/css/style.css">
  <!-- Import Bootstrap CSS and Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>🏨 PHP Hotel</title>
</head>

<body>
  
  <!-- Header -->
  <?php require './src/components/header.php'; ?>

  
  <main>

    <!-- Filtering Form -->
    <?php require './src/components/searchbar.php'; ?>
    
    <!-- Hotels table -->
      <div class="container hotels_table">        
        <!-- initial row -->
        <div class='row text-uppercase fw-bold fst-italic'>
          <div class='col-7 col-sm-5 col-md-3 col-lg-2'>Hotel</div>
          <div class='col d-none col-md-4 d-md-block col-lg-3'>Descrizione</div>
          <div class='col d-none col-sm-3 d-sm-block col-md-2'>Parcheggio</div>
          <div class='col-4 col-md-3 col-lg-2'>Valutazione</div>
          <div class='col d-none d-lg-block'>Distanza dal Centro</div>
        </div>
        <?php
          // Render hotels list inside rows
          foreach ($hotels as $hotel) {
            // open row
            echo "<div class='row'>";
            // get every key-value pair
            foreach ($hotel as $key => $value) {
              // print data
              // IF $key is NAME
              if ($key == "name") {
                echo "<div class='col-7 col-sm-5 col-md-3 col-lg-2' id='name'><h5 class='card-title'>$value</h5></div>";
                // IF $key is DESCRIPTION
              } elseif ($key == "description") {
                echo "<div class='col d-none col-md-4 d-md-block col-lg-3' id='description'><p class='card-text'>$value</p></div>";
              // IF $key is PARKING
              } elseif ($key == "parking") {
                if ($value == true) {
                  // if 'true' print
                  echo "<div class='col d-none col-sm-3 d-sm-block col-md-2 text-uppercase' id='parking'><i class='bi bi-check-circle'></i> sì</div>";
                  } else {
                    // ELSE (if 'false') print
                    echo "<div class='col d-none col-sm-3 d-sm-block col-md-2 text-uppercase' id='parking'><i class='bi bi-x-circle'></i> no</div>";
                  }
              // IF $key is VOTE
              } elseif ($key == "vote") {
                echo "<div class='col-4 col-md-3 col-lg-2' id='vote'>";
                for($s = $value; $s > 0; $s--) {
                  echo "<i class='bi bi-star'></i>";
                }
                echo "</div>";
              // IF $key is DISTANCE_TO_CENTER
              } elseif ($key == "distance_to_center") {
                echo "<div class='col d-none d-lg-block' id='distance_to_center'>$value km dal centro</div>";
              } 
            }
            // close row
            echo "</div>";
          }
        ?>
      </div>
    
    <!-- Import Bootstrap -->
    <script 
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
    crossorigin="anonymous"></script>
    <!-- __ ⚠️ DA TOGLIERE SE NON SERVE __ 
     <script 
     src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" 
     integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" 
     crossorigin="anonymous"></script>
      -->

  </main>

  
</body>
</html>