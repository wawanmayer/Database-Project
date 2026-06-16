<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style-login.css">
</head>

<body>

<div class="container">

    <h2>Login</h2>

    <form action="cek_login.php" method="POST">

        <input 
            type="text" 
            name="id" 
            placeholder="ID" 
            required>

        <input 
            type="password" 
            name="password" 
            placeholder="Password" 
            required>

        <button type="submit">Login</button>

    </form>

    <div class="link">
        <a href="register.php">Register Here</a>
    </div>

</div>

</body>
</html>