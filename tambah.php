<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $nama = trim($_POST['nama_supplier']);
    $jenis = $_POST['jenis_pasokan'];
    $alamat = trim($_POST['alamat']);
    $telepon = trim($_POST['no_telepon']);

    // Validasi
    if ($nama == "" || $jenis == "" || $alamat == "") {
        $error = "Nama, jenis pasokan, dan alamat wajib diisi.";
    } else {
        mysqli_query($koneksi, "INSERT INTO suppliers
            (nama_supplier, jenis_pasokan, alamat, no_telepon)
            VALUES ('$nama', '$jenis', '$alamat', '$telepon')");

        header("Location: index.php?pesan=tambah");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Tambah Supplier</h1>

    <?php if (isset($error)) { ?>
        <p class="error"><?= $error; ?></p>
    <?php } ?>

    <form method="POST">

        <label>Nama Supplier</label>
        <input
            type="text"
            name="nama_supplier"
            value="<?= isset($nama) ? $nama : ''; ?>"
            required
        >

        <label>Jenis Pasokan</label>
        <select name="jenis_pasokan" required>
            <option value="">-- Pilih Jenis --</option>

            <option value="Bahan Segar">
                Bahan Segar
            </option>

            <option value="Bahan Kering">
                Bahan Kering
            </option>
        </select>

        <label>Alamat</label>
        <textarea
            name="alamat"
            required
        ><?= isset($alamat) ? $alamat : ''; ?></textarea>

        <label>No. Telepon</label>
        <input
            type="text"
            name="no_telepon"
            value="<?= isset($telepon) ? $telepon : ''; ?>"
        >

        <button type="submit" name="simpan">
            Simpan
        </button>

        <a href="index.php">
            Kembali
        </a>

    </form>

</div>

</body>
</html>