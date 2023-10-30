<?php
session_start();
include 'config.php';

// Handle form submission for adding distributor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_distributor_name = $_POST['new_distributor_name'];
    $new_city = $_POST['new_city'];
    $new_region = $_POST['new_region']; // Mengambil nilai dari select
    $new_country = $_POST['new_country'];
    $new_phone = $_POST['new_phone'];
    $new_email = $_POST['new_email'];

    // Query SQL untuk menambahkan data distributor baru
    $insert_query = "INSERT INTO distributor (distributor_name, city, region, country, phone, email) VALUES ('$new_distributor_name', '$new_city', '$new_region', '$new_country', '$new_phone', '$new_email')";

    if ($koneksi->query($insert_query) === TRUE) {
        header("Location: distributors.php");
    } else {
        echo "Error saat menambahkan distributor: " . $koneksi->error;
    }
}
?>

<?php include 'partial/header.php'; ?>

<div class="container">
    <h2>Tambah Distributor</h2>
    <form method="post">
        <label for="new_distributor_name">Distributor Name:</label>
        <input type="text" name="new_distributor_name" required>
        <label for="new_city">City:</label>
        <input type="text" name="new_city" required>
        <label for="new_region">Region:</label>
        <select name="new_region" required>
            <option value="Region 1">Region 1</option>
            <option value="Region 2">Region 2</option>
            <option value="Region 3">Region 3</option>
            <!-- Tambahkan pilihan region sesuai kebutuhan Anda -->
        </select>
        <label for="new_country">Country:</label>
        <input type="text" name="new_country" required>
        <label for="new_phone">Phone:</label>
        <input type="text" name="new_phone" required>
        <label for="new_email">Email:</label>
        <input type="email" name="new_email" required>
        <button type="submit">Tambah Distributor</button>
    </form>
</div>

<?php include 'partial/footer.php'; ?>