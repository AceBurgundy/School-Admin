<?php
$page = 'scholarship';
require 'header.php';
?>
<section>

  <button id="create-new-scholarship-button" class="btn btn-primary">Create</button>

  <form id="new-scholarship-form">

    <div class="form-group">
      <label for="scholarship">Scholarship</label>
      <input type="text" class="form-control" id="scholarship" placeholder="Scholarship">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <div id="table-container"></div>

</section>

</body>
</html>