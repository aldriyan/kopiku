<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Jika pengguna tidak masuk, tidak ada sesi untuk logout
    header('Location: login.php');
    exit();
}

// Hapus sesi
session_destroy();

// Redirect ke halaman login
header('Location: login.php');
