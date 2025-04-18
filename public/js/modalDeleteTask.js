const modalDelete = document.getElementById("modalDelete");
const openModalDeleteTask = document.getElementById("openModalDeleteTask");
const closeModal = document.getElementById("closeModal");
const cancelDelete = document.getElementById("cancelDelete");
const modalContent = document.getElementById("modalContent");
const btnDeleteTask = document.getElementById("deleteTask");
const taskText = document.getElementById('taskText');
let taskIdInput = document.getElementById('taskIdInput');

// Abre modal al hacer click sobre el botón del registro seleccionado y remueve la clase css hidden y agrega la clase flex
openModalDeleteTask.addEventListener("click", () => {
    modalDelete.classList.remove("hidden");
    modalDelete.classList.add("flex");
});

// Cierra modal al hacer click sobre botón "x"
closeModal.addEventListener("click", () => {
    modalDelete.classList.add("hidden");
});

// Cierra modal al dar click sobre el botón cancelar
cancelDelete.addEventListener("click", () => {
    modalDelete.classList.add("hidden");
});

// Cierra modal al hacer clic fuera
modalDelete.addEventListener("click", (e) => {
    if (!modalContent.contains(e.target)) {
        modalDelete.classList.add("hidden");
    }
});

// Elimina tarea
document.addEventListener('click', function (e) {

    // Si se dio click sobre el elemento que tiene la clase dataTaskModalDelete
    if (e.target.closest('.dataTaskModalDelete')) {

        const btn = e.target.closest('.dataTaskModalDelete');
        const taskId = btn.getAttribute('data-task-id');
        const taskName = btn.getAttribute('data-task-name');
        
        taskText.textContent = `¿Estas seguro de querer eliminar la tarea "${taskName}" ?`;
        taskIdInput.value = taskId;
        modalDelete.classList.remove('hidden');
        modalDelete.classList.add('flex');

        btnDeleteTask.addEventListener("click", (e) => {
            e.preventDefault()
            if (!taskId) return;
            if (taskId !== 0) {
                
                const url = window.location.href + 'delete'

                $.ajax({
                    url: url,
                    method: 'GET',
                    data: { id: taskId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            modalDelete.classList.add("hidden");

                            // Elimina del DOM la tarea eliminada
                            const divTask = document.getElementById(`div-element-${taskId}`)
                            divTask.remove()
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                    }
                });                
            }
        })
    }
});