<?php
// FORM CLEANSING
// empty error
$username_empty = "";
$first_name_empty = "";
$last_name_empty = "";
$password_empty = "";
$address_empty = "";
// signup success or not prompt
$signupSucess = 0;
$signupError = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "PHP-MODULES/connection.php";
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    // constraint patterns
    $number_pattern = '/\d+/';
    $password_pattern = '/^(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/';
    if (
        empty($username) || strlen($username) < 4 ||
        empty($firstname) || preg_match($number_pattern, $firstname) === 1 ||
        empty($lastname) || preg_match($number_pattern, $lastname) === 1 ||
        empty($password) || strlen($password) < 8 || preg_match($password_pattern, $password) === 0 ||
        empty($address)
    ) {
        if (empty($username)) {
            $username_empty = "";
        } else if (strlen($username) < 4) {
            $username_empty = "Username must contain atleast 4 characters";
        }
        if (empty($firstname)) {
            $first_name_empty = "Firstname must not be empty";
        } else if (preg_match($number_pattern, $firstname) === 1) {
            $first_name_empty = "Firstname must not contain numbers.";
        }
        if (empty($lastname)) {
            $last_name_empty = "Lastname must not be empty";
        } else if (preg_match($number_pattern, $lastname) === 1) {
            $last_name_empty = "Lastname must not contain numbers.";
        }
        if (empty($password)) {
            $password_empty = "Password must not be empty";
        } else if (preg_match($password_pattern, $password) === 0) {
        }
        if (empty($address)) {
            $address_empty = "Address must not be empty";
        }
    } else {

        $sql = "SELECT * FROM user_signup WHERE username = '$username'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $signupError = 1;
            } else {
                $signupSucess = 1;
                $sql = "INSERT INTO `user_signup` (username, first_name, last_name, password, user_address) 
                          VALUES ('$username', '$firstname', '$lastname', '$password', '$address')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $username = "";
                    $password = "";
                    $lastname = "";
                    $address = "";
                } else {
                    die(mysqli_error($con));
                }
            }
        }
    }
    $con->close();
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
    <link rel="stylesheet" href="STYLES/SIGNUP/signup.css">
    <link rel="stylesheet" href="STYLES/OVERALL/overall.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="signup-space">
        <div class="form-container">
            <div class="form-section">
                <div class="form-header">
                    <div class="form-header-text">
                        <img class="signup-image" src="IMAGES/SIGNUP/header-image.jpg" alt="">
                        <div class="form-text-guide">
                            <label for="">Sign up Form</label>
                            <p>Create your account and start your session!</p>
                        </div>
                        <div class="validation-guide">
                            <?php
                            if ($signupSucess) {
                                echo '
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </symbol>
                                    <symbol id="info-fill" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </symbol>
                                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </symbol>
                                </svg>

                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div>
                                        <label class = "validation-text">You Successfully Sign Up. <a href = "signup.php"> click Log In Now!</a></label>
                                    </div>
                                </div>';
                            } else if ($signupError) {
                                echo '
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </symbol>
                                    <symbol id="info-fill" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </symbol>
                                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </symbol>
                                </svg>                               
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                  <label class = "validation-text">Username is already existing.</label>
                                </div>
                              </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <form action="" id="signup-form" class="form-field" method="POST">
                    <div class="form-field-a">
                        <div class="form-contents">
                            <label for="">*Username</label>
                            <input type="text" id="username" name="username" placeholder="username">
                            <p class="signup-error" id="username-error"></p>
                        </div>
                        <div class="form-contents">
                            <label for="">*Password</label>
                            <input type="password" id="password" name="password" placeholder="password">
                            <div class="peek-password" id="toggle-password"><img id="password-image" src="IMAGES/SIGNUP/peek-password.png" alt=""></div>
                            <p class="signup-error" id="password-error"></p>
                        </div>
                    </div>
                    <div class="form-field-a">
                        <div class="form-contents">
                            <label for="">*Current address</label>
                            <input type="text" id="address" name="address" placeholder="address">
                            <p class="signup-error" id="address-error"></p>
                        </div>
                    </div>
                    <div class="form-field-a">
                        <div class="form-contents">
                            <label for="">*First name</label>
                            <input type="text" id="firstname" name="firstname" placeholder="first name">
                            <p class="signup-error" id="firstname-error"></p>
                        </div>
                        <div class="form-contents">
                            <label for="">*Last name</label>
                            <input type="text" id="lastname" name="lastname" placeholder="last name">
                            <p class="signup-error" id="lastname-error"></p>
                        </div>
                    </div>
                    <div class="submit-button">
                        <button type="submit" id="signup-button" name="submit_button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="JAVASCRIPT/INDEX/index.js"></script>
</body>
</html>