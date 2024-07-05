<?php
$page = 'student';
require 'header.php';
?>
<section>
  <button id="create-new-student-button" class="btn btn-primary">Create</button>

  <form id="new-student-form">

    <div class="form-group">
      <label for="firstName">First Name</label>
      <input type="text" class="form-control" id="firstName" placeholder="First Name">
    </div>

    <div class="form-group">
      <label for="middleInitial">Middle Initial</label>
      <input type="text" class="form-control" id="middleInitial" name="middle_initial" placeholder="Middle Initial" maxlength="255">
    </div>

    <div class="form-group">
      <label for="lastName">Last Name</label>
      <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" maxlength="255">
    </div>

    <div class="form-group">
      <label for="extension">Extension</label>
      <input type="text" class="form-control" id="extension" name="extension" placeholder="Extension" maxlength="255">
    </div>

    <div class="form-group">
      <label for="examDateId">Exam Date ID</label>
      <input type="number" class="form-control" id="examDateId" name="exam_date_id" placeholder="Exam Date ID" required>
    </div>

    <div class="form-group">
      <label for="schoolId">School ID</label>
      <input type="number" class="form-control" id="schoolId" name="school_id" placeholder="School ID" required>
    </div>

    <div class="form-group">
      <label for="scholarshipId">Scholarship ID</label>
      <input type="number" class="form-control" id="scholarshipId" name="scholarship_id" placeholder="Scholarship ID">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

  <div id="table-container"></div>

</section>

</body>
</html>