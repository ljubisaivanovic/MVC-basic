<?php require_once("views/layouts/header.php"); ?>



<form action="?p=user/update" method="post">


    Name:
    <input type="text" name="name" value="<?= $user->name; ?>"><br>
    Username:
    <input type="text" name="username" value="<?= $user->username; ?>"><br>
    Email:
    <input type="email" name="email" value="<?= $user->email; ?>"><br>
    Password:
    <input type="password" name="password"><br>
    Password Confirm:
    <input type="password" name="password_repeat"><br>
    <button type="submit">Update</button>



</form>

<?php require_once("views/layouts/footer.php"); ?>
