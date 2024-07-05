<?php $page = 'college';
require 'header.php';
?>

<section>
  <button id="create-new-college-button" class="btn btn-primary">Create</button>

  <form id="new-college-form">

    <!-- Name  -->
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Name">
    </div>

    <!-- banner -->
    <div class="form-group">
      <label for="banner_file_path">Banner File Path</label>
      <input type="file" class="form-control" id="bannerFilePath" name="bannerFilePath" placeholder="Banner file path" maxlength="255">
    </div>
    
    <!-- logo -->
    <div class="form-group">
      <label for="logo_file_path">Logo File Path</label>
      <input type="file" class="form-control" id="logoFilePath" name="logoFilePath" placeholder="Logo file path" maxlength="255">
    </div>

    <!-- organizational -->
    <div class="form-group">
      <label for="organizational_chart_file_path">Organizational Chart File Path</label>
      <input type="file" class="form-control" id="organizationalChartFilePath" name="organizationalChartFilePath" placeholder="Organizational Chart File Path" maxlength="255">
    </div>

     <!-- secretary -->
     <div class="form-group">
      <label for="secretary">Secretary</label>
      <input type="text" class="form-control" id="secretary" name="secretary" placeholder="Secretary" maxlength="255">
    </div>

     <!-- email -->
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Email" maxlength="255">
    </div>

     <!-- mission -->
    <div class="form-group">
      <label for="mission">Mission</label>
      <input type="text" class="form-control" id="mission" name="mission" placeholder="Mission" maxlength="255">
    </div> 

    <!-- vission -->
    <div class="form-group">
      <label for="vission">Vission</label>
      <input type="text" class="form-control" id="vission" name="vission" placeholder="Vision" maxlength="255">
    </div> 

    <!-- program educ. -->
    <div class="form-group">
      <label for="program_educational_objectives">Program Educational Objectives</label>
      <input type="text" class="form-control" id="programEducationalObjectives" name="programEducationalObjectives" placeholder="Program Educational Objectives" maxlength="255">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

   </form>
  </section>
</body>

</html>