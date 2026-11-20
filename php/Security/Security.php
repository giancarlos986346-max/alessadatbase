<?php
require_once __DIR__ . '/Sanitizer.php';
require_once __DIR__ . '/RateLimiter.php';
require_once __DIR__ . '/Logger.php';

class Security {

    private $formName;
    private $rateLimiter;

    public function __construct($formName) {
        $this->formName = $formName;
        $this->rateLimiter = new RateLimiter($formName);
    }

    public function validate($data) {

        // 1. Rate limit
        if (!$this->rateLimiter->check()) {
            Logger::log("Bloqueo por rate limit en formulario $this->formName");
            return ['error' => 'Demasiados intentos. Inténtalo más tarde.'];
        }

        $clean = [];

        foreach ($data as $key => $value) {
            if (Sanitizer::containsMaliciousPayload($value)) {
                Logger::log("Payload malicioso detectado en campo '$key' → $value");
                return ['error' => 'Datos no válidos detectados.'];
            }

            if ($key === "email") {
                $value = Sanitizer::cleanEmail($value);
                if (!$value) {
                    return ['error' => 'Correo inválido'];
                }
            } elseif ($key === "phone") {
                $value = Sanitizer::cleanPhone($value);
            } else {
                $value = Sanitizer::cleanString($value);
            }

            $clean[$key] = $value;
        }

        return $clean;
    }
}
