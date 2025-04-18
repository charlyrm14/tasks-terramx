<?php

class Task {

    private $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    /**
     * Obtiene todas las tareas
     */
    public function getAllTasks()
    {
        // Se previene inyección SQL
        $stmt = $this->db->prepare('SELECT * FROM tasks ORDER BY id DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}