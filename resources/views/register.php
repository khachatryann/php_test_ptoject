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
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <form method="post" action="../../createUser.php">
        <h1>Create Account</h1>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control <?= $_SESSION['username_err'] ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= $_SESSION['correct_username'] ?>"
            <div class="invalid-feedback">
                <small class="text-danger fw-bold"><?= $_SESSION['username_err'] ?></small>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control <?= $_SESSION['email_err'] || $_SESSION['email_unique_err'] ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= $_SESSION['correct_email'] ?>">
            <div class="invalid-feedback">
                <small class="text-danger fw-bold"><?= $_SESSION['email_err'] . $_SESSION['email_unique_err'] ?></small>
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control <?= $_SESSION['pswd_err'] || $_SESSION['pswd_length_err'] ? 'is-invalid' : '' ?>" id="password" name="password">
            <div class="invalid-feedback">
                <small class="text-danger fw-bold"><?= $_SESSION['pswd_err'] . $_SESSION['pswd_length_err'] ?></small>
            </div>
        </div>

        <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirm Password</label>
            <input type="password" class="form-control <?= $_SESSION['pswd_confirm_err'] ? 'is-invalid' : '' ?>" id="password_confirm" name="password_confirm">
            <div class="invalid-feedback">
                <small class="text-danger fw-bold"><?= $_SESSION['pswd_confirm_err'] ?></small>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="create-user">Submit</button>
        <span><a class="link-opacity-75" href="/resources/views/login.php">Already have an account?</a></span>
    </form>
</body>
</html>