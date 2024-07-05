<?php
$page = 'course';

require 'header.php';
?>

<section>
  <button id="create-new-course-button" class="btn btn-primary">Create</button>

  <form id="new-course-form">

    <div class="form-group">
      <label for="Title">Title</label>
      <input type="number" class="form-control" id="title" placeholder="Title">
    </div>

    <div class="form-group">
      <label for="Image">Image</label>
      <input type="text" class="form-control" id="image" name="image" placeholder="Image" maxlength="255">
    </div>

    <div class="form-group">
      <label for="Rating">Rating</label>
      <input type="number" class="form-control" id="rating" name="rating" placeholder="Rating" maxlength="255">
    </div>

    <div class="form-group">
      <label for="Language_used">Language used</label>
      <input type="text" class="form-control" id="language used" name="Language Used" placeholder="Language used" required>
    </div>

    <div class="form-group">
      <label for="Number_of_Lessons">Number of Lessons</label>
      <input type="number" class="form-control" id="number_of_Lessons" name="number_of_Lessons" placeholder="Number of Lessons" maxlength="255">
    </div>

    <div class="form-group">
      <label for="Number_of_Quizes">Number of Quiz</Label>
      <input type="number" class="form-control" id="number_of_Quizes" name="number_of_Quizes" placeholder="Number of Quizes" maxlength="255">
    </div>

    <div class="form-group">
      <label for="Course_Level">Course Level</label>
      <input type="text" class="form-control" id="course Level" name="course Level" placeholder="Course Level" required>
    </div>

    <div class="form-group">
      <label for="Duration">Duration</label>
      <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" required>
    </div>

    <div class="form-group">
      <label for="Description">Description</label>
      <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
    </div>

    <div class="form-group">
      <label for="What_will_you_Learn">What will you learn</label>
      <input type="text" class="form-control" id="what_will_you_Learn" name="what_will_you_Learn" placeholder="What will you Learn" required>
    </div>

    <div class="form-group">
      <label for="InstructorId">Instructor ID</label>
      <input type="number" class="form-control" id="Instructor Id" name="instructor_id" placeholder="Instructor ID" required>
    </div>

    <div class="form-group">
      <label for="DepartmentId">Department ID</label>
      <input type="number" class="form-control" id="Department Id" name="department_id" placeholder="Department ID">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

</body>

</html>