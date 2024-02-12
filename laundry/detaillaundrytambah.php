
<?php
include '../koneksi.php';

if (isset($_GET['nolaundry'])) {
    $nolaundry = mysqli_real_escape_string($conn, $_GET['nolaundry']);

    $query = mysqli_query($conn, "SELECT * FROM detaillaundry WHERE nolaundry = '$nolaundry'");
    $data = mysqli_fetch_array($query);
} else {
    header("Location: detaillaundry.php");
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
                <h4>Tambah Data Detail Laundry</h4>
              </div>
              <div class="card-tools">
                <a href="detaillaundry.php?nolaundry=<?php echo $_GET['nolaundry']; ?>">
                  <button type="submit" class="btn btn-warning" name="kembali">Kembali</button>
                </a>
              </div>
            </div>

            <div class="card-body">
              <form action="" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="kodejenislaundry" class="form-label">Nama Jenis Laundry</label>
                    <select class="form-select" id="kodejenislaundry" name="kodejenislaundry">
                    <option value="">---Pilih Jenis Laundry---</option>
                    <?php
                      include '../koneksi.php';
                      $query = mysqli_query($conn, "SELECT * FROM jenislaundry");
                      while ($row = mysqli_fetch_assoc($query)) {
                      echo '<option value="' . $row['kodejenislaundry'] . '" data-harga="' . $row['hargasatuan'] . '">' . $row['namajenislaundry'] . '</option>';
                      }
                    ?>

                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="hargaSatuan" class="form-label">Harga Satuan</label>
                    <input type="text" class="form-control" id="hargaSatuan" name="hargaSatuan" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah">
                  </div>
                  <div class="mb-3">
                    <label for="hargatotal" class="form-label">Harga Total</label>
                    <input type="text" class="form-control" id="hargatotal" name="hargatotal">
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

<script>
    var jenisLaundryDropdown = document.getElementById('kodejenislaundry');
    var hargaSatuanInput = document.getElementById('hargaSatuan');

    jenisLaundryDropdown.addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var hargaSatuan = selectedOption.getAttribute('data-harga');

        hargaSatuanInput.value = hargaSatuan;
    });
</script>

<script>
    var jumlahInput = document.getElementById('jumlah');
    var hargaSatuanInput = document.getElementById('hargaSatuan');
    var hargaTotalInput = document.getElementById('hargatotal');

    jumlahInput.addEventListener('input', function() {
        var jumlah = parseInt(jumlahInput.value);
        var hargaSatuan = parseInt(hargaSatuanInput.value);
        var hargaTotal = jumlah * hargaSatuan;

        if (!isNaN(hargaTotal)) {
            hargaTotalInput.value = hargaTotal;
        } else {
            hargaTotalInput.value = '';
        }
    });
</script>

</body>
</html>

<?php
if (isset($_POST['proses'])) {
    $kodejenislaundry = $_POST['kodejenislaundry'];
    $jumlah = $_POST['jumlah'];

    $queryHargaSatuan = mysqli_query($conn, "SELECT hargasatuan FROM jenislaundry WHERE kodejenislaundry = '$kodejenislaundry'");
    $dataHargaSatuan = mysqli_fetch_assoc($queryHargaSatuan);
    $hargasatuan = $dataHargaSatuan['hargasatuan'];

    $hargatotal = $jumlah * $hargasatuan;

    $queryCheck = mysqli_query($conn, "SELECT * FROM detaillaundry WHERE kodejenislaundry = '$kodejenislaundry' AND nolaundry = '$nolaundry'");
    $numRows = mysqli_num_rows($queryCheck);

    if ($numRows > 0) {
        mysqli_query($conn, "UPDATE detaillaundry SET jumlah = '$jumlah', hargatotal = '$hargatotal' WHERE kodejenislaundry = '$kodejenislaundry' AND nolaundry = '$nolaundry'");
    } else {
        mysqli_query($conn, "INSERT INTO detaillaundry (nolaundry, kodejenislaundry, jumlah, hargatotal) VALUES ('$nolaundry', '$kodejenislaundry', '$jumlah', '$hargatotal')");
    }

    $queryUpdateTotal = mysqli_query($conn, "SELECT SUM(hargatotal) AS GrandTotal FROM detaillaundry WHERE nolaundry = '$nolaundry'");
    $dataTotal = mysqli_fetch_assoc($queryUpdateTotal);
    $GrandTotal = $dataTotal['GrandTotal'];

    mysqli_query($conn, "UPDATE laundry SET Total='$GrandTotal' WHERE nolaundry='$nolaundry'");

    mysqli_close($conn);

    echo '<script>window.location.href = "detaillaundry.php?nolaundry=' . $nolaundry . '";</script>';
    exit;
}
