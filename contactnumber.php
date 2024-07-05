<?php
$page = 'contactnumber';
require 'header.php';
?>
<section>

  <button id="create-contactnumber-button" class="btn btn-primary">Create</button>

  <form id="new-contactnumber-form">

    <div class="form-group">
      <label for="CollegeId">College Id</label>
      <input type="number" class="form-control" id="College Id" name="college_id" placeholder="College ID" required>
    </div>

    <div class="form-group">
      <label for="DepartmentId">Department ID</label>
      <input type="number" class="form-control" id="Department Id" name="department_id" placeholder="Department ID">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

  <div id="table-container"></div>

</section>

</body>
</html>