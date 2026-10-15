<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM suppliers WHERE id='$id'");
$supplier = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $nama = $_POST['nama_supplier'];
    $jenis = $_POST['jenis_pasokan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['no_telepon'];

    mysqli_query($koneksi, "UPDATE suppliers SET
        nama_supplier='$nama',
        jenis_pasokan='$jenis',
        alamat='$alamat',
        no_telepon='$telepon'
        WHERE id='$id'
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Edit Supplier</h1>

    <form method="POST">

        <label>Nama Supplier</label>
        <input type="text" name="nama_supplier"
               value="<?= $supplier['nama_supplier']; ?>" required>

        <label>Jenis Pasokan</label>
        <select name="jenis_pasokan" required>
            <option value="Bahan Segar"
                <?= $supplier['jenis_pasokan'] == 'Bahan Segar' ? 'selected' : ''; ?>>
                Bahan Segar
            </option>

            <option value="Bahan Kering"
                <?= $supplier['jenis_pasokan'] == 'Bahan Kering' ? 'selected' : ''; ?>>
                Bahan Kering
            </option>
        </select>

        <label>Alamat</label>
        <textarea name="alamat" required><?= $supplier['alamat']; ?></textarea>

        <label>No. Telepon</label>
        <input type="text" name="no_telepon"
               value="<?= $supplier['no_telepon']; ?>">

        <button type="submit" name="update">Update</button>

        <a href="index.php">Kembali</a>

    </form>

</div>

</body>
</html>