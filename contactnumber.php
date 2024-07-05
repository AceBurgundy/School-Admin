<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/contactnumber.css">
  <link rel="stylesheet" href="./styles/global.css">
  <script type="module" src="./scripts/contactnumber.js"></script>
</head>

<body>
  <button id="create-contactnumber-button" class="btn btn-primary">Create</button>

  <form id="new-contactnumber-form">



    <div class="form-group">
      <label for="CollegeId">CollegeId</label>
      <input type="number" class="form-control" id="College Id" name="college_id" placeholder="College ID" required>
    </div>

    <div class="form-group">
      <label for="DepartmentId">DepartmentID</label>
      <input type="number" class="form-control" id="Department Id" name="department_id" placeholder="DepartmentID">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

</body>

</html>