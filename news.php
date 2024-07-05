<?php
$page = 'news';
require 'header.php';
?>
<section>

  <button id="create-new-news-button" class="btn btn-primary">Create</button>

  <form id="new-news-form">

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" placeholder="Title" maxlength="255">
    </div>

    <div class="form-group">
      <label for="imagePath">Image </label>
      <input type="file" class="form-control" id="imagePath" name="image_path">
    </div>

    <div class="form-group">
      <label for="venue">Venue</label>
      <input type="text" class="form-control" id="venue" name="venue" placeholder="Enter the address or name of the venue" maxlength="255">
    </div>

    <div class="form-group">
      <label for="dateTime">Date</label>
      <input type="datetime-local" class="form-control" id="dateTime" name="date_time" placeholder="Date">
    </div>

    <div class="form-group">
      <label for="startTime">Start Time</label>
      <input type="time" class="form-control" id="startTime" name="start_time">
    </div>

    <div class="form-group">
      <label for="endTime">End Time</label>
      <input type="time" class="form-control" id="endTime" name="end_time">
    </div>

    <div class="form-group">
      <label for="eventLink">Link</label>
      <input type="url" class="form-control" id="eventLink" name="event_link" placeholder="Paste here...">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

  <div id="table-container"></div>

</section>

</body>
</html>