<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista danych</title>
</head>
<body>
    <h1>Domowa baza danych</h1>
    <h2>Wprowadzanie ksiażek</h2>
    <form method="POST" action="index.php">
        <input type="hidden" name="action" value="add">
        Tytuł: <input type="text" name="title" required><br>
        Autor: <input type="text" name="author" required><br>
        Rok wydania: <input type="number" name="year" required><br>
        Gatunek: <input type="text" name="genre" required><br>
        Polka: <input type="text" name="shelf" required><br>
        <input type="submit" value="Dodaj">
    </form>



    <h2>Lista rekordów</h2>
    <ul>
        <?php foreach ($records as $record): ?>
            <li><?php echo htmlspecialchars($record['id']." ".$record['title']." ".$record['author']." ".$record['year']." ".$record['genre']." ".$record['shelf'] ); ?>       
            <!-- Formularz do usunięcia rekordu -->
            <form method="POST" action="index.php" style="display:inline;">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                <button type="submit">Usuń</button>
            </form>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>