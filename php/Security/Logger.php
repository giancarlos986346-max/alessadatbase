<?php

class Logger {

    private static $file = __DIR__ . '/../../logs/seguridad.log';

    public static function log($message) {
        $date = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'];

        $entry = "[$date] IP $ip | $message" . PHP_EOL;

        file_put_contents(self::$file, $entry, FILE_APPEND);
    }
}
