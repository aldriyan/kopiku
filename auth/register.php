<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: ../home.php');
    exit();
}

include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Periksa apakah username sudah digunakan
    $check_query = "SELECT id FROM users WHERE username = ?";
    $check_stmt = $koneksi->prepare($check_query);
    $check_stmt->bind_param('s', $username);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        $error_message = "Username sudah digunakan.";
    } else {
        // Jika username belum digunakan, lakukan pendaftaran
        $insert_query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $insert_stmt = $koneksi->prepare($insert_query);
        $insert_stmt->bind_param('ss', $username, $password);

        if ($insert_stmt->execute()) {
            $success_message = "Pendaftaran berhasil! Silakan login.";
        } else {
            $error_message = "Pendaftaran gagal. Silakan coba lagi.";
        }
    }

    $check_stmt->close();
    $insert_stmt->close();
}
?>


<!-- Kode HTML formulir registrasi -->


<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Sudah memiliki akun? <a href="login.php">Login</a></p>
</body>

</html>