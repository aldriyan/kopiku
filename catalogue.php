<?php
session_start();
include 'config.php';

$query = "SELECT * FROM catalogo";
$result = $koneksi->query($query);
?>

<?php include 'partial/header.php'; ?>

<div class="container">
    <div></div>
    <h2>Catalogo</h2>
</div>
<div>
    <table class="catalog-table">
        <tr>
            <th>ID</th>
            <th>Bean</th>
            <th>Deskripsi</th>
            <th>Price</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['bean'] . "</td>";
            echo "<td>" . $row['deskripsi'] . "</td>";
            echo "<td>$" . $row['price'] . "</td>"; // Menambahkan simbol dollar
            echo "</tr>";
        }
        ?>
    </table>
</div>
</div>

<?php include 'partial/footer.php'; ?>