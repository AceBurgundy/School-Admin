<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/school.css">
  <link rel="stylesheet" href="./styles/global.css">
  <script type="module" src="./scripts/school.js"></script>
</head>

<body>
  <button id="create-new-school-button" class="btn btn-primary">Create</button>

  <form id="new-school-form">

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="First name">
    </div>

    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" name="address" placeholder="Address" maxlength="255">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

</body>

</html>