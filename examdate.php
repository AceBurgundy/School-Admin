<?php
$page = 'examdate';
require 'header.php';
?>
<section>

  <button id="create-new-dateTaken-button" class="btn btn-primary">Create</button>

  <form id="new-datetaken-form">

    <div class="form-group">
      <label for="dateTaken">Date Taken</label>
      <input type="date" class="form-control" id="dateTaken" placeholder="date taken">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</section>

</body>
</html>