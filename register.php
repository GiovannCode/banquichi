<?php
    require_once 'db_conexion.php';
    $random = rand(1000000000, 9999999999);
    $number_r = $random;

    

    if(isset($_POST['up'])){
        $numero_c = $_POST['numero_c'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tipo_c = $_POST['tipo_c'];
        $sql = $cnnPDO->prepare("INSERT INTO banco_u (numero_c, name, email, tipo_c) VALUES (?, ?, ?, ?)");
        $sql->execute([$numero_c, $name, $email, $tipo_c]);
		unset($sql);
		unset($cnnPDO);
        if($sql){
            echo "Se ha dado de alta la cuenta";
        }else{
            echo "No se ha podido dar de alta la cuenta";
        }
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
        <input type="text" value="<?php echo$number_r?>" name="numero_c" readonly>
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