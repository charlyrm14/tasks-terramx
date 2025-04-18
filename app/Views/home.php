<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terra MX | Inicio </title>
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

    <main class="mt-10 px-10 py-5">

        <h1 class="text-2xl"> Tareas </h1>
        <div class="flex justify-between items-center">
            <p class="text-indigo-600"> Lista de tareas (<?= count($tasks) ?>) </p>
            <a class="bg-black text-white rounded px-4 py-2 flex items-center gap-2 cursor-pointer hover:opacity-75"
                href="/add">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg> Nueva tarea
            </a>
        </div>

        <section class="mt-15">

            <?php
                if(count($tasks) > 0):
                foreach($tasks as $task):
            ?>
                <div class="border-1 border-gray-300 rounded shadow-md mb-5" id="div-element-<?= $task['id'] ?>">
                    <div class="flex justify-between gap-x-6 py-3 ">
                        <div class="flex min-w-0 gap-x-3 items-center px-3">
                            <div class="bg-gray-300 p-3 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-18">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                </svg>
                                
                            </div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm text-gray-600 mb-3 mt-1"> 
                                    Nombre tarea: 
                                    <span class="block text-xl text-indigo-600"> <?= $task['task_name'] ?> </span>
                                </p>
                                <p class="text-sm text-gray-600"> 
                                    Descripción tarea: 
                                        <span class="block text-lg text-indigo-600"> <?= $task['description'] ?> </span>
                                </p> 
                            </div>
                        </div>
                    </div>
                    <div class="px-5 mt-3">
                        <div class="border-b-1 border-gray-300 mb-4"></div>
                        <div class="mb-2">
                            <p class="uppercase mb-3 text-indigo-500">
                                Estatus de la tarea
                            </p>
                            <div class="flex justify-start gap-5">
                                <p class='flex items-center gap-2 uppercase mb-2 px-5 py-1 rounded-lg <?= $status_color[$task["status"]] ?>'>
                                    <?= str_replace('_', ' ', $task['status']) ?>
                                </p>
                            </div> 
                        </div>
                        <div class="border-b-1 border-gray-300 mb-4"></div>
                        <div class="flex justify-between items-center mb-8">
                            <p class="uppercase"> 
                                Acciones 
                            </p>
                            <div class="flex items-center gap-5">
                                <a  href='/edit?id=<?= $task['id'] ?>'
                                    class="border border-gray-300 rounded-lg py-2 px-4 flex items-center uppercase cursor-pointer hover:bg-blue-500 hover:text-white">
                                        Editar 
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                        </svg>
                                </a>
                                <button 
                                    id="openModalDeleteTask"
                                    class="text-gray-400 cursor-pointer hover:text-red-500 dataTaskModalDelete"
                                    data-task-id="<?= $task['id'] ?>"
                                    data-task-name="<?= $task['task_name'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php 
                endforeach;
                else:
            ?>

                <div class="flex justify-center mt-15">
                    <a href="#" class="underline uppercase text-indigo-500 cursor-pointer"> Aún no hay tareas, se el primero en agregar una </a>
                </div>

            <?php
                endif;
            ?>

        </section>

    </main>

    <!-- Modal eliminar modal-->
    <div id="modalDelete" class="fixed inset-0 bg-opacity-40 hidden justify-center items-center z-50 backdrop-blur-sm">
        <div id="modalContent" class="bg-white p-6 rounded-xl shadow-lg max-w-md w-full">
            <div class="flex justify-between items-center ">
                <h2 class="text-xl font-semibold uppercase text-gray-500">
                    Eliminar tarea
                </h2>
                <button 
                    id="closeModal"
                    class="text-red-400 text-normal cursor-pointer border border-red-400 rounded-lg hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                </button>
            </div>
            <div class="border-b-1 border-gray-200 mt-3"></div>
            <h4 class="my-12 text-xl uppercase text-center text-red-400" id="taskText"></h4>
            <div class="border-b-1 border-gray-200 mt-3"></div>
            <form action="">
                <input type="hidden" name="task_id" value="" id="taskIdInput">
                <div class="mt-5 flex justify-between items-center">
                    <button
                        id="cancelDelete"
                        class="bg-black text-white px-5 py-2 rounded-lg uppercase cursor-pointer ">
                            Cancelar
                    </button>
                    <button
                        id="deleteTask"
                        class="text-red-500 border border-red-500 px-5 py-2 rounded-lg uppercase hover:bg-red-500 hover:text-white cursor-pointer">
                            Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="../../public/js/modalDeleteTask.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>