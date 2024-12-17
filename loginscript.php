<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_5b";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = mysqli_real_escape_string($conn, $_POST['matric']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE matric = '$matric'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['matric'] = $row['matric'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            header("Location: displayuser.php");
            exit();
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('User not found.');</script>";
    }
}

$conn->close();
?>
