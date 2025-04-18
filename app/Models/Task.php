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

    /**
     * Obtiene tarea por id
     */
    public function getTaskById(int $id)
    {
        // Se previene inyección SQL
        $stmt = $this->db->prepare('SELECT * FROM tasks WHERE id = :id');

        // Sanitización de la entrada
        $id = filter_var($id, FILTER_VALIDATE_INT);

        // Se vincula el parámetro :id 
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Obtenemos el tarea
        $task = $stmt->fetch();

        return $task;
    }

    /**
     * Actualiza una tarea por id
     */
    public function updateTaskById(int $id, string $task_name, string $description, string $status)
    {       
        // Se previene inyección SQL
        $stmt = $this->db->prepare(
            "UPDATE tasks 
            SET 
                task_name = :task_name, 
                description = :description,
                status = :status
            WHERE id = :id"
        );
        $stmt->bindParam(':task_name', $task_name); // Vincula la variable task_name con la columna de la tabla
        $stmt->bindParam(':description', $description); // Vincula la variable description con la columna de la tabla
        $stmt->bindParam(':status', $status); // Vincula la variable status con la columna de la tabla
        $stmt->bindParam(':id', $id,  PDO::PARAM_INT);

        return $stmt->execute(); // Devuelve true si fue exitoso
    }
}