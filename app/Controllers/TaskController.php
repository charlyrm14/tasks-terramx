<?php

require 'app/Models/Task.php';

class TaskController {

    public function home()
    {
        $model = new Task();
        $tasks = $model->getAllTasks();
        $status_color = [
            'pendiente' => 'bg-gray-200 border-1 border-gray-700 text-gray-600',
            'en_espera' => 'bg-violet-200 border-1 border-violet-400 text-violet-800',
            'en_progreso' => 'bg-yellow-200 border-1 border-yellow-400 text-yellow-800',
            'en_revision' => 'bg-blue-200 border-1 border-blue-400 text-blue-800',
            'completada' => 'bg-green-200 border-1 border-green-400 text-green-800'
        ];
        $message = [];

        require VIEWS_PATH . '/home.php';
    }
    
    public function add()
    {
        $error = [];
        require VIEWS_PATH . '/add.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Valida que la petición se haya enviado a través del método POST
            
            $task_name = $_POST['task_name'];
            $description = $_POST['description'];
            $error = [];

            /**
             * Validación formulario
            */
            if(empty($task_name) || empty($description)) {
                $error['task_name'] = 'El nombre de la tarea es obligatorio';
                $error['description'] = 'La descripción de la tarea es obligatorio';
                require VIEWS_PATH . '/add.php';
            } 

            /**
             * Crea nueva tarea
             */
            try {
                
                $task = new Task();
                $task->insert($task_name, $description);

            } catch (Exception $e) {
                header("Location: /add");
            }
            
            header("Location: /");
            exit;  

        } else {

            /**
             * Si se accede directamente por URL reedirige a página de inicio
             */

            header("Location: /");
            exit;
        }
    }
}