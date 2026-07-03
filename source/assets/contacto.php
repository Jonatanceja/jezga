<?php
/**
 * Handler del formulario de contacto — JEZGA (PHPMailer vía SMTP)
 *
 * · Destinatarios: se generan desde config.php (contact.emails) hacia
 *   contacto-destinatarios.json durante el build de Jigsaw.
 * · Credenciales SMTP: en contacto-smtp-config.php (editar en el servidor).
 * · PHPMailer embebido en lib/phpmailer/ (no requiere Composer en el hosting).
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/lib/phpmailer/Exception.php';
require __DIR__ . '/lib/phpmailer/PHPMailer.php';
require __DIR__ . '/lib/phpmailer/SMTP.php';

$redirect = function (string $estado) {
    header('Location: /contacto?estado=' . $estado . '#contacto-form');
    exit;
};

// --- Destinatarios (desde config.php via JSON generado en build) ------------
$recipients = json_decode(@file_get_contents(__DIR__ . '/contacto-destinatarios.json'), true);
if (!is_array($recipients) || $recipients === []) {
    $recipients = ['jezga.co@gmail.com', 'jezga.proyectos@gmail.com'];
}

// --- Config SMTP ------------------------------------------------------------
$smtp = @include __DIR__ . '/contacto-smtp-config.php';
if (!is_array($smtp)) {
    $smtp = [];
}

// --- Validación de la petición ---------------------------------------------
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    $redirect('error');
}

// Honeypot anti-spam.
if (!empty($_POST['website'] ?? '')) {
    $redirect('ok');
}

$clean = fn ($v) => trim(filter_var((string) $v, FILTER_SANITIZE_FULL_SPECIAL_CHARS));

$nombre   = $clean($_POST['nombre'] ?? '');
$email    = filter_var(trim((string) ($_POST['email'] ?? '')), FILTER_SANITIZE_EMAIL);
$telefono = $clean($_POST['telefono'] ?? '');
$tipo     = $clean($_POST['tipo'] ?? '');
$mensaje  = $clean($_POST['mensaje'] ?? '');

if ($nombre === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $mensaje === '') {
    $redirect('invalido');
}

// --- Armado del correo ------------------------------------------------------
$asunto = 'Nueva solicitud de contacto' . ($tipo !== '' ? ' — ' . $tipo : '');

$cuerpo  = "Nueva solicitud desde jezga.com.mx\n";
$cuerpo .= str_repeat('-', 42) . "\n\n";
$cuerpo .= "Nombre:            {$nombre}\n";
$cuerpo .= "Correo:            {$email}\n";
$cuerpo .= "Teléfono de obra:  {$telefono}\n";
$cuerpo .= "Tipo de proyecto:  {$tipo}\n\n";
$cuerpo .= "Mensaje:\n{$mensaje}\n";

// --- Envío vía SMTP ---------------------------------------------------------
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = $smtp['host'] ?? '';
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp['username'] ?? '';
    $mail->Password   = $smtp['password'] ?? '';
    $mail->Port       = (int) ($smtp['port'] ?? 587);
    $mail->SMTPSecure = ($smtp['encryption'] ?? 'tls') === 'ssl'
        ? PHPMailer::ENCRYPTION_SMTPS
        : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->CharSet    = PHPMailer::CHARSET_UTF8;

    $mail->setFrom($smtp['from_email'] ?? 'no-reply@jezga.com.mx', $smtp['from_name'] ?? 'JEZGA Web');
    foreach ($recipients as $to) {
        $mail->addAddress($to);
    }
    $mail->addReplyTo($email, $nombre);

    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;

    $mail->send();
    $redirect('ok');
} catch (Exception $e) {
    error_log('Contacto JEZGA — error SMTP: ' . $mail->ErrorInfo);
    $redirect('error');
}
