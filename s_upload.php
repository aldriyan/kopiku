<?php
// Koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'kopi');

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if (isset($_POST['submit'])) {
    $file_name = $_POST['file_name'];
    $author = $_POST['author'];
    $file = $_FILES['file'];

    $file_name_db = $koneksi->real_escape_string($file_name);
    $author_db = $koneksi->real_escape_string($author);

    $file_name_db = $koneksi->real_escape_string($file_name);

    // Unggah file ke direktori penyimpanan
    $upload_directory = 'uploads/';
    $file_path = $upload_directory . $file_name;

    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        // Simpan informasi file ke database
        $insert_query = "INSERT INTO documents (file_name, author) VALUES ('$file_name_db', '$author_db')";
        if ($koneksi->query($insert_query) === TRUE) {
            echo "File berhasil diunggah.";
        } else {
            echo "Error saat menyimpan data file: " . $koneksi->error;
        }
    } else {
        echo "Error saat mengunggah file.";
    }
}

$koneksi->close();
