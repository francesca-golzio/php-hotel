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
          // Set hotels list to render
          $hotelsListToRender = $hotels;
          // Render hotels list
          require './src/components/HotelRow.php';
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