<?php
if (!isset($_SESSION)) {
    session_start();
}

function showAlert($message) {
    echo "<script>alert('$message')</script>";
    echo '<meta http-equiv="refresh" content="0">';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_ktp = $_POST['no_ktp'];
    $no_hp = $_POST['no_hp'];

    $query = "SELECT * FROM pasien WHERE no_ktp = '$no_ktp' AND no_hp = '$no_hp'";
    $result = $mysqli->query($query);

    if ($result === false) {
        die("Query error: " . $mysqli->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id_pasien'] = $row['id'];
        $_SESSION['name'] = $row['nama'];
        $_SESSION['no_rm'] = $row['no_rm'];
        $_SESSION['role'] = "pasien";
        header("Location: index.php");
    } else {
        $error = "No.KTP atau No.HP salah. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center" style="font-weight: bold; font-size: 32px;">Login Pasien</div>
                    <div class="card-body">
                        <form method="POST" action="index.php?page=loginPasien">
                            <?php
                            if (isset($error)) {
                                echo '<div class="alert alert-danger">' . $error . '
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                            }
                            ?>
                            <div class="form-group">
                                <label for="no_ktp">No.KTP</label>
                                <input type="text" name="no_ktp" class="form-control" required placeholder="Masukkan No.KTP">
                            </div>
                            <div class="form-group mt-1">
                                <label for="no_hp">No.HP</label>
                                <input type="text" name="no_hp" class="form-control" required placeholder="Masukkan No.HP">
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="text-center">
                                <p class="mt-3">Belum Punya Akun? <a href="index.php?page=pendaftaranPasienBaru">Daftar</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
