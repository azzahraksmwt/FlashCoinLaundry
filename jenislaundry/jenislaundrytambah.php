
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
                 <h4>Tambah Data Jenis Laundry</h4>
               </div>
               <div class="card-tools">
                 <a href="jenislaundry.php">
                   <button type="submit" class="btn btn-warning" name="kembali">Kembali</button>
                 </a>
               </div>
             </div>

             <div class="card-body">
               <form action="" method="post">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="mb-3">
                       <label for="kodejenislaundry" class="form-label">Kode Jenis Laundry</label>
                       <input type="text" class="form-control" id="kodejenislaundry" name="kodejenislaundry">
                     </div>
                     <div class="mb-3">
                       <label for="namajenislaundry" class="form-label">Nama Jenis Laundry</label>
                       <input type="text" class="form-control" id="namajenislaundry" name="namajenislaundry">
                     </div>
                     <div class="mb-3">
                       <label for="hargasatuan" class="form-label">Harga Satuan</label>
                       <input type="text" class="form-control" id="hargasatuan" name="hargasatuan">
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

        $kodejenislaundry = $_POST['kodejenislaundry'];
        $namajenislaundry = $_POST['namajenislaundry'];
        $hargasatuan = $_POST['hargasatuan'];

        mysqli_query($conn, "INSERT INTO jenislaundry (kodejenislaundry, namajenislaundry,hargasatuan) VALUES ('$kodejenislaundry','$namajenislaundry','$hargasatuan')");

        mysqli_close($conn);

        echo '<script>window.location.href = "jenislaundry.php";</script>';
        exit;
    }
?>