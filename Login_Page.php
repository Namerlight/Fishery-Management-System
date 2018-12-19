<?php include ('connectDB.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
</head>

<style>

    body {
        top: -5px;
        position: relative;
        background-image: url("images/sea_background_image.jpg");
        background-color: #9fcdff;
        background-size: cover;
        font-family: "Calibri";
    }

    .body-box {

        background-color: #2e6da4;
        max-width: 500px;
        margin: auto;
        align-content: center;
        border-radius: 30px;

    }

</style>

<body>
    <div class="body-box">
        <div style="text-align: left; color: white; margin: auto; padding-left: 10px; padding-right: 10px; padding-top: 20px; padding-bottom: 20px;">
            <form class="form-signin" action="Login_Submit.php" method="POST">
                <label for="inputUser">Username</label>
                <input type="text" name="inputUser" class="form-control" placeholder="Username">
                <!--name of the field for entering username is inputUser-->
                <label for="inputPassword">Password</label>
                <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
                <!--name of the field for entering password is inputPassword-->
                <br>
                <button type="submit" name="SignIn" class="btn btn-lg btn-primary btn-block" value="Submit">Login.</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php include('connectClose.php'); ?>