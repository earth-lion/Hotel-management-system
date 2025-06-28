<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Staf Login</title>
</head>

<body class="body">
    <div class="container">
        <h1 style="color: rgb(132, 76, 185);">Staf Login</h1>
        <div class="img-container">
            <img src="img/user-login-5000917-4165668.png" alt="User Icon" class="img">
        </div>
        <form class="form" action="login.php" method="post">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error">
                    <?php echo $_GET['error']; ?>
                </p>
            <?php } ?>
            <label for="username" style="font-size: large; margin-left: 20px;">Enter username</label>
            <input id="username" class="" type="text" name="uname" placeholder="Username" autofocus required>
            <img class="icon" src="img/BackgroundEraser_20231220_004904689.png" alt="">

            <label for="pass" style="font-size: large; margin-left: 20px;">Enter password</label>
            <input id="pass" type="password" name="password" placeholder="Password">
            <button type="submit" name="login">Login</button><br><br>
            <button type="reset" name="login" style="background-color: red;">reset</button>
        </form>
    </div>
</body>

</html>