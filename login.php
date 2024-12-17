<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
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
            padding: 20px;
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
        .form-container .register-link {
            text-align: center;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="loginscript.php" method="POST">
            <label for="matric">Matric Number:</label>
            <input type="text" id="matric" name="matric" required>          
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <a href="register.php" class="register-link">New user? Register here</a>
    </div>
</body>
</html>
