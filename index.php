<?php
// Store variables

    $hotels = [

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
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🏨 PHP Hotel</title>
</head>
<body>
  
  <header>
    <h1>🏨 PHP Hotel</h1>
  </header>
  
  <main>

    <?php

      // Cycle inside the hotels array
      // for each hotel of the hotels list
      foreach ($hotels as $hotel) {
        // get every key-value pair
        foreach ($hotel as $key => $value) {
          // print data
          echo "$key - $value<br>";          
        }
        // space hotel's data from each other
        echo "<br>";
      }
    
    ?>

  </main>

  
</body>
</html>