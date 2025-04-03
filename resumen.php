<?php
if (isset($_GET['nombre'], $_GET['email'], $_GET['telefono'], $_GET['profesion'], $_GET['experiencia'], $_GET['habilidades'], $_GET['idiomas'], $_GET['titulo'], $_GET['institucion'], $_GET['anio_finalizacion'])) {
    $nombre = htmlspecialchars($_GET['nombre']);
    $email = htmlspecialchars($_GET['email']);
    $telefono = htmlspecialchars($_GET['telefono']);
    $profesion = htmlspecialchars($_GET['profesion']);
    $experiencia = htmlspecialchars($_GET['experiencia']);
    $habilidades = htmlspecialchars($_GET['habilidades']);
    $idiomas = htmlspecialchars($_GET['idiomas']);
    $titulo = htmlspecialchars($_GET['titulo']);
    $institucion = htmlspecialchars($_GET['institucion']);
    $anio_finalizacion = htmlspecialchars($_GET['anio_finalizacion']);
    $proyectos = isset($_GET['proyectos']) ? htmlspecialchars($_GET['proyectos']) : "No especificado";
    $referencias = isset($_GET['referencias']) ? htmlspecialchars($_GET['referencias']) : "No especificado";

    $mensaje = "<strong>Resumen del CV</strong><br>";
    $mensaje .= "<strong>Nombre:</strong> $nombre<br>";
    $mensaje .= "<strong>Email:</strong> $email<br>";
    $mensaje .= "<strong>Teléfono:</strong> $telefono<br>";
    $mensaje .= "<strong>Profesión:</strong> $profesion<br>";
    $mensaje .= "<strong>Experiencia:</strong> $experiencia<br>";
    $mensaje .= "<strong>Habilidades:</strong> $habilidades<br>";
    $mensaje .= "<strong>Idiomas:</strong> $idiomas<br>";
    $mensaje .= "<strong>Educación:</strong> $titulo en $institucion, finalizado en $anio_finalizacion<br>";
    $mensaje .= "<strong>Proyectos:</strong> $proyectos<br>";
    $mensaje .= "<strong>Referencias:</strong> $referencias<br>";
    $mensaje = nl2br($mensaje);
} else {
    die("Faltan datos");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resumen del CV</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header> 
        <h2>Resumen generado</h2>
    </header>
    <div id="mensaje"><?php echo $mensaje; ?></div>
    <form action="enviar.php" method="POST">
        <input type="hidden" name="mensaje" value="<?php echo strip_tags($mensaje); ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <button type="submit">Enviar CV</button>
    </form>
</body>
</html>
