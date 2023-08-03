<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Librería Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo/diseno.css">
</head>
<body>
    <header>
        <h1>ANAGNOSI</h1>
        <div class="form-control">
         <input class="input input-alt" placeholder="Type something intelligent" required="" type="text">
         
        <span class="input-border input-border-alt"></span>
     
        </div>

        <nav>
  


            <ul>
            <li><button onclick="window.location.href='libros.php'">Libros</button></li>
            <li><button onclick="window.location.href='autores.php'">Autores</button></li>
            <li><button onclick="window.location.href='contacto.php'">Contacto</button></li>
            
            </ul>
        </nav>
    </header>
    
    <main>
        <!-- Contenido de cada página se mostrará aquí -->
    </main>
    
    

    <script src="js/Script.js"></script>
</body>
<footer>
        <p>&copy; <?php echo date('Y'); ?> Librería Online. Todos los derechos reservados.</p>
    </footer>
</html>
