<?php require_once("views/layouts/header.php"); ?>




<h1>User profile</h1>


Name: <?= $user->name; ?><br>
Username: <?= $user->username; ?><br>
Emai: <?= $user->email; ?><br>

<a href="?p=user/showUpdate">Update profile</a><br>
<a href="?p=user/delete">Delete profile</a>




<?php require_once("views/layouts/footer.php"); ?>
