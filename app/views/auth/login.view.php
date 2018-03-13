<?php require('app/views/partials/header.php'); ?>

<div class="container">
    <form action="users/login" method="POST">
        <div class="form-group">
            <label for="login">Name:</label>
            <input type="login" class="form-control" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>


<?php require('app/views/partials/footer.php'); ?>