<?php
include "PHP-MODULES/connection.php";

$usernameError = "";
$passwordError = "";
$invalidLogin = false;

if (isset($_POST['submit-form'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user_signup WHERE BINARY username = '$username' AND BINARY password = '$password'";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['id'];
        var_dump($userId);
        header("location: PHP-MODULES/USER/SHIPMENT-FORM/shipment-form.php?id=$userId");
        exit();
    } else {
        $invalidLogin =  '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="danger-alert">
                             Invalid <strong>Username</strong> or <strong> Password</strong> .
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!--Font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@300;400;500;600;700;800&family=Assistant:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--CSS links-->
    <link rel="stylesheet" href="STYLES/USER/LOGIN/login.css">
    <link rel="stylesheet" href="STYLES/OVERALL/overall.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="login-space">
        <!--FORM_CONTAINER-->
        <div class="login-container">
            <div class="left-section">
                <div class="header-text">Roll Logistics</div>
                <div class="secondary-texts">
                    <p>Move your parcel around the country on time.</p>
                    <label for="">Deliver It With Extra Care!</label>
                </div>
            </div>
            <div class="right-section">
                <form action="" class="login-form" id="login-form" name="login-form" method="POST">
                    <div class="field-form" id="field-form">
                        <div class="field-section">
                            <?= $invalidLogin ?>
                        </div>
                        <div class="field-section">
                            <input type="text" class="form-input" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="field-section">
                            <div class="password-container">
                                <input type="password" class="form-input" id="password" name="password" placeholder="Password">
                                <div class="peek-password" id="peek-password"><img id="imageDisplay" src="IMAGES/USER/LOGIN/peek-password.png" alt=""></div>
                            </div>
                        </div>
                        <button type="submit" id="submit-form" name="submit-form" class="form-submit">Login</button>
                        <!-- <a href="signup.php">Forgot password</a> -->
                        <hr>
                    </div>
                    <div class="create-account-container">
                        <a href="signup.php"><button type="button">Create new account</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="JAVASCRIPT/LOGIN/login.js"></script>
</body>

</html>