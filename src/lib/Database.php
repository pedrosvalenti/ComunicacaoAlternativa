<?php
// src/lib/Database.php - simple PDO wrapper (configure config/config.php)
class Database {
    private static $pdo = null;
    public static function get(){
        if(self::$pdo) return self::$pdo;
        $cfg = require __DIR__.'/../../config/config.php';
        $dsn = "mysql:host={$cfg['host']};dbname={$cfg['dbname']};charset=utf8mb4";
        self::$pdo = new PDO($dsn, $cfg['user'], $cfg['pass']);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$pdo;
    }
}
