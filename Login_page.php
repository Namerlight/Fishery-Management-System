<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/boostrap-reboot.css">
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
        border-top-right-radius: 30px;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;

    }

</style>

<body>


    <div class="body-box">

        <div style="text-align: left; color: white; margin: auto; padding-left: 10px; padding-right: 10px; padding-top: 20px; padding-bottom: 30px;">

            <form class="form-signin">
                <label for="inputEmail">Email Address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin: auto">Sign in</button>
            </form>

        </div>

    </div>



</body>
</html>