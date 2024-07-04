<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/root.css">
</head>
<body>
    
    <?php include("views/session.php") ?>
    
    <p>Welcome, <?php echo $data["username"]; ?></p>

    <style>
        p {
            margin: 2rem;
            font-size: 2rem;
        }
    </style>
</body>
</html>