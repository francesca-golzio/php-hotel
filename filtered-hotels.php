<?php

// Collect variables
require './hotels.php';
$filteredHotels = [];
$isHotelEligible = true; /* will be set to false if the hotel is not eligible */
$parcheggio = isset($_GET['parcheggio']);
$voto = isset($_GET['voto']) ? (int) $_GET['voto'] : 0;

?>

<!DOCTYPE html>
<html lang="it">

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

    <!-- #region 🫅 Header -->
      <?php require './src/components/AppHeader.php'; ?>
    <!-- #endregion Header -->
   
    <main>

      <!-- 🪮 Filtering Form -->
      <?php require './src/components/Searchbar.php'; ?>
      
      <!-- #region 🏨 Hotels table -->
      <div class="container hotels_table">

        <!-- initial row -->
        <div class='row text-uppercase fw-bold fst-italic'>
          <div class='col-7 col-sm-5 col-md-3 col-lg-2'>Hotel</div>
          <div class='col d-none col-md-4 d-md-block col-lg-3'>Descrizione</div>
          <div class='col d-none col-sm-3 d-sm-block col-md-2'>Parcheggio</div>
          <div class='col-4 col-md-3 col-lg-2'>Valutazione</div>
          <div class='col d-none d-lg-block'>Distanza dal Centro</div>
        </div>

        <!-- hotels rows -->
        <?php    

          // Get filtered hotels list
          foreach ($hotels as $hotel) {     

            // Reset variable
            $isHotelEligible = true;
            
            // 🅿️ Handle parking filter
            if ($parcheggio && $hotel['parking'] == false) $isHotelEligible = false;

            // ⭐ Handle vote filter
            if ($voto > 0 && $hotel['vote'] < $voto) $isHotelEligible = false;
          
            // 💾 Save the hotel IF it matches the selected filters
            if ($isHotelEligible) $filteredHotels[] = $hotel;
          }
            
          // 🔴 IF no results
          if (empty($filteredHotels)) echo 
            "<div class='row'><h5 class='col-12 text-center'>No results</h5></div>";

          // 🟢 ELSE apply rendering rules
          else {
            
            // Set hotels list to render
            $hotelsListToRender = $filteredHotels;
            
            // 🖼️ Render hotels list
            require './src/components/HotelRow.php';
          }

        ?>

      </div>
      <!-- #endregion 🏨 Hotels table -->

      <!-- #region 👣 Footer -->
      <?php require './src/components/AppFooter.php'; ?>
      <!-- #endregion Footer -->
    
    </main>

  </body>

</html>