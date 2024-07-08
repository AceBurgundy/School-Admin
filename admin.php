<?php
$page = 'admin';
require 'header.php';
?>
<section>
  <button id="create-new-admin-button" class="btn   btn-primary">Create</button>

  <form id="new-admin-form">

    <!-- username - ->
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" placeholder="UserName">
    </div>

    <!-- birthdate - ->
    <div class="form-group">
      <label for="birthdate">Date of birth</label>
      <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birth Date" maxlength="255">
    </div>

    <!-- email - ->
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Email" maxlength="255">
    </div>

    <!-- password - ->
    <div class="form-group">
      <label for="password">Password</label>
      <input type="text" class="form-control" id="password" name="password" placeholder="Password" maxlength="255" value="rmmc1960*">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

  <div id="table-container"></div>

</section>

</body>

</html>