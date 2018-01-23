<?php
include('../koneksi.php');
session_start();
       if (!isset($_SESSION['id_admin'])){
     header( 'Location:../login.html');
 } else {

           
           if(isset($_POST['submit_log'])){
               $tes = $_SESSION['sukas'];
    $m_nama_barang   = $_POST['m_nama_barang'];
 
        
           
$query = "UPDATE t_ruang SET m_nama_barang = '$m_nama_barang' WHERE t_id_ruang = '$tes'";

if($dbh->exec($query))
{
    
    echo "<script type='text/javascript'>alert('Anda berhasil Edit settings.');document.location='../ruang/settings.php'</script>";
}
else
    
    echo "<script type='text/javascript'>document.location='../ruangan/settings.php'</script>";
       }
       }
?>