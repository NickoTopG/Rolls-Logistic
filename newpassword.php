<?php
session_start();
include "PHP-MODULES/connection.php";

$T_password_updated = false;

if (isset($_POST['update-password'])) {
    $desiredUsername = $_POST['desired_username'];
    $newPassword = $_POST['new_password'];

    $updateQuery = "UPDATE user_signup SET password = '$newPassword' WHERE BINARY username = '$desiredUsername'";
    $updateResult = mysqli_query($con, $updateQuery);

    $T_password_updated = $updateResult;
}

?>

<?php
// Replace these values with your database connection details
$host = 'localhost'; // e.g., 'localhost' or IP address
$dbname = 'logistic'; // Replace with your actual database name
$username = 'root';
$password = '';

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Check if form is submitted and has the required data
if (isset($_POST['desired_username']) && isset($_POST['new_password'])) {
    // Retrieve the username and new password from your form
    $desiredUsername = $_POST['desired_username'];
    $newPassword = $_POST['new_password'];

    // Update the password in the 'user_signup' table
    try {
        $stmt = $pdo->prepare("UPDATE user_signup SET password = :newPassword WHERE username = :desiredUsername");
        $stmt->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
        $stmt->bindParam(':desiredUsername', $desiredUsername, PDO::PARAM_STR);
        $stmt->execute();

        echo "Password updated successfully.";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    // Display an error message if form data is missing
    echo "Error: Form not submitted correctly.";
}

// Close the connection
$pdo = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="STYLES/USER/LOGIN/newpassword.css">
</head>
<body>
    <header>
    </header>

    <div class="container flex">
        <div class="goshdc-page flex">
            <div class="text">
                <h1>Change Password</h1>
            </div>
            <form action="newpassword.php" method="post" onsubmit="return validateForm();">
                <input type="text" name="desired_username" placeholder="Username" required onblur="checkInputValidity('desired_username')">
                <div class="password-container">
                    <input type="password" name="new_password" id="password" required placeholder="New Password" onblur="checkInputValidity('new_password')">
                    <img src="IMAGES/USER/LOGIN/close-eye.png" alt="Toggle Password Visibility" class="eye-icon" id="eye-icon" onclick="togglePasswordVisibility()">
                </div>
                <div class="link">
                    <input id="button" class="login" type="submit" value="Change Password"><br>
                </div>

            <div class="link">
                <a id="button" href="login.php">Back to Login</a>
            </div>

            </form>
            
           
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.src = "IMAGES/USER/LOGIN/peek-password.png";
            } else {
                passwordInput.type = "password";
                eyeIcon.src = "IMAGES/USER/LOGIN/close-eye.png";
            }
        }

        // Function to add red-placeholder class when input is empty or there are errors
        function checkInputValidity(inputId) {
            var input = document.getElementsByName(inputId)[0];
            
            if (input.value === "") {
                input.classList.add("red-placeholder");
            } else {
                input.classList.remove("red-placeholder");
            }
        }

        // Check input validity on form submission
        function validateForm() {
            checkInputValidity('desired_username');
            checkInputValidity('new_password');
            
            return (!document.getElementsByName('desired_username')[0].classList.contains("red-placeholder") &&
                    !document.getElementsByName('new_password')[0].classList.contains("red-placeholder"));
        }
    </script>
</body>
</html>
