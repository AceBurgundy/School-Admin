<?php
$page = 'department';
require 'header.php';
?>
<section>
  <button id="create-new-departmentBtn" class="btn btn-primary">Create</button>

  <form id="new-department-form">

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Name">

    </div>

    <div class="form-group">
      <label for="logoFilePath">logo File Path</label>
      <input type="file" class="form-control" id="logoFilePath" name="middle_initial" placeholder="logoFilePath" maxlength="255">
    </div>

    <div class="form-group">
      <label for="bannerFilePath">banner File Path</label>
      <input type="file" class="form-control" id="bannerFilePath" name="extension" placeholder="banner File Path" maxlength="255">
    </div>

    <div class="form-group">
      <label for="mission">Mission</label>
      <input type="text" class="form-control" id="Mission" name="last_name" placeholder="Mission" maxlength="255">
    </div>

    <div class="form-group">
      <label for="Vission">Vission</label>
      <input type="text" class="form-control" id="Vission" name="exam_date_id" placeholder="Vission" required>
    </div>

    <div class="form-group">
      <label for="program Educational Objectives">program Educational Objectives</label>
      <input type="text" class="form-control" id="programEducationalObjectives" name="program Educational Objectives" placeholder="program Educational Objectives" required>
    </div>

    <div class="form-group">
      <label for="collegeId">College Id</label>
      <input type="number" class="form-control" id="College Id" name="college_Id" placeholder="college Id">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <div id="table-container"></div>

</section>

</body>
</html>