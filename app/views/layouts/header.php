<!DOCTYPE Html>

<html>
<head>
    <title>MVC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="web/css/site.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">MVC</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="?p=home/index">Home</a></li>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li><a href="?p=user/profile">Profile</a></li>
                <?php endif; ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['user'])) : ?>
                    <li><a href="?p=user/showLogin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="?p=user/showRegister"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <?php else: ?>
                    <li><a href="?p=user/profile"><?= $_SESSION['user']['name']; ?></a></li>
                    <li><a href="?p=user/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
<div class="content">