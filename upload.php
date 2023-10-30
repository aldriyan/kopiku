<?php include 'partial/header.php'; ?>

<!-- Konten halaman beranda -->
<div class="container">
    <form action="s_upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Pilih File Dokumen:</label>
        <input type="file" name="file" id="file" required>
        <label for="file_name">Nama File:</label>
        <input type="text" name="file_name" id="file_name" required>
        <label for="author">Penulis:</label>
        <input type="text" name="author" id="author" required>
        <button type="submit" name="submit">Unggah</button>
    </form>
</div>

<?php include 'partial/footer.php'; ?>