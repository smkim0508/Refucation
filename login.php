<?php

require_once "config.php";
require_once "session.php";

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $error .= '<p class="error">Please enter email.</p>';
    }

    if (empty($password)) {
        $error .= '<p class="error">Please enter your password.</p>';
    }

    if (empty($error)) {
        if($query = $db->prepare("SELECT * FROM users WHERE email = ?")) {
            $query->bind_param('s', $email);
            $query->execute();
            $row = $query->fetch();
            if ($row) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION["userid"] = $row['id'];
                    $_SESSION["user"] = $row;

                    header("location: welcome.php");
                    exit;
                } else {
                    $error .= '<p class="error">The password is not valid.</p>';
                }
            } else {
                $error .= '<p class = "error">No User exists with that email address.</p>';
            }
        }
        $query->close();
    }
    //Close connection
    mysqli_close($db);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <h2>Login<h2>
            <p>Please fill in your email and password.</p>
            <form action="" method="post">
                <div class="form-group">
                    <label> Email Address </label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                </div>
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>