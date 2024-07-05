<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/admin.css">
  <link rel="stylesheet" href="./styles/global.css">
  <script type="module" src="./scripts/admin.js"></script>
</head>

<body>
  <button id="create-new-admin-button" class="btn btn-primary">Create</button>

  <form id="new-admin-form">

    <!-- username -->
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" placeholder="UserName">
    </div>
    <!-- birthdate -->
    <div class="form-group">
      <label for="birthdate">Date of birth</label>
      <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birth Date" maxlength="255">
    </div>
     <!-- email -->
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Email" maxlength="255">
    </div>
     <!-- password -->
    <div class="form-group">
      <label for="password">Password</label>
      <input type="text" class="form-control" id="password" name="password" placeholder="Password" maxlength="255" value="rmmc1960*">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

</body>

</html>