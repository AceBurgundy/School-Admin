<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
        <!-- CSS -->
    <link rel="stylesheet" href="./styles/scholarship.css">
    <link rel="stylesheet" href="./styles/global.css">

    <!-- MODULE -->
    <script type="module" src="./scripts/scholarship.js"></script>
</head>

<body>
    <button id="create-new-scholarship-button" class="btn btn-primary">Create</button>

    <form id="new-scholarship-form">

        <div class="form-group">
            <label for="scholarship">Scholarship</label>
            <input type="text" class="form-control" id="scholarship" placeholder="Scholarship">
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>