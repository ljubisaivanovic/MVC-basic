<?php require_once("views/layouts/header.php"); ?>
<?php
if (!empty($_SESSION['message'])) {
    echo '<div class="alert alert-danger">
                    <strong>Warning!</strong>' . $_SESSION['message'] . '
                  </div>';
    unset($_SESSION['message']);
}
?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 register">
        <form action="?p=user/register" method="post">
            <h2 class="text-center">Register</h2>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Name:</span>
                    <input type="text" name="name">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Username:</span>
                    <input type="text" name="username">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Email:</span>
                    <input type="email" name="email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Password:</span>
                    <input type="password" name="password">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Password Confirm:</span>
                    <input type="password" name="password_repeat">
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

        </form>
        <p class="text-center text-muted small">You have account? <a href="?p=user/showLogin">Log In</a>

    </div>
    <div class="col-md-4"></div>
</div>

<?php require_once("views/layouts/footer.php"); ?>
