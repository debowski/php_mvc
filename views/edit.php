<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja rekordu</title>
</head>

<body>
    <h1>Edycja rekordu</h1>
    <form method="POST" action="index.php">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($record['id']); ?>">
        <label for="title">Nazwa:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($record['title']); ?>" required>
        <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($record['author']); ?>" required>
        <input type="number" id="year" name="year" value="<?php echo htmlspecialchars($record['year']); ?>" required>
        <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($record['genre']); ?>" required>
        <input type="text" id="shelf" name="shelf" value="<?php echo htmlspecialchars($record['shelf']); ?>" required>
        <button type="submit">Zapisz</button>
    </form>
    <a href="index.php">Wróć do listy</a>
</body>

</html>