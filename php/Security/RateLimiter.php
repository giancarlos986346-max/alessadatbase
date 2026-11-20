<?php

class RateLimiter {

    private $file;
    private $limit = 2;          // máximo envíos permitidos
    private $window = 5;       // ventana de 10 minutos
    private $blockTime = 10;   // bloqueo por 30 minutos

    public function __construct($formName = null) {
        $this->file = __DIR__ . '/ratelimit.json';

        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
    }

    public function check() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $data = json_decode(file_get_contents($this->file), true);

        // Crear registro si la IP no existe
        if (!isset($data[$ip])) {
            $data[$ip] = ['count' => 0, 'last' => time()];
        }

        // Bloqueo activo
        if (isset($data[$ip]['blocked_until']) && time() < $data[$ip]['blocked_until']) {
            return false;
        }

        // Reiniciar ventana si ya pasó el tiempo
        if (time() - $data[$ip]['last'] > $this->window) {
            $data[$ip]['count'] = 0;
        }

        // Incrementar contador
        $data[$ip]['count']++;
        $data[$ip]['last'] = time();

        // Excede límite → bloquear
        if ($data[$ip]['count'] > $this->limit) {
            $data[$ip]['blocked_until'] = time() + $this->blockTime;
            file_put_contents($this->file, json_encode($data));
            return false;
        }

        // 🔥 Limpieza automática: borrar IPs inactivas por más de 3 ventanas
        // (Aquí 30 minutos = 3 * 10)
        $expiration = $this->window * 3;

        foreach ($data as $ipKey => $info) {
            if (isset($info['last']) && (time() - $info['last']) > $expiration) {
                unset($data[$ipKey]); // borrar IP inactiva
            }
        }

        // Guardar cambios
        file_put_contents($this->file, json_encode($data));

        return true;
    }
}
