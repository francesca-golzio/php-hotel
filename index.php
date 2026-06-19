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

    ]; */

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Import Bootstrap CSS and Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>🏨 PHP Hotel</title>
</head>

<style>

  /* Import Google Fonts */
  @font-face {
    font-family: 'Victor Mono Variable';
    font-style: normal;
    font-display: swap;
    font-weight: 100 700;
    src: url(https://cdn.jsdelivr.net/fontsource/fonts/victor-mono:vf@latest/latin-wght-normal.woff2) format('woff2-variations');
    unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;
  }


  /* Commons */
  body {
    font-family: 'Victor Mono Variable', monospace;
    font-size: 16px;
    background-image: url('./src/img/hf-sea.svg');
    background-size: cover;
  }


  /* Header */
  header {
    background-color: #15274e;
    color: #c9eefb;
    padding: 20px 25px;
    margin-bottom: 30px;
    opacity: 0.95;
  }
  
  
  /* Main */
  
  /* Filtering Form */
  
  .form_container {
    color: #c9eefb;
    background-color: #15274e;
    opacity: 0.95;
    padding: 1rem;
    border-radius: 30px;
    margin: 0 auto;

  }


  /* Table */

  .table_container {
    max-width: 1048px;
    padding: 0.8rem;
    margin: 0 auto;
  }

  table {
    opacity: 0.95;
  }

</style>

<body>
  
  <header>
    <div class="header_container">
      <h1>🏨 PHP Hotel</h1>
      
    </div>
  </header>
  
  <main>

    <!-- Filtering Form -->
     <div class="container form_container">
      <form action="./hotels+parking.php" method="GET">
      
        <input type="checkbox" name="parking">
        <label for="parking">parking</label>

        <button type="submit">
          FILTRA
        </button>

      </form>
    </div>
    
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
          <?php
          // Cycle inside the hotels array
            // for each hotel of the hotels list
            foreach ($hotels as $hotel) {
              // open table row
              echo "<tr>";
              // get every key-value pair
              foreach ($hotel as $key => $value) {
                // print data inside cell (repeat for each $key)
                // IF $key is PARKING
                if ($key == "name") {
                  echo "<td class='fw-bold'>$value</td>";
                // IF $key is PARKING
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
                    echo "<i class='bi bi-star'> </>";
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