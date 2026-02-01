<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= isset($todo) ? 'Modifier' : 'Ajouter' ?> une tâche</title>
</head>
<body>
    <h1><?= isset($todo) ? 'Modifier' : 'Ajouter' ?> une tâche</h1>
    <form method="post">
        <label>Titre : <input type="text" name="title" value="<?= isset($todo) ? htmlspecialchars($todo['title']) : '' ?>" required></label><br><br>
        <?php if (isset($todo)): ?>
            <label><input type="checkbox" name="done" value="1" <?= $todo['done'] ? 'checked' : '' ?>> Faite</label><br><br>
        <?php endif; ?>
        <button type="submit">Enregistrer</button>
        <a href="../index.php">Annuler</a>
    </form>
</body>
</html>
