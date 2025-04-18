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

    /**
     * Registra una nueva tarea
     */
    public function insert(string $task_name, string $description) 
    {
        // Se previene inyección SQL
        $stmt = $this->db->prepare("INSERT INTO tasks (task_name, description) VALUES (:task_name, :description)");
        $stmt->bindParam(':task_name', $task_name); // Vincula la variable task_name con la columna de la tabla
        $stmt->bindParam(':description', $description); // Vincula la variable description con la columna de la tabla

        return $stmt->execute(); // Devuelve true si fue exitoso
    }
}