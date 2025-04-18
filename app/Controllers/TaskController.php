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
    
}