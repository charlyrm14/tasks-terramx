# CRUD Tareas TerraMX

Administración de tareas

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

* **Carlos I. Ramos Morales** - *Trabajo Inicial* - [charlyrm14]([https://github.com/villanuevand](https://github.com/charlyrm14))
