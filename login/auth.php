<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/login_style.css">
    <link rel="stylesheet" href="../pages/plugins/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/pages/vendor/fontawesome-free/css/all.min.css">
    <title>Login</title>`
</head>

<body>
    <div class="container">
        <div class="logo" ><img class="logo-img" width="650px" src="pict/logo_ventools.svg"></div>
        <div class="forms-container">
            <div class="signin-signup">
                <form action="authvalidation.php" method="post" class="sign-in-form">
                    <h2 class="title">Login</h2>
                    <div class="input-field"><i class="fas fa-user"></i> <input type="text" name="username" id="username" placeholder="Username" required="" id="username"></div>
                    <div class="input-field"><i class="fas fa-lock"></i> <input type="password" name="password" id="password" placeholder="Password" required="" id="password" autocomplete="off"></div><input class="btn solid" type="submit" value="Log in">
                </form>
            </div>
        </div>
    </div>
</body>

</html>