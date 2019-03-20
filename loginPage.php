<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/normalize.css">
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<body>

<div class="logo">
    <img src="Images/logo_transparent.png" alt="logo">
</div>

<div class="formContainer">
    <form method="POST" action="login.php">
        <label>Username</label>
        <br>
        <input type="text" name="username">
        <br><br>
        <label>Password</label>
        <br>
        <input type="password" name="password">
        <br><br>
        <a href="admin.php" id="login" type="submit" value="Login">Login</a>
    </form>
</div>

</body>
</head>
</html>