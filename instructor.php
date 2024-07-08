<?php
$page = 'instructor';
require 'header.php';
?>
<section>

  <button id="create-new-instructor-button" class="btn btn-primary">Create</button>

  <form id="new-instructor-form">

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
      <label for="facebookLink">Facebook</label>
      <input type="text" class="form-control" id="facebookLink" name="facebook_link" placeholder="Facebook Link">
    </div>

    <div class="form-group">
      <label for="twitterLink">Twitter</label>
      <input type="url" class="form-control" id="twitterLink" name="twitter_link" placeholder="Twitter Link">
    </div>

    <div class="form-group">
      <label for="linkedinLink">Linkedin</label>
      <input type="url" class="form-control" id="linkedinLink" name="linkedin_link" placeholder="Linkedin Link">
    </div>

    <div class="form-group">
      <label for="instagranLink">Instagram Link</label>
      <input type="url" class="form-control" id="instagramLink" name="instagram_link" placeholder="Instagram Link">
      <small id="emailHelp" class="form-text text-muted">We'll never share your personal information with
        anyone else.</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <div id="table-container"></div>

</section>

</body>
</html>