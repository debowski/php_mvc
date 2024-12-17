<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista danych</title>
</head>
<body>
    <h1>Lista rekordów</h1>
    <ul>
        <?php foreach ($records as $record): ?>
            <li><?php echo htmlspecialchars($record['name']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>