<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "movietvshowreview"; // ✅ movie DB
$connection = new mysqli($host, $user, $password, $db);

if ($connection->connect_error) {
    die("CONNECTION FAILED: " . $connection->connect_error);
}

// ✅ Get movie ID from URL
$id = $_GET['id'] ?? null;

if (!$id) {
    die("Movie ID not specified!");
}

// ✅ Delete the movie
$connection->query("DELETE FROM movies WHERE id=$id");

// ✅ Redirect to movie list
header("location: index.php");
exit;
?>
