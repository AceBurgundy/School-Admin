<?php
$page = 'newsauthor';
require 'header.php';
?>
<section>

  <button id="create-new-newsauthor-button" class="btn btn-primary">Create</button>

  <form id="new-newsauthor-form">

    <div class="form-group">
      <label for="newsauthor">News Author</label>
      <input type="text" class="form-control" id="newsauthor" placeholder="News Author">

      <br>
      <label for="profileImage">Profile Image</label>
      <input type="file" class="form-control-file" id="profileImage" name="profileImage">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <div id="table-container"></div>

</section>

</body>
</html>