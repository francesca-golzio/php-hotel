<?php

  // Collect variables
  require './hotels.php';

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
    
    <!-- #region🫅 Header -->
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

            // Set hotels list to render
            $hotelsListToRender = $hotels;

            // 🖼️ Render hotels list
            require './src/components/HotelRow.php';

          ?>
        </div>
      
      <!-- Import Bootstrap Popper JS -->
      <script 
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
        crossorigin="anonymous">
      </script>
     
    </main>

    <!-- #region 👣 Footer -->
    <?php require './src/components/AppFooter.php'; ?>
    <!-- #endregion Footer -->
    
  </body>

</html>