<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json'); // 👈 IMPORTANTE

require(__DIR__ . '/mail_config.php');
require(__DIR__ . '/Security/Security.php');

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode([
        "status" => "error",
        "message" => "Acceso no permitido."
    ]);
    exit;
    }
    
    // Inicializamos el módulo de seguridad
    $security = new Security("contactForm");

    // Validamos y limpiamos
    $clean = $security->validate($_POST);

    if (isset($clean['error'])) {
    echo json_encode(["status" => "error", "message" => $clean['error']]);
    exit;
    }

    $name     = htmlspecialchars(trim($_POST['name']));
    $phone    = htmlspecialchars(trim($_POST['phone']));
    $email    = htmlspecialchars(trim($_POST['email']));
    $company  = htmlspecialchars(trim($_POST['company']));
    $service  = htmlspecialchars(trim($_POST['service']));
    $message  = htmlspecialchars(trim($_POST['message']));

    if (!$name || !$email || !$company || !$service) {
        echo json_encode([
        "status" => "error",
        "message" => "Por favor completa los campos obligatorios."
        ]);
        exit;
    }

    // Envío de correo
    $mail = mailerConfig();

    // ✅ Asunto personalizado
    $mail->Subject = "Alessa Database - Nuevo formulario";

    // 📄 Cargamos la plantilla HTML
    $templatePath = __DIR__ . '/form_email_template.html';
    if (!file_exists($templatePath)) {
        echo json_encode([
        "status" => "error",
        "message" => "No se encontró la plantilla de correo."
        ]);
        exit;
    }

    $body = file_get_contents($templatePath);

    // 🔁 Reemplazamos los placeholders por los valores del formulario
    $replacements = [
        '{name}'    => $name,
        '{phone}'   => $phone ?: 'No especificado',
        '{email}'   => $email,
        '{company}' => $company,
        '{service}' => ucfirst($service),
        '{message}' => $message ?: '(Sin mensaje adicional)'
    ];

    $body = strtr($body, $replacements);

    // ✉️ Configuramos el correo
    $mail->Body = $body;

    try {
        $mail->send();
        echo json_encode([
        "status" => "success",
        "message" => "Mensaje enviado correctamente."
        ]);
    } catch (Exception $e) {
        echo json_encode([
        "status" => "error",
        "message" => "Error al enviar: " . $mail->ErrorInfo
        ]);
    }

exit;
?>
