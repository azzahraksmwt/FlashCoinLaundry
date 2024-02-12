
<?php
  include '../koneksi.php';
  $query = mysqli_query($conn, "Select*from customer where idcustomer = '$_GET[idcustomer]'");
  $data = mysqli_fetch_array($query);
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
                <h4>Ubah Data Customer</h4>
              </div>
              <div class="card-tools">
                <a href="customer.php">
                  <button type="submit" class="btn btn-warning" name="kembali">Kembali</button>
                </a>
              </div>
            </div>

            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="idcustomer" class="form-label">ID Customer</label>
                        <input type="text" class="form-control" id="idcustomer" name="idcustomer" value="<?php echo $data['idcustomer'];?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="customer" class="form-label">Customer</label>
                        <input type="text" class="form-control" id="customer" name="customer" value="<?php echo $data['customer'];?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
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

        $idcustomer = $_POST['idcustomer'];
        $customer = $_POST['customer'];

        mysqli_query($conn, "update customer set customer='$customer' where idcustomer='$idcustomer'");
        mysqli_close($conn);
        echo '<script>window.location.href = "customer.php";</script>';
        exit;
    }
?>