<?php

// Get variables
$parcheggio = isset($_GET['parcheggio']);
$voto = isset($_GET['voto']) ? (int) $_GET['voto'] : 0;

?>

<!-- ⚠️UI da sistemare!!! -->
<!-- Filtering Form -->
<div class="container form_container">
  <form action="./filtered-hotels.php" method="GET">

    <div class="d-flex gap-5 align-items-end">

      <!-- 🅿️ Has parking -->
      <div>
        <input 
          type="checkbox" 
          name="parcheggio" 
          id="parcheggio" 
          value="true"
          <?php if ($parcheggio) echo "checked"; ?> >
        <label for="parcheggio">parcheggio</label>
      </div>
    
      <!-- ⭐ Has at least X stars -->
      <div class="d-flex">
        <label for="voto">valutazione degli utenti</label>
        <select class="form-select" name="voto" id="voto">
          <option 
            value="0"
            <?php if ($voto === 0) echo "selected" ?> >
            -- nessun filtro --
          </option>
          <option 
            value="3"
            <?php if ($voto === 3) echo "selected" ?> >
            almeno 3 stelle &#9733;&#9733;&#9733;
          </option>
          <option 
            value="4"
            <?php if ($voto === 4) echo "selected" ?> >
            almeno 4 stelle &#9733;&#9733;&#9733;&#9733;
          </option>
          <option 
            value="5"
            <?php if ($voto === 5) echo "selected" ?> >
            almeno 5 stelle &#9733;&#9733;&#9733;&#9733;&#9733;
          </option>
        </select>
      </div>
      
      <div>
        <button type="submit">
          FILTRA
        </button>
      </div>

    </div>

  </form>
</div>