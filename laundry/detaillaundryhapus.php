<?php
include '../koneksi.php';

if (isset($_GET['nolaundry']) && isset($_GET['kodejenislaundry'])) {
    $nolaundry = $_GET['nolaundry'];
    $kodejenislaundry = $_GET['kodejenislaundry'];

    $nolaundry = mysqli_real_escape_string($conn, $nolaundry);
    $kodejenislaundry = mysqli_real_escape_string($conn, $kodejenislaundry);

    // Hapus detail laundry
    $result = mysqli_query($conn, "DELETE FROM detaillaundry WHERE nolaundry = '$nolaundry' AND kodejenislaundry = '$kodejenislaundry'");

    if ($result) {
        // Update total
        $queryUpdateTotal = mysqli_query($conn, "SELECT SUM(hargatotal) AS GrandTotal FROM detaillaundry WHERE nolaundry = '$nolaundry'");
        $dataTotal = mysqli_fetch_assoc($queryUpdateTotal);
        $grandTotal = $dataTotal['GrandTotal'];

        mysqli_query($conn, "UPDATE laundry SET total = '$grandTotal' WHERE nolaundry = '$nolaundry'");

        header("Location: detaillaundry.php?nolaundry=$nolaundry");
    } else {
        echo "Failed to delete the entry.";
    }
} else {
    header("Location: detaillaundry.php");
}
?>
