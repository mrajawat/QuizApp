<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../js/bootstrap.min.js">

</head>
<style>
    .container {
        border: none;
        width: fit-content;
    }

    .logo {
        border-radius: 20px;
    }
</style>

<body>
    <div class="jumbotron">
        <h3 class="display-5">login to User</h3>
        <hr>
    </div>
    <div class="container">
        <form class="form-signin" action="admin.php" method="POST">
            <center><img class="mb-4 logo" src="../images/quiz.jpg" alt="" width="72" height="72"></center>
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Sign in</button>
        </form>
    </div>
</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>
<?php
session_start();
include '../dbconnection.php';
if (isset($_POST['signin'])) {
    $query = "select * from admin where email = '$_POST[email]'";
    $query_run = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        if ($row['email'] == $_POST['email']) {
            if ($row['password'] == $_POST['password']) {
                $_SESSION['Semail'] = $row['email'];
                $_SESSION['Sname'] = $row['name'];
                header("location: Dashboard.php");
            } else {
                echo "incorrect password";
            }
        } else {
            echo "incorrect email";
        }
    }
}
?>