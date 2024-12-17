<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            border: 1px solid #ddd;
            padding: 25px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .form-container label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .form-container input,
        .form-container select,
        .form-container button {
            width: 90%;
            padding: 12px;
            margin: 8px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container input:focus,
        .form-container select:focus,
        .form-container button:focus {
            outline: none;
            border-color: #007BFF;
        }

        .form-container button {
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container .register-link {
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
            font-size: 14px;
        }

        .form-container .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form action="insert.php" method="POST">
            <label for="matric">Matric Number:</label>
            <input type="text" id="matric" name="matric" required>
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>            
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
                <option value="Teacher">Teacher</option>
            </select>
            
            <button type="submit">Register</button>
        </form>
        <a href="login.php" class="register-link">New user?</a>
    </div>
</body>
</html>
