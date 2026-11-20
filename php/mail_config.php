<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar autoloader de Composer (si no lo tienes, instala PHPMailer con composer)
require __DIR__ . '/../vendor/autoload.php';

// Función para cargar variables del .env
function loadEnv($path) {
    if (!file_exists($path)) return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with($line, '#')) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

// Producción (Hostinger): .env fuera de public_html  → ../../.env
// Local: .env en la raíz del proyecto                  → ../.env
foreach ([__DIR__ . '/../../.env', __DIR__ . '/../.env'] as $envPath) {
    if (file_exists($envPath)) { loadEnv($envPath); break; }
}

function mailerConfig() {
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USER'];
        $mail->Password   = $_ENV['SMTP_PASS'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port       = $_ENV['SMTP_PORT'];
        $mail->CharSet    = 'UTF-8';
        $mail->isHTML(true);

        // Dirección base (FROM)
        $mail->setFrom($_ENV['SMTP_USER'], 'Formulario Web Alessa Database');

        // Destinatarios principales
        if (!empty($_ENV['MAIL_TO'])) {
            foreach (explode(',', $_ENV['MAIL_TO']) as $to) {
                $mail->addAddress(trim($to));
            }
        }

        // Copia (CC)
        if (!empty($_ENV['MAIL_CC'])) {
            foreach (explode(',', $_ENV['MAIL_CC']) as $cc) {
                $mail->addCC(trim($cc));
            }
        }

        // Copia oculta (BCC) — puede llenarse dinámicamente
        if (!empty($_ENV['MAIL_BCC'])) {
            foreach (explode(',', $_ENV['MAIL_BCC']) as $bcc) {
                $mail->addBCC(trim($bcc));
            }
        }


        return $mail;
    } catch (Exception $e) {
        die('Error en configuración del correo: ' . $e->getMessage());
    }
}
?>
