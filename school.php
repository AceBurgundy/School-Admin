  <?php
    $page = 'school';
    require 'header.php';
  ?>
  <section>
    <button id="create-new-school-button" class="btn btn-primary">Create</button>

    <form id="new-school-form">

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="First name">
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" maxlength="255">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </section>
</body>

</html>