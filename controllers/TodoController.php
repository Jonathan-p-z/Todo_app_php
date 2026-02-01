<?php
require_once __DIR__ . '/../models/Todo.php';
require_once __DIR__ . '/../config/database.php';

$todoModel = new Todo($pdo);

$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            if ($title) {
                $todoModel->create($title);
                header('Location: ../index.php');
                exit;
            }
        }
        include __DIR__ . '/../views/form.php';
        break;
    case 'edit':
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: ../index.php'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $done = isset($_POST['done']) ? 1 : 0;
            $todoModel->update($id, $title, $done);
            header('Location: ../index.php');
            exit;
        }
        $todo = $todoModel->get($id);
        include __DIR__ . '/../views/form.php';
        break;
    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $todoModel->delete($id);
        }
        header('Location: ../index.php');
        exit;
    default:
        $todos = $todoModel->getAll();
        include __DIR__ . '/../views/list.php';
        break;
}
