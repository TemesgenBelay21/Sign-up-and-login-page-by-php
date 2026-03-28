<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>login system</title>
</head>
<body>
    <div class="box">
        <h1>Welcome</h1>
        <form action="database.php" method = "post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Login">
            not yet a member? <a href="register.php">Sign up</a>

        </form>
    </div>
</body>
</html>