<?php
include 'koneksi.php';

$keyword = "";

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

$data = mysqli_query($koneksi, "SELECT * FROM suppliers 
    WHERE nama_supplier LIKE '%$keyword%'
    OR jenis_pasokan LIKE '%$keyword%'
    OR alamat LIKE '%$keyword%'
    ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<?php
if (isset($_GET['pesan']) && $_GET['pesan'] == 'tambah') {
    echo "<p class='success'>Data supplier berhasil ditambahkan!</p>";
}
?>

    <h1>Data Supplier Bahan Baku</h1>

    <a href="tambah.php" class="btn-tambah">
        + Tambah Supplier
    </a>

    <form method="GET" class="search-form">
        <input 
            type="text" 
            name="keyword"
            placeholder="Cari supplier..."
            value="<?= $keyword; ?>"
        >

        <button type="submit">Cari</button>

        <a href="index.php">Reset</a>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Jenis Pasokan</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while ($supplier = mysqli_fetch_assoc($data)) {
        ?>

        <tr>
            <td><?= $no++; ?></td>

            <td><?= $supplier['nama_supplier']; ?></td>

            <td><?= $supplier['jenis_pasokan']; ?></td>

            <td><?= $supplier['alamat']; ?></td>

            <td><?= $supplier['no_telepon']; ?></td>

            <td>
                <a href="edit.php?id=<?= $supplier['id']; ?>">
                    Edit
                </a>

                |

                <a href="hapus.php?id=<?= $supplier['id']; ?>"
                   onclick="return confirm('Yakin ingin menghapus supplier ini?')">
                    Hapus
                </a>
            </td>
        </tr>

        <?php
        }
        ?>

    </table>

</div>

</body>
</html>