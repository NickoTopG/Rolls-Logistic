<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "logistic";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    // Perform deletion
    $sql = "DELETE FROM user_signup WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to admin.php after successful deletion
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
