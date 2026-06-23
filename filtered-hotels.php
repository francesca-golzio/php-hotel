<?php

// Get variables
require './hotels.php';
$filteredHotels = [];
$isHotelEligible = true; /* will be set to false if the hotel is not eligible */
$parcheggio = isset($_GET['parcheggio']);
$voto = isset($_GET['voto']) ? (int) $_GET['voto'] : 0;

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
  <!-- ⚠️ MANY BLOCKS 👇 COPY-PASTED from `index.php`
   should be componentized (header, form, table-like esxternal structure, rendering rules...) -->

  <!-- Header -->
  <?php require './src/components/header.php'; ?>
  
  <main>

    <!-- Filtering Form -->
    <?php
      require './src/components/searchbar.php';
    ?>
    
    <!-- Hotels table -->
    <div class="container table_container">
      <div class="table-responsive ">
        <table class="table table-info table-striped">

          <thead>
            <tr class="text-uppercase">
              <th scope="col">Hotel</th>
              <th scope="col">Descrizione</th>
              <th scope="col">Parcheggio</th>
              <th scope="col">Valutazione</th>
              <th scope="col">Distanza dal Centro</th>
            </tr>
          </thead>

          <tbody>

    <!-- Hotels table -->
  
    <?php
    
      // Get filtered hotels
      foreach ($hotels as $hotel) {     

        // Reset variable
        $isHotelEligible = true;
        
        // 🅿️ Handle parking filter
        if ($parcheggio && $hotel['parking'] == false) $isHotelEligible = false;

        // ⭐ Handle vote filter
        if ($voto > 0 && $hotel['vote'] < $voto) $isHotelEligible = false;
       
        // Save the hotel IF it matches the selected filters
        if ($isHotelEligible) $filteredHotels[] = $hotel;
        }
        
      // IF no results
      if (empty($filteredHotels)) echo 
      "<tr>
        <td colspan='5'>
          <h5 class='text-center'>No results</h5>
        </td>
      </tr>";
      // ELSE apply rendering rules
      else {
        // Cycle inside the '$filteredHotels' array
        // for each hotel of the filtered hotels list
        foreach ($filteredHotels as $hotel) {
          // open table row
          echo "<tr>";
          // get every key-value pair
          foreach ($hotel as $key => $value) {
            // print data inside cell (repeat for each $key)
            // IF $key is NAME
            if ($key == "name") {
              echo "<td class='fw-bold'>$value</td>";
            // IF $key is DESCRIPTION
            } elseif ($key == "description") {
              echo "<td class='fst-italic text-truncate'>$value</td>";
            // IF $key is PARKING
            } elseif ($key == "parking") {
              if ($value == true) {
                // if 'true' print
                echo "<td><i class='bi bi-check2-circle'></i> sì</td>";
                } else {
                  // ELSE (if 'false') print
                  echo "<td><i class='bi bi-x-circle'></i> no</td>";
                }
            // IF $key is VOTE
            } elseif ($key == "vote") {
              echo "<td>";
              for($s = $value; $s > 0; $s--) {
                echo "<i class='bi bi-star'> </i>";
              }
              echo "</td>";
            // IF $key is DISTANCE_TO_CENTER
            } elseif ($key == "distance_to_center") {
              echo "<td>$value km</td>";
            // every OTHER case
            } else {
              // ELSE
              echo "<td>$value</td>";
            }
          }
          // close table row
          echo "</tr>";
        }
      }

    ?>
          </tbody>

        </table>
      </div>
    </div>

  </main>

</body>
</html>