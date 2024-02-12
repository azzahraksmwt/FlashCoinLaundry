
<?php
include '../koneksi.php';

if (isset($_GET['userid'])) {
    $userid=$_GET['userid'];
}

$result = mysqli_query($conn, "DELETE FROM user WHERE userid='$userid'");

header("Location:user.php");
?>