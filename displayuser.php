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
    
if (isset($_POST['delete'])) {
    $matric = $_POST['matric'];

    $sql = "DELETE FROM users WHERE matric = '$matric'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Users List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-btns {
            display: flex;
            gap: 10px;
        }
        .logout-btn, .update-btn, .delete-btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            margin: 10px 0;
        }
        .logout-btn:hover, .update-btn:hover, .delete-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Users List</h2>";

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Matric Number</th>
                <th>Name</th>
                <th>Access Level</th>
                <th>Action</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["matric"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["role"] . "</td>
                <td>
                    <div class='action-btns'>
                        <a href='updateuser.php?matric=" . $row["matric"] . "' class='update-btn'>Update</a>
                        <form action='' method='POST' class='form-container'>
                            <input type='hidden' name='matric' value='" . $row["matric"] . "'>
                            <button type='submit' name='delete' class='delete-btn'>Delete</button>
                        </form>
                    </div>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();

echo "<form action='login.php' method='GET'>
        <button type='submit' class='logout-btn'>Logout</button>
      </form>";

echo "</body>
</html>";
?>
