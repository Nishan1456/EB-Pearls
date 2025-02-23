function toggleMenu() {
    const menu = document.querySelector(".menu-links");
    const icon = document.querySelector(".hamburger-icon");
    menu.classList.toggle("open");
    icon.classList.toggle("open");
  }
document.addEventListener('DOMContentLoaded', function() {
    const taskForm = document.getElementById('taskForm');
    const taskInput = document.getElementById('taskInput');
    const taskList = document.getElementById('taskList');

    taskForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const taskName = taskInput.value;

        // Use Fetch API to add task
        fetch('tasks.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `task_name=${encodeURIComponent(taskName)}`
        })
        .then(response => response.text())
        .then(data => {
            taskInput.value = '';
            fetchTasks(); // Reload tasks after adding
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Mark a task as completed or delete
    taskList.addEventListener('click', function(event) {
        const taskItem = event.target.closest('li');
        const taskId = taskItem.getAttribute('data-id');

        if (event.target.classList.contains('complete-btn')) {
            // Use Fetch API to mark task as completed
            fetch('tasks.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `task_id=${taskId}`
            })
            .then(response => response.text())
            .then(data => {
                fetchTasks(); // Reload tasks after completion update
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        if (event.target.classList.contains('delete-btn')) {
            // Use Fetch API to delete task
            fetch('tasks.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `delete_task_id=${taskId}`
            })
            .then(response => response.text())
            .then(data => {
                fetchTasks(); // Reload tasks after deletion
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });

    // Fetch tasks and display them
    function fetchTasks() {
        fetch('tasks.php')
            .then(response => response.text())
            .then(data => {
                taskList.innerHTML = data; // Update the task list with new tasks
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    fetchTasks(); 
});
