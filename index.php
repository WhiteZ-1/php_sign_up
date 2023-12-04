<?php

    require_once("include/config_session.inc.php");
    require_once("include/signup_view.inc.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="start.css">
    <title>Document</title>
</head>
<body>
    <section>
        <div class="container">
            <form action="include/signup.inc.php" method="post">
                <h2>Sign up</h2>
                <label for="username">Username</label>
                <input class="username-field" name="username"  type="text"><br>
                <label for="email">Email</label>
                <input class="email-field" name="email" ><br>
                <label for="password">Password</label>
                <input class="pass-field" name="password" type="password"><br>
                <button class="form-btn" type="submit">Register</button>
                <div class = "form-error"><?php check_signup_errors() ?></div>
            </form>
        </div>
    </section>
</body>
</html>
