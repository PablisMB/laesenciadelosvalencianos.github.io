<?php
if (isset($_POST['Email'])) {

    $email_to = "pablismb@gmail.com"; // prueba
    $email_subject = "Nuevo correo de la página web";

    function problem($error)
    {
        echo "We're sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // Validación de datos
    if (
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('Parece que tenemos un problema para mandar su mensaje, por favor inténtelo de nuevo en unos minutos.');
    }

    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'Esto no parece ser un correo electrónico...<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (strlen($message) < 2) {
        $error_message .= 'El mensaje contiene caractéres invalidos o el mensaje está vacio.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Detalles debajo.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // Headers
    $headers = 'De: ' . $email . "\r\n" .
        'Responde a: ' . $email . "\r\n" .
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    Gracias por ponerte en contacto con nosotros. Te responderemos tan rápido como podamos.

<?php
}
?>
