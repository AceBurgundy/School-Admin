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
      <select class="form-control" id="course-id" name="course-id">
        <option value="course1">Course 1</option>
        <option value="course2">Course 2</option>
        <option value="course3">Course 3</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

</section>

</body>
</html>