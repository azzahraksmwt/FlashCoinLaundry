

<?php
include '../koneksi.php';

if (isset($_GET['idcustomer'])) {
    $idcustomer=$_GET['idcustomer'];
}

$result = mysqli_query($conn, "DELETE FROM customer WHERE idcustomer='$idcustomer'");

header("Location:customer.php");
?>