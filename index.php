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
              <th scope="col">Descrizione</th>
              <th scope="col">Parcheggio</th>
              <th scope="col">Valutazione</th>
              <th scope="col">Distanza dal Centro</th>
            </tr>
          </thead>

          <tbody>
          <?php
          // Cycle inside the hotels array
            // for each hotel of the hotels list
            foreach ($hotels as $hotel) {
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


          ?>        
          </tbody>

        </table>
      </div>
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