<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "movietvshowreview"; // ✅ movie DB
$connection = new mysqli($host, $user, $password, $db);

if ($connection->connect_error) {
    die("CONNECTION FAILED: " . $connection->connect_error);
}

// ✅ Get movie ID safely from URL
$id = $_GET['id'] ?? null;

if (!$id) {
    die("Movie ID not specified!");
}

// ✅ Fetch movie data
$row = $connection->query("SELECT * FROM movies WHERE id=$id")->fetch_assoc();

if (!$row) {
    die("Movie not found!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie / TV Show</title>
    <link rel="stylesheet" href="style.css"> <!-- external CSS -->
</head>
<body>
    <div class="container">
        <h2>✏️ Update Movie / TV Show</h2>
        <form method="POST" class="form">
            <label>Title</label>
            <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>

            <label>Genre</label>
            <input type="text" name="genre" value="<?= htmlspecialchars($row['genre']) ?>" required>

            <label>Release Year</label>
            <input type="number" name="year" value="<?= $row['year'] ?>" min="1900" max="2099" required>

            <button type="submit" class="btn">Update Movie</button>
        </form>
        <p><a href="index.php" class="back-link">⬅ Back to Movie List</a></p>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $year  = $_POST["year"];

    $connection->query("UPDATE movies 
                        SET title='$title', genre='$genre', year='$year' 
                        WHERE id=$id");

    header("location: index.php");
    exit;
}
?>
