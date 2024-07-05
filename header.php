<!-- header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RMMC Admin</title>

    <link rel="stylesheet" href="./styles/sidebars.css">
    <link rel="stylesheet" href="./styles/root.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="./assets/dist/css/bootstrap.min.css">

    <!-- rmmc title icon -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="assets/img/favicons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">


    <script src="./assets/js/color-modes.js" defer></script>
    <script src="./scripts/sidebars.js"></script>
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php if ($page == 'admin') : ?>
        <link rel="stylesheet" href="./styles/admin.css">
        <script type="module" src="./scripts/admin.js"></script>
        <title>Admin</title>
    <?php elseif ($page == 'college') : ?>
        <link rel="stylesheet" href="./styles/college.css">
        <script type="module" src="./scripts/college.js"></script>
        <title>College</title>
    <?php elseif ($page == 'contactnumber') : ?>
        <link rel="stylesheet" href="./styles/contactnumber.css">
        <script type="module" src="./scripts/contactnumber.js"></script>
        <title>Contact Number</title>
    <?php elseif ($page == 'course') : ?>
        <link rel="stylesheet" href="./styles/course.css">
        <script type="module" src="./scripts/course.js"></script>
        <title>Course</title>
    <?php elseif ($page == 'coursecurriculum') : ?>
        <link rel="stylesheet" href="./styles/coursecurriculum.css">
        <script type="module" src="./scripts/coursecurriculum.js"></script>
        <title>Course Curriculum</title>
    <?php elseif ($page == 'coursereview') : ?>
        <link rel="stylesheet" href="./styles/coursereview.css">
        <script type="module" src="./scripts/coursereview.js"></script>
        <title>Course Review</title>
    <?php elseif ($page == 'department') : ?>
        <link rel="stylesheet" href="./styles/department.css">
        <script type="module" src="./scripts/department.js"></script>
        <title>Department</title>
    <?php elseif ($page == 'examdate') : ?>
        <link rel="stylesheet" href="./styles/examdate.css">
        <script type="module" src="./scripts/examdate.js"></script>
        <title>Exam Date</title>
    <?php elseif ($page == 'goal_and_objective') : ?>
        <link rel="stylesheet" href="./styles/goal_and_objective.css">
        <script type="module" src="./scripts/goal_and_objective.js"></script>
        <title>Goal and Objective</title>
    <?php elseif ($page == 'instructor') : ?>
        <link rel="stylesheet" href="./styles/instructor.css">
        <script type="module" src="./scripts/instructor.js"></script>
        <title>Instructor</title>
    <?php elseif ($page == 'news') : ?>
        <link rel="stylesheet" href="./styles/news.css">
        <script type="module" src="./scripts/news.js"></script>
        <title>News</title>
    <?php elseif ($page == 'newsauthor') : ?>
        <link rel="stylesheet" href="./styles/newsauthor.css">
        <script type="module" src="./scripts/newsauthor.js"></script>
        <title>News Author</title>
    <?php elseif ($page == 'scholarship') : ?>
        <link rel="stylesheet" href="./styles/scholarship.css">
        <script type="module" src="./scripts/scholarship.js"></script>
        <title>Scholarship</title>
    <?php elseif ($page == 'school') : ?>
        <link rel="stylesheet" href="./styles/school.css">
        <script type="module" src="./scripts/school.js"></script>
        <title>School</title>
    <?php elseif ($page == 'student') : ?>
        <link rel="stylesheet" href="./styles/student.css">
        <script type="module" src="./scripts/student.js"></script>
        <title>Student</title>
    <?php endif; ?>
</head>

<body class="<?php echo $page; ?>">
    <?php include 'sidebar.php'; ?>