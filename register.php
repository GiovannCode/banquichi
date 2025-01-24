<?php
require_once 'db_conexion.php';
$random = rand(100000000000, 999999999999);
$number_r = $random;
// do {
//     $random = rand(100000000000, 999999999999);
//     $sql = $cnnPDO->prepare("SELECT COUNT(*) FROM ba WHERE numero_c = ?");
//     $sql->execute([$random]);
//     $exists = $sql->fetchColumn();
// } while ($exists > 0);
// $number_r = $random;
$password = bin2hex(random_bytes(3));

if (isset($_POST['up'])) {
    $numero_c = $_POST['numero_c'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tipo_c = $_POST['tipo_c'];
    $pass = $password;
    $sql = $cnnPDO->prepare("INSERT INTO ba (numero_c, name, email, tipo_c, pass) VALUES (?, ?, ?, ?, ?)");
    $sql->execute([$numero_c, $name, $email, $tipo_c, $pass]);
    if ($sql) {
        echo "Se ha dado de alta la cuenta";
    } else {
        echo "No se ha podido dar de alta la cuenta";
    }
    unset($sql);
    unset($cnnPDO);

    $mensaje = "
    <html>
    <head>
        <title>BanquiChi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        td {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        }
        td .mail{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 600px;
        }
        .mail h1{
            background: #000000;
            color: #f4f4f4;
            padding: 20px;
        }
        .content {
            font-size: 16px;
            line-height: 1.5;
        }
        
    </style>
</head>

<body>
    <table>
        <tr>
            <td>
                <div class='mail'>
                    <h1>Banquichi</h1><br>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p class='content'>Hola $name, gracias por querer formar parte de nuestro banco.
                 A continuación te mostramos la contraseña que generamos para tu cuenta:</p>
            </td>
        <tr>
            <td>
                <ol>
                    <li>Tu Contrasena: <strong>$pass</strong></li>
                    <!--<li>Tu correo: <strong>$email</strong></li> -->
                    <!--<li>Tu celular: <strong>$celular</strong></li>-->
                    <!-- <li>Tu ingreso: <strong>$ingreso</strong></li>-->
                    <li>Recuerda que no debes compatir la contraseña</li>
                    li>Gracias por formar parte de banquichi<strong>
                </ol>
            </td>
        </tr>
        <tr>
            <td>
                <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOkKe7Eh7DaTREZ0Tz12-Kh7Ij0s9INOYP5g&s'>
            </td>
        </tr>
    </table>
    </body>
    </html>";


    //$mensaje = "Este mail fue enviado por el usuario: " . $name . "\n";
    // $mensaje .= "Su correo es: " . $email . "\n";
    // $mensaje .= "Su celular es: " . $celular . "\n";
    // $mensaje .= "Ingreso: " . $ingreso . "\n";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $destinatario = $email;
    $asunto = "Correo enviado desde la web :)";

    mail($destinatario, $asunto, $mensaje, $headers);
    session_destroy();
    sleep(3);
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar alta de cuenta</title>
</head>

<body>
    <h1>Gracias por querer formar parte de nuestro banco</h1>
    <p>Para darse de alta en nuestro banco completa lo siguiente</p>
    <form method="post">
        <label>Numero de cuenta:</label>
        <input type="text" value="<?php echo $number_r ?>" name="numero_c" readonly>
        <label>Nombre del cliente:</label>
        <input type="text" name="name">
        <label>Correo:</label>
        <input type="email" name="email">
        <label>Tipo de cuenta</label>
        <select name="tipo_c" id="tipo_c">
            <option value="opcion1">Selecciona el tipo de cuenta que deseas abrir</option>
            <option value="Debito">Debito</option>
            <option value="Ahorro">Ahorro</option>
            <option value="Tarjeta de credito">Tarjeta de credito</option>
        </select>
        <button type="submit" name="up">Dar de alta</button>
    </form>
</body>

</html>