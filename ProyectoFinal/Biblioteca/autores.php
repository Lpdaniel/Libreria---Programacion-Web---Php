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

// Consulta para obtener la lista de autores
$stmt = $pdo->query('SELECT * FROM autores');
$autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'index.php'; ?>
<!-- Contenido específico de la página autores -->
<section class="fade-in">
    <style>
        body {
            font-family: sans-serif;
        }

        .contenedor {
            background-color: rgba(0, 0, 0, 0.7); /* Reducimos la opacidad para hacerlo más transparente */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Añadimos una sombra para resaltar el contenedor */
            height: 60vh;
            margin: 5%;
            

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; /* Centramos verticalmente el contenido */
            color: white;
        }

        

    </style>
    <div class="contenedor">
        <h2>Listado de Autores</h2>
        <ul>
            <?php foreach ($autores as $autor): ?>
                <li><?php echo $autor['id_autor'] . ' --- ' .
                $autor['apellido'] . ' --- ' .
                $autor['nombre'] . ' --- ' .
                $autor['telefono'] . ' --- ' .
                $autor['direccion'] . ' --- ' .
                $autor['ciudad'] . ' --- ' .
                $autor['estado'] . ' --- ' . 
                $autor['pais'] . ' --- ' .
                $autor['cod_postal']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>


