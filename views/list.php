<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista danych</title>
</head>

<body>
    <h1>Moja domowa blioteczka MVC</h1>
    <h2>Dodawanie książki</h2>

    <!-- Formularz do dodawania nowego rekordu -->
    <form method="POST" action="index.php">
        <input type="hidden" name="action" value="addbook">
        <label for="title">Nazwa:</label>
        <input type="text" id="title" name="title" required>
        <label for="author">Autor:</label>
        <input type="text" id="author" name="author" required>
        <label for="year">Rok:</label>
        <input type="number" id="year" name="year" required>
        <label for="genre">Gatunek:</label>
        <input type="text" id="genre" name="genre" required>
        <label for="shelf">Półka:</label>
        <input type="text" id="shelf" name="shelf" required>
        <button type="submit">Dodaj</button>
    </form>
    <h2>Lista rekordów</h2>
    <ul style="list-style-type:none;">
        <?php foreach ($records as $record): ?>
            <li>
                <!-- Przycisk do usunięcia rekordu -->
                <form method="POST" action="index.php" style="display:inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                    <button type="submit">DEL</button>
                </form>
                <!-- Przycisk do edycji -->
                <form method="POST" action="index.php" style="display:inline;">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                    <button type="submit">EDIT</button>
                </form>
                <?php echo htmlspecialchars($record['id'] . ', ' . $record['title'] . ', ' . $record['author'] . ', ' . $record['year'] . ', ' . $record['genre'] . ', ' . $record['shelf'] . ' '); ?>

            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>