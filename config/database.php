<?php

class DB {

    private static $instance = null;

    /**
     * Conexión a BD
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new PDO('mysql:host=127.0.0.1;dbname=terra_mx', 'root', '');
        }
        return self::$instance;
    }
}