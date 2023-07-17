<?php
    session_start();

    if (isset($_SESSION['user_id'])) {
       header('Location: /resources/views/home.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <form action="../../loginUser.php" method="post">
        <h1>Log In</h1>

        <p class="text-danger"><?= $_SESSION['permission_denied'] ?></p>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <small class="text-danger fw-bold"><?= $_SESSION['wrong_data'] ?></small>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me">
            <label class="form-check-label" for="remember_me">
               Remember me
            </label>
        </div>

        <button type="submit" class="btn btn-success">Send</button>
        <span><a class="link-opacity-75" href="/resources/views/register.php">Create account?</a></span>
    </form>
</body>
</html>