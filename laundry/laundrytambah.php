
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlashCoinLaundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="_assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <nav class="navbar bg-info">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <span class="navbar-brand-text" style="font-size: 28px; font-family: courier new;">Flash Coin Laundry</span>
      </a>
    </div>
  </nav>

  <div class="main-content">
    <div class="container">
      <div class="row mt-3">
        <div class="col">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <div class="card-title">
                <h4>Tambah Data Laundry</h4>
              </div>
              <div class="card-tools">
                <a href="laundry.php">
                <button type="submit" class="btn btn-warning" name="kembali">Kembali</button>
                </a>
              </div>
            </div>

            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="nolaundry" class="form-label">No Laundry</label>
                      <input type="text" class="form-control" id="nolaundry" name="nolaundry">
                    </div>
                    <div class="mb-3">
                      <label for="idcustomer" class="form-label">Customer</label>
                      <select class="form-select" id="idcustomer" name="idcustomer">
                      <option value="">---Pilih Customer---</option>
                      <?php
                        include '../koneksi.php';
                        $query = mysqli_query($conn, "SELECT * FROM customer");
                        while ($row = mysqli_fetch_assoc($query)) {
                        echo '<option value="' . $row['idcustomer'] . '">' . $row['customer'] . '</option>';
                        }
                      ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="tgl" class="form-label">Tanggal</label>
                      <input type="date" class="form-control" id="tgl" name="tgl">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="userid" class="form-label">User</label>
                      <select class="form-select" id="userid" name="userid">
                      <option value="">---Pilih User---</option>
                      <?php
                        $query = mysqli_query($conn, "SELECT * FROM user");
                        while ($row = mysqli_fetch_assoc($query)) {
                        echo '<option value="' . $row['userid'] . '">' . $row['user'] . '</option>';
                        }
                      ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="jam" class="form-label">Jam</label>
                      <input type="time" class="form-control" id="jam" name="jam">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-end">
                    <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
if (isset($_POST['proses'])) {
    include '../koneksi.php';

    $nolaundry = $_POST['nolaundry'];
    $idcustomer = $_POST['idcustomer'];
    $tgl = $_POST['tgl'];
    $userid = $_POST['userid'];
    $jam = $_POST['jam'];


    mysqli_query($conn, "INSERT INTO laundry (nolaundry, idcustomer, tgl, userid, jam) VALUES ('$nolaundry','$idcustomer', '$tgl', '$userid', '$jam')");

    mysqli_close($conn);

    echo '<script>window.location.href = "detaillaundry.php?nolaundry=' . $nolaundry . '";</script>';
    exit;
}
?>

