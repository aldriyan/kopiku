<?php

session_start();
include 'config.php';

$query = "SELECT * FROM catalogo WHERE price > 6";
$result = $koneksi->query($query);
?>

<?php include 'partial/header.php'; ?>


<div>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<h1> bean : " . $row['bean'] . "</h1>";
        echo "<h1> deskripsi: " . $row['deskripsi'] . "</h1>";
        echo "<h1> price : $" . $row['price'] . "</h1>";
    }
    ?>
    </table>
</div>
</div>

<?php include 'partial/footer.php'; ?>