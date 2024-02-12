
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
                <h4>Data Customer</h4>
              </div>
              <div class="card-tools">
                <a href="customertambah.php" type="button" class="btn btn-primary">
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
                  <th><center>ID Customer</center></th>
                  <th><center>Customer</center></th>
                  <th><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody class="table-light">
                <?php
                  include '../koneksi.php';
                  $query = mysqli_query($conn, "SELECT * FROM customer");
                  while ($data=mysqli_fetch_array($query)){
                ?>
                <tr>
                  <td><?php echo $data['idcustomer']; ?></td>
                  <td><?php echo $data['customer']; ?></td>
                  <td>
                    <div class="d-flex justify-content-center">
                      <a class="edit btn btn-success btn-sm me-2" href="customerubah.php?idcustomer=<?php echo $data['idcustomer']; ?>" >Edit</a>
                      <a class="hapus btn btn-danger btn-sm" href="customerhapus.php?idcustomer=<?php echo $data['idcustomer']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?')">Hapus</a>
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dt').DataTable();
        });
    </script>
</body>
</html>

<?php
if (isset($_POST['proses'])){
    include '../koneksi.php';

    $idcustomer = $_POST['idcustomer'];
    $customer = $_POST['customer'];

    mysqli_query($conn, "INSERT INTO customer VALUES('$idcustomer','$customer')");
    echo "database tersimpan";
}
?>