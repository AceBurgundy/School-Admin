<?php
$page = 'goal_and_objective';
require 'header.php';
?>
<section>

  <button id="create-new-goal-objective-button" class="btn btn-primary">Create</button>

  <form id="new-goal-object-form">
    <div class="form-group">
      <label for="college_id">College ID</label>
      <input type="text" class="form-control" id="college_id" name="college_id" placeholder="college id" required>
    </div>

    <div class="form-group">
      <label for="department_id">Department ID</label>
      <input type="text" class="form-control" id="department_id" name="department_id" placeholder="department id" required>
    </div>

    <div class="form-group">
      <label for="text">Text</label>
      <textarea type="text" class="form-control" id="text" placeholder="text" name="text" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
  </form>

</section>

</body>
</html>