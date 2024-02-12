
<?php
include '../koneksi.php';

$query = "SELECT l.nolaundry, c.customer, l.tgl, u.user, l.jam, SUM(dl.jumlah * j.hargasatuan) AS total
          FROM laundry l
          JOIN customer c ON l.idcustomer = c.idcustomer
          JOIN user u ON l.userid = u.userid
          LEFT JOIN detaillaundry dl ON l.nolaundry = dl.nolaundry
          LEFT JOIN jenislaundry j ON dl.kodejenislaundry = j.kodejenislaundry
          GROUP BY l.nolaundry";

$result = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($result)) {
    $nolaundry = $data['nolaundry'];
    $total = $data['total'];

    mysqli_query($conn, "UPDATE laundry SET total = '$total' WHERE nolaundry = '$nolaundry'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FlashCoinLaundry</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="_assets/css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <!-- Data Tables -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>

<body>
  <nav class="navbar bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <span style="font-size: 28px; font-family: courier new;">Flash Coin Laundry</span>
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
                <h4>Data Laundry</h4>
              </div>
              <div class="card-tools">
                <a href="laundrytambah.php" type="button" class="btn btn-primary">
                  <i class="fa fa-plus"></i>
                  Tambah Data
                </a>
                <a href="../home.php">
                  <button type="submit" class="btn btn-warning" name="kembali">Kembali</button>
                </a>
              </div>
            </div>

            <div class="card-body">
              <table id="dt" class="table align-middle table-bordered table-hover" style="width:100%">
                <thead class="table-info">
                  <tr>
                    <th>No Laundry</th>
                    <th>Customer</th>
                    <th>Tanggal</th>
                    <th>User</th>
                    <th>Jam</th>
                    <th>Total</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $result = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td><?php echo $data['nolaundry']; ?></td>
                    <td><?php echo $data['customer']; ?></td>
                    <td><?php echo $data['tgl']; ?></td>
                    <td><?php echo $data['user']; ?></td>
                    <td><?php echo $data['jam']; ?></td>
                    <td><?php echo $data['total'] ?? 0; ?></td>
                    <td>
                      <div class="d-flex justify-content-center">
                        <a class="edit btn btn-success btn-sm me-2" href="laundryubah.php?nolaundry=<?php echo $data['nolaundry']; ?>">Edit</a>
                        <a class="hapus btn btn-danger btn-sm me-2" href="laundryhapus.php?nolaundry=<?php echo $data['nolaundry']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?')">Hapus</a>
                        <a class="detail btn btn-primary btn-sm me-2" href="detaillaundry.php?nolaundry=<?php echo $data['nolaundry']; ?>">Detail</a>
                        <button class="printbtn btn btn-secondary btn-sm" onclick="printLaundry('<?php echo $data['nolaundry']; ?>')">Cetak</button>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
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
        $(document).ready(function() {
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
mysqli_close($conn);
?>
