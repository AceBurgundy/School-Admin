<?php
    $page = 'newsauthor';
    require 'header.php';
  ?>
    <section>
    <button id="create-new-newsauthor-button" class="btn btn-primary">Create</button>

    <form id="new-newsauthor-form">

        <div class="form-group">
            <label for="newsauthor">newsauthor</label>
            <input type="text" class="form-control" id="newsauthor" placeholder="News Author">
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </section>
</body>

</html>