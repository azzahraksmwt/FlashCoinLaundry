
<?php
include '../koneksi.php';

if (isset($_GET['nolaundry'])) {
    $nolaundry=$_GET['nolaundry'];
}

$result = mysqli_query($conn, "DELETE FROM laundry WHERE nolaundry='$nolaundry'");

header("Location:laundry.php");
?>