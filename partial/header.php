<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: auth/login.php');
    exit();
}

include 'config.php';  // Sertakan file konfigurasi database

// Ambil ID pengguna dari sesi
$user_id = $_SESSION['user_id'];

// Query SQL untuk mengambil username pengguna berdasarkan ID
$query = "SELECT username FROM users WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Valley</title>
    <link rel="stylesheet" href="asset/style.css">
</head>

<body>
    <header>
        <nav>
            <div class="container">
                <h1>Coffee Valley</h1>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="catalogue.php">Catalogue</a></li>
                    <li><a href="Distributors.php">Distributors</a></li>
                    <li><a href="upload.php">Upload</a></li>
                    <li>
                        <?php echo 'Hello, ' . $username; ?>
                    </li>
                    <li>
                        <a href="auth/logout.php">logout</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>