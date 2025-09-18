<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $numero = htmlspecialchars($_POST['numero']);
    $correo = htmlspecialchars($_POST['correo']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Configuración del correo
    $destinatario = "fernando.maranzano.ecoplastica@gmail.com"; // CAMBIA AQUÍ AL TUYO
    $titulo = "Nuevo mensaje desde la web: $asunto";
    $contenido = "
    Nombre: $nombre\n
    Número de contacto: $numero\n
    Correo: $correo\n
    Asunto: $asunto\n
    Mensaje:\n$mensaje
    ";

    $headers = "From: $correo\r\n";
    $headers .= "Reply-To: $correo\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($destinatario, $titulo, $contenido, $headers)) {
        echo "<h2>¡Mensaje enviado con éxito!</h2>";
        echo "<a href='contacto.html'>Volver</a>";
    } else {
        echo "<h2>Error al enviar el mensaje. Intente más tarde.</h2>";
    }
} else {
    echo "Método no permitido.";
}
?>