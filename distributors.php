<?php
session_start();
include 'config.php';
$query = "SELECT * FROM distributor";
$result = $koneksi->query($query);
?>
<?php include 'partial/header.php'; ?>
<div class="container">
    <div></div>
    <h2>distributors</h2>
    <a href="add_distributor.php"> Add</a>
</div>
<div>
    <table class="catalog-table">
        <tr>
            <th>ID</th>
            <th>distributor name</th>
            <th>city</th>
            <th>action</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['distributor_name'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td><a href='edit_distributor.php?id=" . $row['id'] . "'>Edit</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
</div>

<?php include 'partial/footer.php'; ?>