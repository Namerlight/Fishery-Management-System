<?php include ('connectDB.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
</head>

<style>

    body {
        top: 20px;
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

    <div style="text-align: left; color: white; margin: auto; padding-left: 10px; padding-right: 10px; padding-top: 20px; padding-bottom: 30px;">

        <form id="form-signin" action="Registration_Submit.php" method="post">
            <label for="inputUser">Username</label>
            <input type="text" name="inputUser" class="form-control" placeholder="Username" required>

            <label for="inputEmail">Email Address</label>
            <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required>

            <label for="inputPassword">Password</label>
            <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

            <label for="retypePassword">Re-enter Password</label>
            <input type="password" name="retypePassword" class="form-control" placeholder="Password" required>

            <label for="inputAddress">Address</label>
            <input type="text" name="inputAddress" class="form-control" placeholder="Address">

            <label for="inputPhone">Contact Number</label>
            <input type="number" name="inputPhone" class="form-control" placeholder="Phone">

            <label for="typeFlag">Are you an individual or an enterprise?</label>
            <select id="typeFlag" name="typeFlag" class="form-control">
                <option selected>Individual</option>
                <option>Enterprise</option>
            </select>

            <br>

            <button type="submit" name="RegisterAccount" class="btn btn-lg btn-primary btn-block" value="Submit">Submit. You will be automatically redirected.</button>

        </form>

    </div>

</body>
</html>

<?php include('connectClose.php'); ?>