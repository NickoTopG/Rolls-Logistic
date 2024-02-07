<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "logistic";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $user_address = $_POST['user_address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $user_id = $_POST['user_id'];

    // Update user_signup table
    $sql_user_signup = "UPDATE `user_signup` SET 
                          `username`='$username', 
                          `user_address`='$user_address', 
                          `email`='$email', 
                          `mobile`='$mobile' 
                          WHERE `id`='$user_id'";
    $result_user_signup = $conn->query($sql_user_signup);

    if ($result_user_signup === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql_user_signup = "SELECT * FROM `user_signup` WHERE `id`='$user_id'";
    $result_user_signup = $conn->query($sql_user_signup);

    if ($result_user_signup->num_rows > 0) {
        $row_user_signup = $result_user_signup->fetch_assoc();

        // Retrieve values from user_signup table
        $username = $row_user_signup['username'];
        $user_address = $row_user_signup['user_address'];
        $email = $row_user_signup['email'];
        $mobile = $row_user_signup['mobile'];

        // Rest of your HTML form goes here...
    } else {
        header('Location: pend.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update</title>
    <link rel="stylesheet" href="../styles/signup.css">
</head>

<body style="background: rgb(15, 16, 53);">
    <form action="" method="post">
        <fieldset>
            <legend>User Signup Update Form</legend>
            Username:<br>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <br>
            User Address:<br>
            <input type="text" name="user_address" value="<?php echo $user_address; ?>">
            <br>
            Email:<br>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <br>
            Mobile:<br>
            <input type="text" name="mobile" value="<?php echo $mobile; ?>">
            <br>
            User ID:<br>
            <input type="text" name="user_id" value="<?php echo $user_id; ?>">
            <br><br>

            <input type="submit" value="Update" name="update">

            <div class="button">
                <a href="admin.php">Go Back</a>
            </div>
        </fieldset>
    </form>
</body>

</html>
