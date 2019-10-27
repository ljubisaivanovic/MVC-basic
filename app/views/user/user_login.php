<?php require_once("views/layouts/header.php"); ?>




<form action="?p=user/login" method="post">

    <input type="email" name="email" >
    <input type="password" name="password">
    <button type="submit">Login</button>

</form>
You dont have account?
<a href="?p=user/showRegister">Register</a>


<?php require_once("views/layouts/footer.php"); ?>
