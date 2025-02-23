<?php
include('db.php');

// Fetch tasks function to return HTML of tasks
function fetch_tasks() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $task_html = '';
    foreach ($tasks as $task) {
        $task_html .= '<li data-id="' . $task['id'] . '" class="' . ($task['is_completed'] ? 'completed' : '') . '">';
        $task_html .= '<span class="task-text">' . htmlspecialchars($task['task_name']) . '</span>';
        $task_html .= '<button class="complete-btn">Completed</button>';
        $task_html .= '<button class="delete-btn">Delete</button>';
        $task_html .= '</li>';
    }

    return $task_html;
}

// Add a task
if (isset($_POST['task_name'])) {
    $task_name = $_POST['task_name'];
    $stmt = $pdo->prepare("INSERT INTO tasks (task_name) VALUES (:task_name)");
    $stmt->execute(['task_name' => $task_name]);

    
    echo fetch_tasks();
    exit;
}

// Update task status )
if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    $stmt = $pdo->prepare("UPDATE tasks SET is_completed = NOT is_completed WHERE id = :task_id");
    $stmt->execute(['task_id' => $task_id]);


    echo fetch_tasks();
    exit;
}

// Delete task
if (isset($_POST['delete_task_id'])) {
    $delete_task_id = $_POST['delete_task_id'];
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :task_id");
    $stmt->execute(['task_id' => $delete_task_id]);

    // After deleting, return the updated task list HTML
    echo fetch_tasks();
    exit;
}


echo fetch_tasks();
?>
