<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
    <style>table,th,td{border:1px solid #ccc;border-collapse:collapse;padding:8px;}a{margin:0 5px;}</style>
</head>
<body>
    <h1>Liste des tâches</h1>
    <a href="controllers/TodoController.php?action=add">Ajouter une tâche</a>
    <table>
        <tr><th>Titre</th><th>Faite</th><th>Actions</th></tr>
        <?php foreach ($todos as $todo): ?>
        <tr>
            <td><?= htmlspecialchars($todo['title']) ?></td>
            <td><?= $todo['done'] ? 'Oui' : 'Non' ?></td>
            <td>
                <a href="controllers/TodoController.php?action=edit&id=<?= $todo['id'] ?>">Modifier</a>
                <a href="controllers/TodoController.php?action=delete&id=<?= $todo['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
