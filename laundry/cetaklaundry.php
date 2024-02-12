
<?php
include '../koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM laundry l
                              JOIN detaillaundry d ON l.nolaundry = d.nolaundry
                              JOIN customer c ON l.idcustomer = c.idcustomer
                              JOIN user u ON l.userid = u.userid
                              JOIN jenislaundry j ON d.kodejenislaundry = j.kodejenislaundry
                              WHERE l.nolaundry = '$_GET[nolaundry]'");

$data = mysqli_fetch_assoc($query);
$grandTotal = 0;
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
    <style>
        body {
            font-family: "Courier New", Courier, monospace;
        }
        .container-print {
            max-width: 22.5cm;
            margin: 0 auto;
        }
        .text-center {
            text-align: center;
        }
        .text-end {
            text-align: end;
        }
        .fw-normal {
            font-weight: normal;
        }
        .table-invoice {
            width: 100%;
            margin-top: 20px;
        }
        .table-invoice th,
        .table-invoice td {
            padding: 4px;
        }
        p {
            margin-top: 20px;
        }
    </style>
</head>


<body>
  <div class="container mt-5 container-print">
    <div class="row">
      <div class="col-md-10">
        <div class="card p-3 mb-5">
          <h3 class="text-center">FLASH COIN LAUNDRY</h3>
          <h4 class="text-center">Sunter Hijau Raya</h4>
          <h4 class="text-center">0812 8888 5735</h4>

          <table class="table-invoice" style="line-height: 1;">
            <tr>
              <td colspan="2">
                <div class="row">
                  <div class="col-6">
                    <strong class="fw-normal fs-4">Customer :</strong>
                    <span class="fs-4"><?= $data['customer'] ?></span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <th colspan="2" class="fw-normal">-------------------------------------------------------------------</th>
            </tr>
            <tr>
              <td colspan="2">
                <div class="row">
                  <div class="col-6">
                    <strong class="fw-normal fs-4">Tgl :</strong>
                    <span class="fs-4"><?= $data['tgl'] ?></span>
                  </div>
                  <div class="col-6 text-end">
                    <strong class="fw-normal fs-4">User :</strong>
                    <span class="fs-4"><?= $data['user'] ?></span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="row">
                  <div class="col-6">
                    <strong class="fw-normal fs-4">No. :</strong>
                    <span class="fs-4"><?= $data['nolaundry'] ?></span>
                  </div>
                  <div class="col-6 text-end">
                    <strong class="fw-normal fs-4">Jam :</strong>
                    <span class="fs-4"><?= $data['jam'] ?></span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <th colspan="2" class="fw-normal">-------------------------------------------------------------------</th>
            </tr>
              <?php mysqli_data_seek($query, 0); ?>
              <?php while ($detail = mysqli_fetch_assoc($query)) { ?>
            <tr>
              <td><span class="fs-4"><?= $detail['namajenislaundry'] ?></span></td>
            </tr>
            <tr>
              <td class="align-middle">
                <div class="row">
                  <div class="col-2"></div>
                    <div class="col-3">
                      <span class="fs-4"><?= $detail['jumlah'] ?></span> X
                    </div>
                  <div class="col-4">
                    <span class="fs-4"><?= $detail['hargasatuan'] ?></span>
                  </div>
                  <div class="col-3 text-end fs-4 ">
                    <?= $detail['hargasatuan'] * $detail['jumlah'] ?>
                  </div>
                </div>
              </td>
            </tr>
            <?php
              $subTotal = $detail['hargasatuan'] * $detail['jumlah'];
              $grandTotal += $subTotal;
            ?>
            <?php } ?>
            <tr>
              <th colspan="2" class="fw-normal">-------------------------------------------------------------------</th>
            </tr>
            <tr>
              <th class="fw-normal fs-4">Total</th>
              <td class="fs-4"><?= $grandTotal ?></td>
            </tr>
            <tr>
              <th class="fw-normal fs-4">Cash</th>
              <td class="fs-4">-</td>
            </tr>
            <tr>
              <th class="fw-normal fs-4">Kembali</th>
              <td class="fs-4">-</td>
            </tr>
            <tr>
              <th colspan="2" class="fw-normal">-------------------------------------------------------------------</th>
            </tr>
          </table>
          <p class="fs-4">
            - MOHON PERIKSA KEMBALI HASIL CUCIAN ANDA <br>
            - HASIL CUCIAN YANG SUDAH DIBAWA PULANG DILUAR TANGGUNG JAWAB KAMI
          </p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
</html>