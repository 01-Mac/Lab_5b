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

// Check if the matric number is passed in the URL
if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Fetch user data based on matric number
    $sql = "SELECT matric, name, role FROM users WHERE matric = '$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
}

// Handle form submission for updating the user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Update the user data in the database
    $update_sql = "UPDATE users SET name = '$name', role = '$role' WHERE matric = '$matric'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('User details updated successfully'); window.location.href='displayuser.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            width: 350px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
        }
        .form-container input,
        .form-container select,
        .form-container button {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
        }
        .form-container button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update User Details</h2>
        <form action="" method="POST">
            <label for="matric">Matric Number:</label>
            <input type="text" id="matric" name="matric" value="<?php echo $user['matric']; ?>" readonly>
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
            
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="Student" <?php echo ($user['role'] == 'Student') ? 'selected' : ''; ?>>Student</option>
                <option value="Admin" <?php echo ($user['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="Teacher" <?php echo ($user['role'] == 'Teacher') ? 'selected' : ''; ?>>Teacher</option>
            </select>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
