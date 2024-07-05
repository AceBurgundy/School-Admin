<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/department.css">
  <link rel="stylesheet" href="./styles/global.css">
  <script type="module" src="./scripts/department.js"></script>
</head>

<body>
  <button id="create-new-departmentBtn" class="btn btn-primary">Create</button>

  <form id="new-department-form">

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Name">
    
    </div>

    <div class="form-group">
      <label for="logoFilePath">logo File Path</label>
      <input type="file" class="form-control" id="logoFilePath" name="middle_initial" placeholder="logoFilePath" maxlength="255">
    </div>

    <div class="form-group">
      <label for="bannerFilePath">banner File Path</label>
      <input type="file" class="form-control" id="bannerFilePath" name="extension" placeholder="banner File Path" maxlength="255">
    </div>

    <div class="form-group">
      <label for="mission">Mission</label>
      <input type="text" class="form-control" id="Mission" name="last_name" placeholder="Mission" maxlength="255">
    </div>

   

    <div class="form-group">
      <label for="Vission">Vission</label>
      <input type="text" class="form-control" id="Vission" name="exam_date_id" placeholder="Vission" required>
    </div>

    <div class="form-group">
      <label for="program Educational Objectives">program Educational Objectives</label>
      <input type="text" class="form-control" id="programEducationalObjectives" name="program Educational Objectives" placeholder="program Educational Objectives" required>
    </div>

    <div class="form-group">
      <label for="collegeId">College Id</label>
      <input type="number" class="form-control" id="College Id" name="college_Id" placeholder="college Id">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

</body>

</html>