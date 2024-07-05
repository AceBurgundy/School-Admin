<?php
    $page = 'instructor';
    require 'header.php';
  ?>
    <section>
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
                <input type="text" class="form-control" id="facebookLinkId" name="facebook_link_id"
                    placeholder="Facebook Link">
            </div>

            <div class="form-group">
                <label for="twitterLinkId">Twitter</label>
                <input type="url" class="form-control" id="twitterLinkId" name="twitter_link_id"
                    placeholder="Twitter Link">
            </div>

            <div class="form-group">
                <label for="linkedinLinkId">Linkedin</label>
                <input type="url" class="form-control" id="linkedinLinkId" name="linkedin_link_id"
                    placeholder="Linkedin Link">
            </div>

            <div class="form-group">
                <label for="instagranLinkId">Instagram Link</label>
                <input type="url" class="form-control" id="instagramLinkId" name="instagran_link_id"
                    placeholder="Instagram Link">
                <small id="emailHelp" class="form-text text-muted">We'll never share your personal information with
                    anyone else.</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </section>
</body>

</html>