<?php require_once("views/layouts/header.php"); ?>

<div class="row ">
    <div class="col-md-4"></div>
    <div class="col-md-4 login">
        <form action="?p=user/login" method="post">
            <h2 class="text-center">Sign in</h2>
            <div class="form-group">
                <div class="input-group text-center">
                    <span class="input-group-addon">Email:</span>
                    <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Password:</span>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>

        </form>
        <p class="text-center text-muted small">Don't have an account? <a href="?p=user/showRegister">Register</a>

    </div>
    <div class="col-md-4"></div>
</div>


<?php require_once("views/layouts/footer.php"); ?>
