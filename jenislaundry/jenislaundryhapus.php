
<?php
include '../koneksi.php';

if (isset($_GET['kodejenislaundry'])) {
    $kodejenislaundry=$_GET['kodejenislaundry'];
}

$result = mysqli_query($conn, "DELETE FROM jenislaundry WHERE kodejenislaundry='$kodejenislaundry'");

header("Location:jenislaundry.php");
?>