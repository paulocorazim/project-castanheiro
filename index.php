<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Cairo:700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/e6868744bc.js" crossorigin="anonymous"></script>
    <title>appManager v.0.1 : Castanheiros</title>
</head>

<body>

<div class="blocklogin">

    <div class="login">
        <img class="logoone" src="image/logo.png">
        <hr>
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="input-group">
                <input type="email" name="email" id="email" required="required">
                <span>Entre com seu e-mail ou cpf</span>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" required="required">
                <span>entre com sua senha</span>
            </div>
            <div class="input-group">
                <input type="submit" name="btnLogin" id="btnLogin" value="Login">
            </div>
        </form>
        <a href="#">Esqueçeu a senha? <span></span></a>
    </div>
</div>

</body>

</html>