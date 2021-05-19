<?php include('server.php') ?>
<!DOCTYPE>
<html>
<head>
    <title>Log in</title>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Register</h2>
    </div>
    <form action="login.php" method="post">
        <div>
            <label for="username">Username : </label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="password">Password : </label>
            <input type="password" name="password">
        </div>

        <button type="submit" name="login_user"> Submit </button>
        <p>Not a user? <a href="registration.php"><b>Register Here</b></a> </p>
    </form>
</div>
</body>
</html>