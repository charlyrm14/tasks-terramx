<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terra MX | Editar tarea</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gidole&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Winky+Rough:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/styles/style.css">
</head>
<body class="bg-gray-100">

    <header class="container mx-auto px-6 py-4 flex justify-end items-center">
        <p class="text-xl"> ¡Hola, bienvenido!  </p>
    </header>

    <main class="flex items-center justify-center h-screen px-3">
        <div class="p-8 rounded-lg shadow-xl border border-gray-200 w-180">
            <h1 class="text-2xl"> <?= $task['task_name'] ?> </h1>
            <p class="text-indigo-600 block"> Modifica la información de la tarea </p>

            <form action="/update?id=<?= $task['id'] ?>" method="POST" class="mt-10">

                <div class="mb-5">
                    <label for="task_name" class="uppercase block"> Nombre tarea </label>
                    <input 
                        type="text"
                        id="task_name"
                        name="task_name"
                        placeholder="Ej: Sitio web"
                        class="mt-3 w-full px-2 p-3 border border-gray-300 rounded-lg"
                        value="<?= $task['task_name'] ?>"
                        required/>
                        
                    <?php if(isset($error['task_name'])):  ?>
                        <span class="text-red-500 mt-3 px-2"> <?= $error['task_name'] ?> </span>
                    <?php endif; ?>
                </div>

                <div class="mb-5">
                    <label for="description" class="uppercase block"> Descripción tarea </label>
                    <textarea 
                        id="description"
                        name="description"
                        placeholder="Agrega información detallada de tu tarea"
                        class="mt-3 w-full px-2 p-3 border border-gray-300 rounded-lg"
                        required> <?= $task['description'] ?> </textarea>
                    <?php if(isset($error['description'])):  ?>
                        <span class="text-red-500 mt-3 px-2"> <?= $error['description'] ?> </span>
                    <?php endif; ?>
                </div>

                <div class="mb-5">
                    <label for="status" class="uppercase block"> Estatus tarea </label>
                    <select 
                        id="status"
                        name="status"
                        class="mt-3 w-full px-2 p-3 border border-gray-300 rounded-lg" required>
                            <option value=""> -- Selecciona -- </option>
                            <option value="pendiente" <?= $task['status'] == "pendiente" ? 'selected' : '' ?> > Pendiente </option>
                            <option value="en_espera" <?= $task['status'] == "en_espera" ? 'selected' : '' ?>> En Espera </option>
                            <option value="en_progreso" <?= $task['status'] == "en_progreso" ? 'selected' : '' ?>> En progreso </option>
                            <option value="en_revision" <?= $task['status'] == "en_revision" ? 'selected' : '' ?>> En revisión </option>
                            <option value="completada" <?= $task['status'] == "completada" ? 'selected' : '' ?>> Completada </option>
                    </select>
                    <?php if(isset($error['status'])):  ?>
                        <span class="text-red-500 mt-3 px-2"> <?= $error['status'] ?> </span>
                    <?php endif; ?>
                </div>

                <div class="flex justify-between items-center mt-7">
                    <a  href="/"
                        class="uppercase border border-red-500 text-red-500 py-2 px-3 rounded-lg cursor-pointer hover:bg-red-500 hover:text-white">
                            Cancelar
                    </a>
                    <button class="uppercase bg-black text-white py-2 px-5 rounded-lg cursor-pointer flex items-center gap-2 hover:opacity-75">
                        Editar tarea 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                    </button>
                </div>

            </form>

        </div>
    </main>

    
</body>
</html>