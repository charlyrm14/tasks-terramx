# CRUD Tareas TerraMX

Administración de tareas

## Tecnologías utilizadas

- PHP (nativo)
- MySQL
- JavaScript
- Tailwind CSS
- HTML5
- CSS3

## Funcionalidades

- Crear tareas
- Editar tareas
- Eliminar tareas
- Comunicación frontend/backend vía AJAX

### Pre-requisitos 📋

- PHP >= 8.1.29
- MySQL >= 8.3.0

### Instalación 🔧

```
php -S 127.0.0.1:8000
```

Crear BD

CREATE DATABASE `terra_mx` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

CREATE TABLE terra_mx.tasks (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`task_name` VARCHAR(120) NOT NULL,
  	`description` TEXT NULL,
  	`status` ENUM('pendiente', 'en_espera', 'en_progreso', 'en_revision', 'completada') NOT NULL DEFAULT 'pendiente',
  	`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	PRIMARY KEY (`id`)
);

## Autores ✒️

* **Carlos I. Ramos Morales** 
