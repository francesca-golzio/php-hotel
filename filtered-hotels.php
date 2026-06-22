<?php

// Store variables
require './hotels.php';
$parcheggio = isset($_GET['parcheggio']);
$hotelsWithParking = [];

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

    <header>
    <div class="header_container">
      <h1>🏨 PHP Hotel</h1>      
    </div>
  </header>
  
  <main>

    <!-- Filtering Form -->
    <?php
      require './searchbar.php';
    ?>
    
    <!-- Hotels table -->
    <div class="container table_container">
      <div class="table-responsive ">
        <table class="table table-info table-striped">

          <thead>
            <tr class="text-uppercase">
              <th scope="col">Hotel</th>
              <th scope="col">Description</th>
              <th scope="col">Parking</th>
              <th scope="col">Vote</th>
              <th scope="col">Distance to Center</th>
            </tr>
          </thead>

          <tbody>

    <!-- Hotels table -->
  
    <?php
    
    // Cycle inside the hotels array 
    // for each hotel of the hotels list
    foreach ($hotels as $hotel) {      
        // 🅿️ IF parking is checked
        if ($parcheggio) {
          // update the `$hotelsWithParking` array
          $hotel['parking'] == true ? $hotelsWithParking[] = $hotel : null;            
        }  
    }
          
    // Apply rendering rules
    // Cycle inside the '$hotelsWithParking' array
      // for each hotel of the hotels list
      foreach ($hotelsWithParking as $hotel) {
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
              echo "<td><i class='bi bi-check2-circle'></i> yes</td>";
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

    ?>
          </tbody>

        </table>
      </div>
    </div>

  </main>

</body>
</html>