<?php
  // Variables

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

  // set the parking_requested variable to the default value
  $parking_requested = false;
  
  // set the minimum_vote variable to the default value
  $minimum_vote = 0;


  // Update variables if filters are set

  // 🅿️ Handle parking filter
  // check IF the parking is requested 
  if (isset($_GET['parking']) && $_GET['parking'] == 'on') {

    // IF so, update the parking_requested variable
    $parking_requested = true;
  }

  // ⭐ Handle vote filter
  // check IF the minimum vote is requested and a number between 1 and 5
  if (isset($_GET['minimum_vote']) && is_numeric($_GET['minimum_vote']) && $_GET['minimum_vote'] > 0 && $_GET['minimum_vote'] <= 5) {

    // IF so, update the minimum_vote variable
    // make sure the value returned is an integer
    $minimum_vote = (int)$_GET['minimum_vote'];
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Import Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>🏨 PHP Hotel</title>
</head>
<body>
  
  <header>
    <h1>🏨 PHP Hotel</h1>
  </header>
  
  <main>

    <!-- Filtering Form -->
    <div class="container-fluid">
      <form action="" method="GET" class="d-flex gap-2">

        <div class="form-control">
          <input type="checkbox" name="parking" id="parking">
          <label for="parking">Parcheggio</label>
        </div>

        <div class="form-control">
          <input type="number" name="minimum_vote" id="minimum_vote" min="1" max="5">
          <label for="minimum_vote">Voto minimo</label>
        </div>

        <button type="submit">FILTRA</button>

      </form>
    </div>


    <!-- Hotels table -->
    <div class="container-fluid">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Hotel</th>
            <th scope="col">Description</th>
            <th scope="col">Parking</th>
            <th scope="col">Vote</th>
            <th scope="col">Distance to Center</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Cycle inside the hotels array
            // for each hotel of the hotels list
            foreach ($hotels as $hotel) {

              // 🅿️ Handle parking filter
              if ($parking_requested) {
                
                // BUT the hotel doesn't have it, THEN skip current hotel
                if (!$hotel['parking']) {
                  continue;
                }
              }

              // ⭐ Handle vote filter
              // IF the hotel's vote doesn't reach the minimum_vote, THEN skip current hotel
              if ($hotel['vote'] < $minimum_vote) {
                continue;
              }             
          ?>

          <!-- Render hotel's data -->
          <tr>
            <td><?php echo $hotel['name'] ?></td>
            <td><?php echo $hotel['description'] ?></td>
            <td><?php echo $hotel['parking'] ? 'presente' : 'assente'; ?></td>
            <td><?php echo $hotel['vote'] ?></td>
            <td><?php echo $hotel['distance_to_center'] ?></td>
          </tr>

          <?php
            // End foreach
            }
          ?>        
        </tbody>



      </table>
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