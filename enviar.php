<?php
if (isset($_POST['mensaje'], $_POST['email'])) {
    $mensaje = htmlspecialchars($_POST['mensaje']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if ($email) {
        $to = $email;
        $subject = "Recepción de CV";
        $body = "Hemos recibido tu CV. Nos pondremos en contacto pronto.";
        $headers = "From: mayragutierrezc04@gmail.com\r\n";
        $headers .= "Reply-To: mayragutierrezc04@gmail.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        ini_set("SMTP", "smtp.gmail.com");
        ini_set("smtp_port", "587");
        ini_set("sendmail_from", "mayragutierrezc04@gmail.com");

        if (mail($to, $subject, $body, $headers)) {
            echo "Correo enviado exitosamente";
        } else {
            echo "Error al enviar correo. Verifica la configuración del servidor.";
        }
    } else {
        echo "Correo inválido";
    }
} else {
    echo "Faltan datos";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resumen del CV</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
</html>