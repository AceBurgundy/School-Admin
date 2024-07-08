<?php

require_once './Route.php';

$news = new Route();

$news -> get('news', function() {
    try {
        $sql = "SELECT * FROM news";
        $statement = Route::$conn -> prepare($sql);

        if (!$statement) {
            throw new Exception("Database prepare failed: " . Route::$conn -> error);
        }

        $statement -> execute();
        $result = $statement -> get_result();

        $courseData = array();

        while ($row = $result -> fetch_assoc()) {
            $courseData[] = array(
                "id" => $row["id"],
                "title" => $row["title"],
                "imagePath" => $row["imagePath"],
                "venue" => $row["venue"],
                "dateTime" => $row["dateTime"],
                "startTime" => $row["startTime"],
                "endTime" => $row["endTime"],
                "link" => $row["link"],
            );
        }

        header('Content-Type: application/json');
        Route::echoJSON($courseData);

        $statement -> close();

    } catch (Exception $error) {
        http_response_code(500);
        header('Content-Type: application/json');
        Route::echoJSON(array("error" => $error -> getMessage()));
    }
});

$news -> post('create', function($data) {
    $title= $_POST['title'];
    $image_path= $_POST['image_path'];
    $venue= $_POST['venue'];
    $date_time= $_POST['date_time'];
    $start_time= $_POST['start_time'];
    $end_time= $_POST['end_time'];
    $link= $_POST['link'];

    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "INSERT INTO news (title, imagePath, venue, dateTime, startTime, endTime, link)
        VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    $statement -> bind_param("sssssss", $title, $image_path, $venue, $date_time, $start_time, $end_time, $link);

    if ($statement -> execute()) {
        Route::respondSuccess('News record has been created successfully');
    } else {
        Route::respondError('Failed to create news record');
    }

    $statement -> close();
});

$news -> post('update', function($data) {
    $title= $_POST['title'];
    $image_path= $_POST['image_path'];
    $venue= $_POST['venue'];
    $date_time= $_POST['date_time'];
    $start_time= $_POST['start_time'];
    $end_time= $_POST['end_time'];
    $link= $_POST['link'];

    $statement = Route::$conn -> prepare(
        "UPDATE news
        SET title= ?,imagePath= ?, venue= ?, dateTime= ?, startTime= ?, endTime= ?, link= ?
        WHERE id = ?;"
    );

    $statement -> bind_param("sssssss", $title, $image_path, $venue, $date_time, $start_time, $end_time, $link);

    if ($statement -> execute()) {
        Route::respondSuccess('News record has been updated successfully');
    } else {
        Route::respondError('Failed to update news record');
    }

    $statement -> close();
});

$news -> post('delete', function($data) {
    $news_id = $_POST['id'];

    $errorMessages = array();

    // Validation checks
    if (empty($news_id)) {
        $errorMessages[] = 'News ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare(
        "DELETE FROM news
         WHERE id = ?"
    );

    $statement -> bind_param("i", $news_id);

    if ($statement -> execute()) {
        Route::respondSuccess('News record has been deleted successfully');
    } else {
        Route::respondError('Failed to delete news record');
    }

    $statement -> close();
});

Route::handleRequest();