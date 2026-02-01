<?php
require_once __DIR__ . '/../config/database.php';

class Todo {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM todos ORDER BY id DESC');
        return $stmt->fetchAll();
    }
    public function get($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM todos WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function create($title) {
        $stmt = $this->pdo->prepare('INSERT INTO todos (title) VALUES (?)');
        return $stmt->execute([$title]);
    }
    public function update($id, $title, $done) {
        $stmt = $this->pdo->prepare('UPDATE todos SET title = ?, done = ? WHERE id = ?');
        return $stmt->execute([$title, $done, $id]);
    }
    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM todos WHERE id = ?');
        return $stmt->execute([$id]);
    }
}