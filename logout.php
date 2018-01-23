<?php
include('koneksi.php');
session_start();
session_unset();
session_destroy();
 echo "<script type='text/javascript'>alert('Anda berhasil Logout.');document.location='login.html'</script>";

?>

