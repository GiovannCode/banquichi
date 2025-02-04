<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar alta de cuenta</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b1473ebfe8.js" crossorigin="anonymous"></script>
</head>

<body class="body-registro">
    <div class="container-principal-register">
        <div class="content-login-form">
            <div class="container-login-form">
                <h1>Transferir</h1>
                <form method="post">
                    <input class="input-form-3" type="text" name="numero_c" required><i class="fa-solid fa-arrow-up-9-1"></i>
                    <label class="label-form-3">Numero de cuenta </label>


                    <input class="input-form-2" type="password" name="pass" required><i class="fa-solid fa-lock"></i>
                    <label class="label-form-2">A Quien</label>

                <span class="saldo">
                    <p>saldo 0$</p>
                    <button class="btn-form" type="submit" name="login">Transferir</button>
                </span>
                </form>
            </div>
        </div>
        <div class="content-login">
            <div class="content-register-text">
                <h1>Gracias por formar parte de nuestro banco</h1>
                <br>
                <p> </p>
                <br>
                <a class="anclaje-home" href="inicio.php"> <i class="fa-solid fa-house"></i> Inicio</a>
            </div>
        </div>

    </div>
</body>

</html>