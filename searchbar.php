<!-- ⚠️UI da sistemare!!! -->
<!-- Filtering Form -->
<div class="container form_container">
  <form action="./filtered-hotels.php" method="GET">

    <div class="d-flex gap-5 align-items-end">

      <div>
        <input type="checkbox" name="parcheggio" value="true">
        <label for="parcheggio">parcheggio</label>
      </div>
      
      <div class="d-flex">
        <label for="voto">valutazione degli utenti</label>
        <select class="form-select" name="voto" aria-label="Default select example">
          <option value="">-- voto --</option>
          <option value="3">almeno &#9733;&#9733;&#9733;</option>
          <option value="4">almeno &#9733;&#9733;&#9733;&#9733;</option>
          <option value="5">almeno &#9733;&#9733;&#9733;&#9733;&#9733;</option> <!-- ⚠️ 🤔 non passa alcun parametro alla query... -->
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