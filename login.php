<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link  type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    require("db.php");
    session_start();

    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: /login_system/dashboard.php");
        } else {
            echo "<div class='form'>
                    <h3>Username/password is incorrect.</h3>
                    <br/>Click here to <a href='login.php'>Login</a>
                </div>";
        }
    } else {
    ?>

    <form action="" method="post">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit"  name="submit" value="Login" class="login-button">
        <p class="link">Don't have an account? <a href="registration.php">Register here</a></p>

    </form>

    <?php
    }
    ?>
</body>
</html>