<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_5b";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = mysqli_real_escape_string($conn, $_POST['matric']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $checkSql = "SELECT * FROM users WHERE matric = '$matric'";
    $result = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($result) > 0) {
        echo "Error: Matric number already exists.";
    } else {
        $sql = "INSERT INTO users (matric, name, password, role) VALUES ('$matric', '$name', 
        '$password', '$role')";

        if (mysqli_query($conn, $sql)) {
            header("Location: displayuser.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

$conn->close();
?>
