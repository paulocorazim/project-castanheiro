<!DOCTYPE html>
<html lang="en">
<head>
    <script src="nunjucks.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Cairo:700&display=swap" rel="stylesheet">
    <script src="js/main.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/e6868744bc.js" crossorigin="anonymous"></script>
    <title>Castanheiros</title>
</head>
<body>

<div class="blocklogin">
    
    <div class="login">
        <img class="logoone" src="image/logo.png">
        <hr>
        <h2>Login</h2>
        <form>
            <div class="input-group">
                <input type="email" name="" required="required">
                <span>E-mail</span>
            </div>
            <div class="input-group">
                <input type="password" name="" required="required">
                <span>Senha</span>
            </div>
            <div class="input-group">
                <input type="submit" value="Login" onclick="validation('');">
            </div>
        </form>
        <a href="man/manager.php">Esqueçeu a senha? <span></span></a>
    </div>
</div>

<script>
    function validation(){
        window.alert('EU NÃO TO ACREDITANDO QUE DEU CERTO');
    }

    
</script>
</body>
</html>