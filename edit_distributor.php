<?php
session_start();
include 'config.php';

// Periksa apakah parameter ID telah diberikan
if (isset($_GET['id'])) {
    $distributor_id = $_GET['id'];

    // Query SQL untuk mengambil data distributor berdasarkan ID
    $query = "SELECT * FROM distributor WHERE id = $distributor_id";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $distributor_name = $row['distributor_name'];
        $city = $row['city'];
        $region = $row['region']; // Tambahkan kolom region
        $country = $row['country']; // Tambahkan kolom country
        $phone = $row['phone']; // Tambahkan kolom phone
        $email = $row['email']; // Tambahkan kolom email
    } else {
        echo "Distributor tidak ditemukan.";
        exit();
    }
} else {
    echo "ID distributor tidak diberikan.";
    exit();
}

// Handle form submission for editing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_distributor_name = $_POST['new_distributor_name'];
    $new_city = $_POST['new_city'];

    // Query SQL untuk mengupdate data distributor
    $update_query = "UPDATE distributor SET distributor_name = '$new_distributor_name', city = '$new_city', region = '$new_region', country = '$new_country', phone = '$new_phone', email = '$new_email' WHERE id = $distributor_id";


    if ($koneksi->query($update_query) === TRUE) {
        header("Location: distributors.php");
    } else {
        echo "Error saat mengupdate distributor: " . $koneksi->error;
    }
}
?>

<?php include 'partial/header.php'; ?>

<div class="container">
    <h2>Edit Distributor</h2>
    <form method="post">
        <label for="new_distributor_name">Distributor Name:</label>
        <input type="text" name="new_distributor_name" value="<?php echo $distributor_name; ?>" required>
        <label for="new_city">City:</label>
        <input type="text" name="new_city" value="<?php echo $city; ?>" required>
        <label for="new_region">Region:</label>
        <input type="text" name="new_region" value="<?php echo $region; ?>" required>
        <label for="new_country">Country:</label>
        <input type="text" name="new_country" value="<?php echo $country; ?>" required>
        <label for="new_phone">Phone:</label>
        <input type="text" name="new_phone" value="<?php echo $phone; ?>" required>
        <label for="new_email">Email:</label>
        <input type="email" name="new_email" value="<?php echo $email; ?>" required>
        <button type="submit">Simpan Perubahan</button>
    </form>
</div>


<?php include 'partial/footer.php'; ?>