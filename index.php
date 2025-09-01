<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "movietvshowreview";
$connection = new mysqli($host, $user, $password, $db);
if ($connection->connect_error) die("Connection Failed: " . $connection->connect_error);
$data = $connection->query("SELECT * FROM movies");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📋 All Movies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="movie-body">
    <div class="container">
        <h1>📋 All Movies / TV Shows</h1>

        <div class="top-links">
            <a href="create.php" class="btn">➕ Add Movie / TV Show</a>
            <a href="home.php" class="btn">🏠 Home</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $data->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['genre']) ?></td>
                    <td><?= $row['year'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>" class="edit-btn">✏️ Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="delete-btn">🗑 Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
