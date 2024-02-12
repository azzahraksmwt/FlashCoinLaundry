
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"> <!-- digunakan untuk menentukan set karakter yang digunakan dalam halaman web. -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- width=device-width mengatur lebar halaman sama dengan lebar perangkat, dan initial-scale=1 mengatur tingkat zoom awal halaman. -->
    <title>Login-Flash Coin Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>

  <body style="background-image: url('_assets/img/bg-login.png'); background-size: cover;">
  <!-- cover = mencakup seluruh area halaman secara proporsional. -->
  <div class="container mt-5" >
    <div class="row justify-content-center">

        <div class="col-md-4">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
          <div class="logo d-flex justify-content-center">
          <!-- d-flex = mengatur tata letak elemen-elemen dalam kontainer secara responsif dan fleksibel.  -->
          <!--justify-content-center = mengatur agar konten berada di tengah secara horizontal.-->
          	<img src="_assets/img/logo.png" width="200" height="100">
          </div>
          <span class="text-center" style="font-size: 20px; font-family: courier new">Flash Coin Laundry
          </span>

          <form action="home.php" method="post">
            <div class="card-body">
                <div class="mb-3 mt-3">
                  <label class="form-label" style="font-family: Times New Roman">Username</label>
                  <div class="input-group">
                    <span class="input-group-text">
                    <!-- span = memberikan gaya atau manipulasi khusus pada teks -->
                    <!-- di bawah ini untuk icon username -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                    </span>
                    <input type="text" name="username" class="form-control">
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" style="font-family: Times New Roman">
                  Password</label>
                  <div class="input-group">
                    <span class="input-group-text">
                    <!-- span = memberikan gaya atau manipulasi khusus pada teks -->
                    <!-- di bawah ini untuk icon password -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                    </svg>
                    </span>
                    <input type="password" name="password" class="form-control">
                  </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary form-control" name="login">Login</button>
                </div>
            </div>
          </form>
        </div>
        </div>
    </div>
  </div>
  </body>
</html>