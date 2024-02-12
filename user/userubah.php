
<?php
    include '../koneksi.php';
    if (isset($_GET['userid'])) {
        $userid = $_GET['userid'];
        $query = mysqli_query($conn, "SELECT * FROM user WHERE userid = '$userid'");
        $data = mysqli_fetch_array($query);
    } else {
        header("Location: ../home.php");
        exit;
    }

    if (isset($_POST['proses'])) {
        $user = $_POST['user'];

        mysqli_query($conn, "UPDATE user SET user='$user' WHERE userid='$userid'");
        mysqli_close($conn);

        echo '<script>window.location.href = "userubah.php?userid=' . $userid . '";</script>';
        exit;
    }
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
       <span class="navbar-brand-text" style="font-size: 28px; font-family: courier new;">
       Flash Coin Laundry
       </span>
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
                <h4>Ubah Data User</h4>
              </div>
              <div class="card-tools">
                <a href="user.php">
                  <button type="submit" class="btn btn-warning" name="kembali">Kembali</button>
                </a>
              </div>
            </div>

            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="userid" class="form-label">User ID</label>
                      <input type="text" class="form-control" id="userid" name="userid" value="<?php echo $data['userid']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="user" class="form-label">User</label>
                      <input type="text" class="form-control" id="user" name="user" value="<?php echo $data['user']; ?>">
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

  <div class="main-content">
    <div class="container">
      <div class="row mt-3">
        <div class="col">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <div class="card-title">
                <h4>Data User</h4>
              </div>
            </div>

            <div class="card-body">
              <table id="dt" class="table align-middle table-bordered table-hover" style="width:100%">
              <thead class="table-info">
                <tr>
                  <th><center>User ID</center></th>
                  <th><center>User</center></th>
                  <th><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody class="table-light">
                <?php
                  $query = mysqli_query($conn, "SELECT * FROM user");
                  while ($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                  <td><?php echo $data['userid']; ?></td>
                  <td><?php echo $data['user']; ?></td>
                  <td>
                    <div class="d-flex justify-content-center">
                      <a class="edit btn btn-success btn-sm me-2" href="userubah.php?userid=<?php echo $data['userid']; ?>" >Edit</a>
                      <a class="hapus btn btn-danger btn-sm" href="userhapus.php?userid=<?php echo $data['userid']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?')">Hapus</a>
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
</body>
</html>
