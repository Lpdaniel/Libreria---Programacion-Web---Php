<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'libreria_online';


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}

// Función para almacenar la información enviada por el formulario en la tabla "contacto"
function guardarContacto($pdo, $nombre, $correo, $asunto, $comentario) {
    $stmt = $pdo->prepare('INSERT INTO contacto (nombre, correo, asunto, comentario) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nombre, $correo, $asunto, $comentario]);
}

// Comprobar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $comentario = $_POST['comentario'];

    guardarContacto($pdo, $nombre, $correo, $asunto, $comentario);



    // Establecer un mensaje de éxito en una variable de sesión
    session_start();
    $_SESSION['mensaje'] = '¡Guardado correctamente!';

    // Redirigir a la página de contacto para evitar que se vuelva a enviar el formulario al actualizar la página
    header('Location: contacto.php');
    exit();
}


?>

<?php include 'index.php'; ?>
<!-- Contenido específico de la página contacto -->
<section class="fade-in">
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .contenedor {
        background-color: rgba(0, 0, 0, 0.7); /* Reducimos la opacidad para hacerlo más transparente */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Añadimos una sombra para resaltar el contenedor */
        height: 60vh;
        margin: 5%;
        padding: 20px;
        max-width: 600px;
        margin: 2% auto;
        color: white;
    }

    .contenedor h2 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }

    .contenedor label {
        display: block;
        margin-bottom: 5px;
    }

    .contenedor input[type="text"],
    .contenedor input[type="email"],
    .contenedor textarea {
        width: 80%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .contenedor textarea {
        resize: vertical;
    }

    .contenedor button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    

    .contenedor button[type="submit"]{
    font-size: 18px;
  color: #e1e1e1;
  font-family: inherit;
  font-weight: 800;
  cursor: pointer;
  position: relative;
  border: none;
  background: none;
  text-transform: uppercase;
  transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
  transition-duration: 400ms;
  transition-property: color;
}

.contenedor button[type="submit"]:focus,
.contenedor button[type="submit"]:hover{
    color: #ffffff;
}

.contenedor button[type="submit"]:focus:after,
.contenedor button[type="submit"]:hover:after {
  width: 100%;
  left: 0%;
}

.contenedor button[type="submit"]:after {
  content: "";
  pointer-events: none;
  bottom: -2px;
  left: 50%;
  position: absolute;
  width: 0%;
  height: 2px;
  background-color: #fff;
  transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
  transition-duration: 400ms;
  transition-property: width, left;
}
    #success-message {
        display: none;
        background-color: #dff0d8;
        color: #3c763d;
        padding: 10px;
        border-radius: 5px;
        margin-top: 10px;
    }
</style>
<div class="contenedor">
    <h2>Formulario de Contacto</h2>
    <?php
    // Mostrar el mensaje de éxito si existe
    session_start();
    if (isset($_SESSION['mensaje'])) {
        echo '<p style="color: green;">' . $_SESSION['mensaje'] . '</p>';
        unset($_SESSION['mensaje']); // Limpiar el mensaje para que no se muestre nuevamente al actualizar la página
    }
    ?>
    <form id="contact-form" action="contacto.php" method="post">
        <strong><label for="nombre">Nombre:</label>
        <center>
        <input type="text" name="nombre" id="nombre" required>
        </center>
        <label for="correo">Correo:</label>
        <center>
        <input type="email" name="correo" id="correo" required>
        </center>
        <label for="asunto">Asunto:</label>
        <center>
        <input type="text" name="asunto" id="asunto" required>
        </center>
        <label for="comentario">Comentario:</label>
        <center>
        <textarea name="comentario" id="comentario" rows="4" required width="10"></textarea>
        </strong>
        <button type="submit">Enviar</button></center>
    </form>

    <div id="success-message">
        <p>¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.</p>
    </div>
</div>
</section>

