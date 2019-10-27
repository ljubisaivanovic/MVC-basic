<?php require_once("views/layouts/header.php"); ?>


<h1>Register user</h1>

<form action="?p=user/register" method="post">
    Name:
    <input type="text" name="name"><br>
    Username:
    <input type="text" name="username"><br>
    Email:
    <input type="email" name="email"><br>
    Password:
    <input type="password" name="password"><br>
    Password Confirm:
    <input type="password" name="password_repeat"><br>
    <button type="submit">Register</button>

</form>

<?php require_once("views/layouts/footer.php"); ?>
