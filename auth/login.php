<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit();
}

include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifikasi login
    $query = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $user_username, $user_password);
    $stmt->fetch();

    if ($stmt->num_rows == 1 && password_verify($password, $user_password)) {
        $_SESSION['user_id'] = $user_id;
        header('Location: ../home.php');
    } else {
        $error_message = "Username atau password salah.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>