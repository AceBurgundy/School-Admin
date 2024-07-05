<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/instructor.css">
    <link rel="stylesheet" href="./styles/global.css">
    <script type="module" src="./scripts/instructor.js"></script>
</head>

<body>

    <button id="create-new-instructor-button" class="btn btn-primary">Create</button>

    <form id="new-instructor-form">

        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="First Name">
        </div>

        <div class="form-group">
            <label for="middleInitial">Middle Initial</label>
            <input type="text" class="form-control" id="middleInitial" name="middle_initial"
                placeholder="Middle Initial" maxlength="255">
        </div>

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name"
                maxlength="255">
        </div>

        <div class="form-group">
            <label for="extension">Extension</label>
            <input type="text" class="form-control" id="extension" name="extension" placeholder="Extension"
                maxlength="255">
        </div>

        <div class="form-group">
            <label for="facebooklinkId">Facebook</label>
            <input type="text" class="form-control" id="facebookLinkId" name="facebook_link_id" placeholder="Facebook Link"
                maxlength="255">
        </div>

        <div class="form-group">
            <label for="twitterLinkId">Twitter</label>
            <input type="text" class="form-control" id="twitterLinkId" name="twitter_link_id" placeholder="Twitter Link" 
                maxlength="255">
        </div>

        <div class="form-group">
            <label for="linkedinLinkId">Linkedin</label>
            <input type="text" class="form-control" id="linkedinLinkId" name="linkedin_link_id"placeholder="Linkedin Link" 
                maxlength="255">
        </div>

        <div class="form-group">
            <label for="instagranLinkId">Instagram Link</label>
            <input type="text" class="form-control" id="instagramLinkId" name="instagran_link_id"
                placeholder="Instagram Link" maxlength="255">
                <small id="emailHelp" class="form-text text-muted">We'll never share your personal information with anyone else.</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</body>

</html>