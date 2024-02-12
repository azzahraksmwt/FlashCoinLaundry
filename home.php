

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FlashCoinLaundry</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="_assets/css/style.css">
</head>

<body>
    <nav class="navbar bg-info">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <span style="font-size: 28px; font-family: courier new;">
          Flash Coin Laundry
          </span>
        </a>
        </div>
    </nav>

    <div class="container">
      <div class="baris">
        <div class="col mt-4">
          <div class="card">

            <div class="card-title card-flex">
              <div class="card-col" style="font-family: courier">
                <h1>Dashboard</h1>
              </div>
              <div class="card-col txt-right">
                <a href="index.php">
            	<button type="submit" class="btn btn-danger" name="logout">
            	Logout
            	</button>
            	</a>
              </div>
            </div>

            <div class="card-body mt-2">
              <div class="row">
                <div class="col-md-3">
                  <a class="paket" href="customer/customer.php">
                    <img src="_assets/img/customer.png"
                    alt="customer" width="160">
                    <h4>Data Customer</h4>
                  </a>
                </div>
                <div class="col-md-3">
                  <a class="paket" href="user/user.php">
                    <img src="_assets/img/kasir.png" alt="kasir" width="160">
                    <h4>Data User</h4>
                  </a>
                </div>
                <div class="col-md-3">
                  <a class="paket" href="jenislaundry/jenislaundry.php">
                    <img src="_assets/img/jenislaundry.png"
                    alt="jenislaundry" width="160">
                      <h4>Data Jenis Laundry</h4>
                  </a>
                </div>
                <div class="col-md-3">
                  <a class="paket" href="laundry/laundry.php">
                    <img src="_assets/img/laundry.png"
                    alt="laundry" width="200">
                    <h4>Data Laundry</h4>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
