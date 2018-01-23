<?php
include('../koneksi.php');
session_start();
       

           if(isset($_POST['submit_fasilitas'])){
              // $tes = $_SESSION['id_admin'];

$t_nama_fasilitas         = $_POST['m_nama_fasilitas'];

$date2 = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
$p_timest= $date2->format('Y-m-d H:i:s');
//echo $p_timest;
    //$r_author_data = $result['m_name'];           
           
$table = 't_fasilitas'; // ubah ke nama tabel
        $field = '`m_nama_barang`,`f_timestamp`'; // kolomnya, kalo > 1 pisahkan pakai koma
        $val = '?,?'; // ini sesuai jumlah kolomnya, pakai koma
        $array = array( $t_nama_fasilitas,$p_timest ); // sesuai jumlah kolom juga
 
        $sth = $dbh->prepare( "INSERT INTO $table ($field) VALUES ($val)" );
        $input = $sth->execute( $array );

  header( 'Location:settings.php');
   // echo "<script type='text/javascript'>alert('Anda berhasil Membuat artikel.');document.location='setting.php</script>";

       
       }
?>