<?php
include('../koneksi.php');

session_start();
       if (!isset($_SESSION['id_admin'])){
     header( 'Location:index.html');
 } else {
$_SESSION['idartikel1'] = $_POST['id1'];
$tes = $_SESSION['idartikel1'];


$query = "DELETE FROM t_mobil WHERE m_id_mobil = '$tes'";

if($dbh->exec($query))
{
    
    echo "<script type='text/javascript'>alert('Anda berhasil menghapus ruangan.');document.location='../mobil/settings.php'</script>";
}
else
    echo "<script type='text/javascript'>document.location='../mobil/settings.php'</script>";
       }
?>