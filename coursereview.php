<?php
  $page = 'coursereview';
  require 'header.php'
  ?>
<section>

  <button id="create-new-course-review-button" class="btn btn-primary">Create</button>

  <form id="new-course-review-form">

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Input name">
    </div>

    <div class="form-group">
      <label for="review">Review</label>
      <input type="text" class="form-control" id="review" name="review" placeholder="Input review" maxlength="255">
    </div>


    <div class="form-group">
      <label for="rating">Rating</label>
      <input type="text" class="form-control" id="rating" name="rating" placeholder="Input rating" maxlength="255">
    </div>


    <div class="form-group">
      <label for="course-id">Course ID</label>
      <input type="number" class="form-control" id="course-id" name="course-id" placeholder="Course ID" maxlength="255">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <div id="table-container"></div>

</section>

</body>
</html>

