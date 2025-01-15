<?php
session_start();

// Obtener el ID del juego seleccionado
$juego_id = isset($_GET['juego_id']) ? $_GET['juego_id'] : null;

if (!$juego_id) {
    // Redirigir si no hay juego seleccionado
    header('Location: juegos-ps.html');
    exit;
}

// Array de juegos (simulando una base de datos)
$juegos = [
    1 => [
        'nombre' => 'Grand Theft Auto V',
        'imagen' => 'IMGJUEGOS/Grand Theft Auto V.jpeg',
        'precio' => 59.99
    ],
    2 => [
        'nombre' => 'God Of War Ragnarok',
        'imagen' => 'IMGJUEGOS/God Of War Ragnarok.jpeg',
        'precio' => 69.99
    ],
    3 => [
        'nombre' => 'FC 25',
        'imagen' => 'IMGJUEGOS/FC 25 APK Mod MediaFire Download_ FIFA 16 Offline Career Mode.jpeg',
        'precio' => 59.99
    ],
    4 => [
        'nombre' => 'UFC 5',
        'imagen' => 'IMGJUEGOS/UFC5 VideoGame.jpeg',
        'precio' => 59.99
    ]
];

// Obtener los datos del juego
if (isset($juegos[$juego_id])) {
    $juego = $juegos[$juego_id];
    $nombre_juego = $juego['nombre'];
    $imagen_url = $juego['imagen'];
    $precio = $juego['precio'];
} else {
    // Si el juego no existe, redirigir
    header('Location: juegos-ps.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formas de Pago - <?php echo htmlspecialchars($nombre_juego); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>    
        <h1>Digital <img src="img/WhatsApp Image 2024-09-22 at 11.24.44 PM.jpeg" width="40" height="40" alt=""> Store</h1>
        <nav>
            <div class="menu-toggle"></div>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="juegos.html">Juegos</a></li>
                <li><a href="recargas.html">Recargas</a></li>
                <li><a href="formas-de-pago.php">Formas de Pago</a></li>
                <li><a href="coleccionistas.html">Coleccionistas</a></li>
            </ul>
        </nav>
    </header>
    <main class="container mt-4">
        <h2>Selecciona tu forma de pago para <?php echo htmlspecialchars($nombre_juego); ?></h2>
        
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo htmlspecialchars($imagen_url); ?>" alt="Imagen de <?php echo htmlspecialchars($nombre_juego); ?>" class="img-fluid">
            </div>
            <div class="col-md-6">
                <form action="procesar_pago.php" method="POST">
                    <input type="hidden" name="juego_id" value="<?php echo htmlspecialchars($juego_id); ?>">
                    <input type="hidden" name="precio" value="<?php echo htmlspecialchars($precio); ?>">
                    
                    <div class="form-group">
                        <label for="nombre">Nombre del usuario:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Selecciona tu método de pago:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="nequi" name="metodo_pago" value="nequi" required>
                            <label class="form-check-label" for="nequi">Nequi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="bancolombia" name="metodo_pago" value="bancolombia">
                            <label class="form-check-label" for="bancolombia">Bancolombia</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Proceder al pago</button>
                </form>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>