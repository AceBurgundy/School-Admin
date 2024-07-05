<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/news.css">
    <link rel="stylesheet" href="./styles/global.css">
    <script type="module" src="./scripts/news.js"></script>
</head>

<body>

    <section>
        <button id="create-new-news-button" class="btn btn-primary">Create</button>

        <form id="new-news-form">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" maxlength="255">
            </div>

            <div class="form-group">
                <label for="imagePath">Image </label>
                <input type="file" class="form-control" id="imagePath" name="image_path">
            </div>

            <div class="form-group">
                <label for="venue">Venue</label>
                <input type="text" class="form-control" id="venue" name="venue" placeholder="Venue" maxlength="255">
            </div>

            <div class="form-group">
                <label for="dateTime">Date</label>
                <input type="datetime-local" class="form-control" id="dateTime" name="date_time" placeholder="Date">
            </div>

            <div class="form-group">
                <label for="startTime">Start Time</label>
                <input type="time" class="form-control" id="startTime" name="start_time">
            </div>

            <div class="form-group">
                <label for="endTime">End Time</label>
                <input type="time" class="form-control" id="endTime" name="end_time">
            </div>

            <div class="form-group">
                <label for="eventLink">Link</label>
                <input type="url" class="form-control" id="eventLink" name="event_link" placeholder="Paste here...">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </section>
</body>

</html>