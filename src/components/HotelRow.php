<!-- 🏨 Hotel Row component (for hotels list rendering) -->
 
<?php
  // Placeholder variable
  $hotelsListToRender; 
  /* when required, will be set equal to the hotel array to render 
  (eg. $hotels or $filteredHotels) */

  // 📌 Render hotels list into rows
  foreach ($hotelsListToRender as $hotel) {
    // open row
    echo "<div class='row'>";
    // get every key-value pair
    foreach ($hotel as $key => $value) {
      // print data case by case
      // 🪪 IF $key is NAME
      if ($key == "name") {
        echo 
        "<div class='col-7 col-sm-5 col-md-3 col-lg-2' id='name'>
          <h5 class='card-title'>$value</h5>
        </div>";
      // 📜 IF $key is DESCRIPTION
      } elseif ($key == "description") {
        echo 
        "<div class='col d-none col-md-4 d-md-block col-lg-3' id='description'>
          <p class='card-text'>$value</p>
        </div>";
      // 🅿️ IF $key is PARKING
      } elseif ($key == "parking") {
        if ($value == true) {
          // 🟢 if 'true' print
          echo 
          "<div class='col d-none col-sm-3 d-sm-block col-md-2 text-uppercase' id='parking'>
            <i class='bi bi-check-circle'></i> 
            sì
          </div>";
          } else {
          // 🔴 ELSE (if 'false') print
            echo 
            "<div class='col d-none col-sm-3 d-sm-block col-md-2 text-uppercase' id='parking'>
              <i class='bi bi-x-circle'></i> 
              no
            </div>";
          }
      // ⭐ IF $key is VOTE
      } elseif ($key == "vote") {
        echo "<div class='col-4 col-md-3 col-lg-2' id='vote'>";
        // print stars
        for($s = $value; $s > 0; $s--) {
          echo "<i class='bi bi-star'></i>";
        }
        echo "</div>";
      // 🗺️ IF $key is DISTANCE_TO_CENTER
      } elseif ($key == "distance_to_center") {
        echo 
        "<div class='col d-none d-lg-block' id='distance_to_center'>
          $value km dal centro
        </div>";
      } 
    }
    // close row
    echo "</div>";
  }

?>