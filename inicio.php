<?php 
session_start();
require_once 'db_conexion.php';
$numero_c = $_SESSION['numero_c'];  
$sql = $cnnPDO->prepare("SELECT saldo FROM cliente WHERE numero_c = ?");
$sql->execute([$numero_c]);
$resultado = $sql->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    $_SESSION['saldo'] = $resultado['saldo']; 
}
if (isset($_POST['desac'])) {
    $numero_c = $_SESSION['numero_c'];
    $estado = false;
    $sql = $cnnPDO->prepare("UPDATE cliente SET estado = ? WHERE numero_c = ?");
    $sql->execute([$estado, $numero_c]);
    unset($sql);
    unset($cnnPDO);
    session_destroy();
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Banquichi</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="body-index">
<nav class="navbar">
    <a href="#" class="logo">Banquichi</a>
    <ul class="nav-links">
        <li><a href="inicio.php">Inicio</a></li>
        <li><a href="transferir.php">Transferir</a></li>
        <!-- <li><a href="register.php">Darse de alta</a></li> -->
        <li><a href="#">Contacto</a></li>
        <li><a href="logout.php">Cerrar sesion</a></li>
    </ul>
</nav>

<div class="container-principal">
    <div class="container-1-inicio">
        <img src="https://icones.pro/wp-content/uploads/2022/03/icone-de-l-historique-bleu.png" alt="">
        <div class="container-1-info-text">

            <section>
                <div class="container">
                <h2>Historial</h2>
                <p>Consulta El Historial De Transferencias:</p>
                <ul class="currency-list">
                <li><strong>nombre:</strong> YO</li>
                <li><strong>Monto:</strong> $50,000</li>
                <li><strong>A Quien Se La Hizo:</strong> Gio</li>
                <li><strong>Fecha:</strong> 05/02/2005</li>
                </ul>
            </div>

            </section>
            <div class="historial-total">
                <p>Total: $5000</p>
            </div>
        </div>
    </div>
    <div class="container-2-inicio">
        <div class="container-2-info">
            <div class="container-2-info-text">
                <h1>¡Bienvenido/a de nuevo, <span class="highlight"><?php echo $_SESSION['name']?></span>!</h1>
                <br>
                <h2>Es un gusto tenerte aquí. Tu tranquilidad financiera es nuestra prioridad.</h2>
                <p>"Recuerda: Siempre puedes revisar tus transacciones recientes y mantener tus finanzas al día de forma segura y rápida."</p>
                <p>O un mensaje promocional: <span class="highlight">"¿Sabías que puedes ahorrar más con nuestras cuentas de inversión? Descúbrelo aquí."</span></p>
                <button>Comienza ahora</button>
            </div>
        </div>
        <div class="container-2-inicio-img"><img src="img/img-6.png" alt=""></div>
    </div>
</div>

<div class="container-principal-2">
    <div class="container-3-inicio">
        
        <section class="service-section">
            <img class="imagen-section-2" src="img/img-3.png" alt="Tarjeta de Crédito">
            <h2 class="service-title">Crédito</h2>
            <p class="service-description">
                Amplía tu poder adquisitivo con nuestras tarjetas de crédito con beneficios exclusivos.
            </p>
            <ul class="service-benefits">
                <li class="service-item">Sin costo por emisión.</li>
                <li class="service-item">Programa de recompensas y descuentos.</li>
                <li class="service-item">Límites de crédito flexibles.</li>
            </ul>
            <div class="service-cta">
                <a href="#solicitar-credito" class="service-button">Solicita tu tarjeta de crédito</a>
            </div>
        </section>
        
        <section style="position: relative; bottom: 0px; top: 50px;" class="service-section">
            
            <h2 class="service-title">Datos de tu cuenta</h2>
            <p class="service-description">
            Te mostramos la informacion basica para que puedas realizar tus transacciones de forma segura.
            </p>
            <ul class="service-benefits">
                <li class="service-item">Numero de cuenta: <?php echo $_SESSION['numero_c']?> </li>
                <li class="service-item">Correo: <?php echo $_SESSION['email']?> </li>
                <li class="service-item">Tipo de cuenta: <?php echo $_SESSION['tipo_c']?> </li>
                <li class="service-item">Saldo: <?php echo $_SESSION['saldo']?>$</li>
            </ul>
            <div class="service-cta">
                <form method="post">
                    <input type="hidden" name="numero_c" value="<?php echo $_SESSION['numero_c']?>">
                    <button class="service-button" type="submit" name="desac">Desactivar cuenta</button>
                </form>
                <!-- <a href="#solicitar-inversion" class="service-button">Desactivar cuenta</a> -->
            </div>
            <img style="position: relative; bottom: 0px; top: 10px;" class="imagen-section-2" src="img/img-7.png" alt="Tarjeta de Crédito">
        </section>
            
    </div>
    <div class="container-4-inicio">
        <div class="container-4-info">
            <section class="quick-access-section">
                <h2 class="quick-access-title">Accesos Rápidos</h2>
                <div class="quick-access-buttons">
                    <a href="transferir.php" class="quick-access-button">Transferencias</a>
                    <a href="depositar.php" class="quick-access-button">Depositar</a>
                    <a href="#gestion-tarjetas" class="quick-access-button">Gestión de Tarjetas</a>
                    <a href="#solicitudes-rapidas" class="quick-access-button">Solicitudes Rápidas</a>
                </div>
                </section>
            <img class="container-4-info-img" src="img/img-8.png" alt="">
        </div>
    </div>
    
</div>

<footer>
    <div class="footer-container">
    <div class="footer-section">
        <h4>Banquichi</h4>
        <p>Tu seguridad, nuestro compromiso.</p>
    </div>
    <div class="footer-section">
        <h4>Enlaces Rápidos</h4>
        <ul>
            <li><a href="/productos">Productos y Servicios</a></li>
            <li><a href="/sucursales">Sucursales</a></li>
            <li><a href="/ayuda">Ayuda y Soporte</a></li>
            <li><a href="/terminos">Términos y Condiciones</a></li>
            <li><a href="/privacidad">Política de Privacidad</a></li>
        </ul>
    </div>
    <div class="footer-section">
        <h4>Contáctanos</h4>
        <p><strong>Teléfono:</strong> 01 800 123 4567</p>
        <p><strong>Email:</strong> contacto@Banquichi.com</p>
        <p><strong>Redes Sociales:</strong></p>
        <div class="social-icons">
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/2023_Facebook_icon.svg/2048px-2023_Facebook_icon.svg.png" alt="Facebook"></a>
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/2491px-Logo_of_Twitter.svg.png" alt="Twitter"></a>
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/4096/4096186.png" alt="LinkedIn"></a>
        </div>
    </div>
    </div>
    <div class="footer-bottom">
    <p>&copy; 2025 Banco XYZ. Todos los derechos reservados.</p>
    </div>
</footer>

</body>
</html>

