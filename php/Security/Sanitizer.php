<?php

class Sanitizer {

    public static function cleanString($value) {
        $value = trim($value);
        $value = strip_tags($value); // No HTML
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

        // Eliminar JS inline
        $value = preg_replace('/on\w+=".*?"/i', '', $value);

        // Remover URLs sospechosas
        $value = preg_replace('/(javascript:|data:)/i', '', $value);

        return $value;
    }

    public static function cleanEmail($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : false;
    }

    public static function cleanPhone($phone) {
        return preg_replace('/[^0-9\+\-\s]/', '', $phone);
    }

    public static function containsMaliciousPayload($value) {
        $patterns = [
            '/<script/i',
            '/javascript:/i',
            '/<iframe/i',
            '/onerror=/i',
            '/onload=/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $value)) {
                return true;
            }
        }
        return false;
    }
}
