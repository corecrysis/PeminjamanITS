<?php
include('../koneksi.php');
session_start();
       
if (!isset($_SESSION['id_admin'])){
     header( 'Location:../login.html');
 } else {

           if(isset($_POST['submit_pass'])){
               $jut = $_SESSION['id_admin'];
               $query = "SELECT * FROM t_user where m_id_user='$jut'";
                $result = $dbh->query($query)->fetch();
//               $m_pass_lama         = $_POST['m_pass_lama'];
               $m_pass_baru     = $_POST['m_pass_baru'];
//               $coba = MD5("darwin" . $m_pass_lama);
//               if($coba == $result['m_pass']){
                   $coba1 = MD5("darwin" . $m_pass_baru);
                   
$query = "UPDATE t_user SET m_pass = '$coba1' where m_id_user='$jut'";

if($dbh->exec($query))
{
    echo 'sukses';
    echo "<script type='text/javascript'>alert('Password berhasil diubah.');document.location='settings.php'</script>";
}
else {
    echo 'gagal';
    echo "<script type='text/javascript'>alert('Koneksi Error. coba lagi');document.location='settings.php'</script>";
}
    
//       } else{
//                   echo 'gagal';
//    echo "<script type='text/javascript'>alert('Password Salah. coba lagi');document.location='settings.php'</script>";
//               }
               }
}
               