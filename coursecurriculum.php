<?php
$page = 'coursecurriculum';
require 'header.php'
?>
<section>

  <button id="create-new-course-curriculum-button" class="btn btn-primary">Create</button>

  <form id="new-course-curriculum-form">

    <div class="form-group">
      <label for="text">Text</label>
      <input type="text" class="form-control" id="text" placeholder="Input text">
    </div>

    <div class="form-group">
      <label for="course-id">Course ID</label>
      <input type="number" class="form-control" id="course-id" name="course-id" placeholder="Course ID" maxlength="255">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

</section>

</body>
</html>