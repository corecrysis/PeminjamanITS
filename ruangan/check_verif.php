<?php
include('../koneksi.php');
session_start();
       if (!isset($_SESSION['id_admin'])){
     header( 'Location:../login.html');
 } else {

$tes = $_SESSION['idx'];           
           

      
$publish = "1";

$query = "UPDATE t_data_pinjam SET p_verif = '$publish' WHERE p_id_pinjam = '$tes'";

if($dbh->exec($query))
{
    echo 'sukses';
    echo "<script type='text/javascript'>alert('Anda berhasil Verifikasi.');document.location='index.php'</script>";
}
else
    echo 'gagal';
    echo '<a href="index.php">Kembali</a>';
       }

?>