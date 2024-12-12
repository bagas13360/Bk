<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=loginAdmin");
    exit;
}

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_ktp = $_POST['no_ktp'];
    $no_hp = $_POST['no_hp'];

    if (isset($_POST['id'])) {
        // Update pasien
        $ubah = mysqli_query($mysqli, "UPDATE pasien SET 
                                            nama = '$nama',
                                            alamat = '$alamat',
                                            no_ktp = '$no_ktp',
                                            no_hp = '$no_hp'
                                        WHERE id = '" . $_POST['id'] . "'");
    } else {
        // Tambah pasien
        $tambah = mysqli_query($mysqli, "INSERT INTO pasien (nama, alamat, no_ktp, no_hp) 
                                            VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp')");
    }
    echo "<script>document.location='index.php?page=pasien';</script>";
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        $hapus = mysqli_query($mysqli, "DELETE FROM pasien WHERE id = '" . $_GET['id'] . "'");
        echo "<script>document.location='index.php?page=pasien';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Kelola Data Pasien</h2>
        <br>

        <!-- Form Input Data -->
        <form class="form row" method="POST" action="">
            <?php
            $nama = $alamat = $no_ktp = $no_hp = '';
            if (isset($_GET['id'])) {
                $ambil = mysqli_query($mysqli, "SELECT * FROM pasien WHERE id='" . $_GET['id'] . "'");
                $row = mysqli_fetch_array($ambil);
                $nama = $row['nama'];
                $alamat = $row['alamat'];
                $no_ktp = $row['no_ktp'];
                $no_hp = $row['no_hp'];
            ?>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <?php } ?>
            <div class="row">
                <label for="inputNama" class="form-label fw-bold">Nama</label>
                <input type="text" class="form-control" name="nama" id="inputNama" placeholder="Nama Lengkap" value="<?php echo $nama ?>" required>
            </div>
            <div class="row mt-2">
                <label for="inputAlamat" class="form-label fw-bold">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="inputAlamat" placeholder="Alamat Lengkap" value="<?php echo $alamat ?>" required>
            </div>
            <div class="row mt-2">
                <label for="inputNoKTP" class="form-label fw-bold">No. KTP</label>
                <input type="text" class="form-control" name="no_ktp" id="inputNoKTP" placeholder="Nomor KTP" value="<?php echo $no_ktp ?>" required>
            </div>
            <div class="row mt-2">
                <label for="inputNoHP" class="form-label fw-bold">No. HP</label>
                <input type="text" class="form-control" name="no_hp" id="inputNoHP" placeholder="Nomor HP" value="<?php echo $no_hp ?>" required>
            </div>
            <div class="row mt-3">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </div>
        </form>
        <br><br>

        <!-- Table Data Pasien -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. KTP</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($mysqli, "SELECT * FROM pasien");
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <th><?php echo $no++ ?></th>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td><?php echo $data['no_ktp'] ?></td>
                        <td><?php echo $data['no_hp'] ?></td>
                        <td>
                            <a class="btn btn-success" href="index.php?page=pasien&id=<?php echo $data['id'] ?>">Edit</a>
                            <a class="btn btn-danger" href="index.php?page=pasien&id=<?php echo $data['id'] ?>&aksi=hapus">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
