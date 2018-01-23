<?php
include('../koneksi.php');

session_start();
       if (!isset($_SESSION['id_admin'])){
     header( 'Location:index.html');
 } else {
$_SESSION['idartikel1'] = $_POST['id1'];
$tes = $_SESSION['idartikel1'];


$query = "DELETE FROM t_fasilitas WHERE t_id_fasilitas = '$tes'";

if($dbh->exec($query))
{
    
    echo "<script type='text/javascript'>alert('Anda berhasil menghapus ruangan.');document.location='../fasilitas/settings.php'</script>";
}
else
    echo "<script type='text/javascript'>document.location='../fasilitas/settings.php'</script>";
       }
?>