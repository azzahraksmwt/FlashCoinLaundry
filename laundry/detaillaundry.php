
<?php
  include '../koneksi.php';
  $query = mysqli_query($conn, "Select*from laundry where nolaundry = '$_GET[nolaundry]'");
  $data = mysqli_fetch_array($query);
  $total = $data['total'] ?? 0;
?>


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
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
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
                <h5>Percetakan Flash Coin Laundry</h5>
              </div>
              <div class="card-tools">
                <button class="printbtn btn btn-secondary" id="btnPrint" onclick="printLaundry('<?php echo $data['nolaundry']; ?>')"> Cetak </button>
                <a href="laundry.php">
                  <button type="submit" class="btn btn-warning" name="kembali">Kembali</button>
                </a >
              </div>
            </div>

            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3 row">
                        <label for="nolaundry" class="col-sm-4 col-form-label">No Laundry</label>
                        <div class="col-sm-7">
                          <span class="form-control-plaintext border-bottom" id="nolaundry"><?php echo $data['nolaundry']; ?></span>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="idcustomer" class="col-sm-4 col-form-label">Customer</label>
                        <div class="col-sm-7">
                        <?php
                          $query_customer = mysqli_query($conn, "SELECT customer FROM customer WHERE idcustomer = '" . $data['idcustomer'] . "'");
                          $data_customer = mysqli_fetch_array($query_customer);
                          $nama_customer = $data_customer['customer'];
                        ?>
                        <span class="form-control-plaintext border-bottom" id="idcustomer"><?php echo $nama_customer; ?></span>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="tgl" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-7">
                          <span class="form-control-plaintext border-bottom" id="tgl"><?php echo $data['tgl']; ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3 row">
                      <label for="user" class="col-sm-3 col-form-label">User</label>
                      <div class="col-sm-9">
                      <?php
                        $query_user = mysqli_query($conn, "SELECT user FROM user WHERE userid = '" . $data['userid'] . "'");
                        $data_user = mysqli_fetch_array($query_user);
                        $nama_user = $data_user['user'];
                      ?>
                      <span class="form-control-plaintext border-bottom" id="userid"><?php echo $nama_user; ?></span>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="jam" class="col-sm-3 col-form-label">Jam</label>
                      <div class="col-sm-9">
                        <span class="form-control-plaintext border-bottom" id="jam"><?php echo $data['jam']; ?></span>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="total" class="col-sm-3 col-form-label">Total</label>
                      <div class="col-sm-9">
                        <span class="form-control-plaintext border-bottom" id="total"><?php echo $total; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

  <div class="main-content">
    <div class="container">
      <div class="row mt-3">
        <div class="col">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <div class="card-title">
                <h5>Detail Laundry</h5>
              </div>
            </div>

            <div class="card-body">
              <div class="mb-3">
                <a class="btn btn-primary" href="detaillaundrytambah.php?nolaundry=<?php echo $data['nolaundry']; ?>">
                Tambah Data
                </a>
              </div>
              <table id="dt" class="table align-middle table-bordered table-hover" style="width:100%">
                <form id="deleteForm" action="detaillaundryhapus.php" method="POST">
                  <thead class="table-info">
                    <tr>
                      <th>Nama Jenis Laundry</th>
                      <th>Harga Satuan</th>
                      <th>Jumlah</th>
                      <th>Harga Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="table-light">
                  <?php
                    include '../koneksi.php';

                    $query = mysqli_query($conn, "SELECT * FROM detaillaundry WHERE nolaundry = '$_GET[nolaundry]'");
                    $no = 1;

                    while ($data = mysqli_fetch_array($query)) {
                      $kodejenislaundry = $data['kodejenislaundry'];
                      $jumlah = $data['jumlah'];

                      $query_jenis = mysqli_query($conn, "SELECT * FROM jenislaundry WHERE kodejenislaundry = '$kodejenislaundry'");
                      $data_jenis = mysqli_fetch_array($query_jenis);
                      $namajenislaundry = $data_jenis['namajenislaundry'];
                      $hargasatuan = $data_jenis['hargasatuan'];
                      $hargatotal = $hargasatuan * $jumlah;

                      echo "<tr>";
                      echo "<td>$namajenislaundry</td>";
                      echo "<td>$hargasatuan</td>";
                      echo "<td>$jumlah</td>";
                      echo "<td>$hargatotal</td>";
                      echo "<td>
                        <div class='d-flex justify-content-center'>
                          <a class='hapus btn btn-danger btn-sm me-2' href='detaillaundryhapus.php?nolaundry=" . $data['nolaundry'] . "&kodejenislaundry=" . $data['kodejenislaundry'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data tersebut?')\">Hapus</a>
                        </div>
                      </td>";
                      echo "</tr>";

                      $no++;
                      $total += $hargatotal;
                      }
                  ?>
                  </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dt').DataTable();
        });
    </script>

    <script>
        function printLaundry(nolaundry) {
            var printWindow = window.open('cetaklaundry.php?nolaundry=' + nolaundry, '_blank');
            printWindow.onload = function() {
                printWindow.print();
            };
        }
    </script>
</body>
</html>

<?php
if (isset($_POST['proses'])) {
    include '../koneksi.php';

    $nolaundry = $_POST['nolaundry'];
    $customer = $_POST['customer'];
    $tgl = $_POST['tgl'];
    $user = $_POST['user'];
    $jam = $_POST['jam'];
    $total = $_POST['total'];

    mysqli_query($conn, "INSERT INTO laundry (nolaundry, customer, tgl, user, jam, total) VALUES ('$nolaundry','$customer','$tgl','$user','$jam','$total')");


    mysqli_close($conn);

    echo '<script>window.location.href = "detaillaundry.php?nolaundry=' . $nolaundry . '";</script>';
    exit;
}
?>
