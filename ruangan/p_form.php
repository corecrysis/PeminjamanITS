<?php
include('../koneksi.php');
session_start();
       

           if(isset($_POST['submit'])){
              // $tes = $_SESSION['id_admin'];
               $rand_text = rand(99999,239028302);
               if (is_uploaded_file($_FILES ['upload1'] ['tmp_name'])) {
               $nama_gambar = $_FILES['upload1']['name'];
		$tmp_gambar = $_FILES['upload1']['tmp_name'];
                   $rand_gambar= $rand_text.$nama_gambar;
                   $new_location1 = "img_bukti/".$rand_gambar;
               }
               if (is_uploaded_file($_FILES ['upload2'] ['tmp_name'])) {
        $nama_gambar2 = $_FILES['upload2']['name'];
		$tmp_gambar2 = $_FILES['upload2']['tmp_name'];
                   $rand_gambar2= $rand_text.$nama_gambar2;
                   $new_location2 = "img_bukti/".$rand_gambar2;
               }
               if (is_uploaded_file($_FILES ['upload3'] ['tmp_name'])) {
        $nama_gambar3 = $_FILES['upload3']['name'];
		$tmp_gambar3 = $_FILES['upload3']['tmp_name'];
                   $rand_gambar3= $rand_text.$nama_gambar3;
                   $new_location3 = "img_bukti/".$rand_gambar3;
               }
               $imageFileType = pathinfo($new_location1,PATHINFO_EXTENSION);
		$check = getimagesize($tmp_gambar);
	    if($check !== false) {
	        $uploadOk = 1;
	    } else {
	        $uploadOk = 0;
	    }
	    if (($_FILES['upload1']['size'] > 15000000000000)&&($_FILES['upload2']['size'] > 15000000000000)&&($_FILES['upload3']['size'] > 15000000000000)) {
            echo "<script type='text/javascript'>alert('Sorry, your file is too large. size upload must less than 100 KB');document.location='upl_produk.php'</script>";
		   // echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "JPEG"
		 ) {
            echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, & PNG files are allowed.');document.location='upl_produk.php '</script>";
		   // echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
		    $uploadOk = 0;
		}
		if ($uploadOk == 1){
            if (move_uploaded_file($tmp_gambar, $new_location1)){
               $p_unit         = $_POST['p_unit'];
               $p_m_pinjam     = $_POST['p_m_pinjam'];
               $p_barang     = $_POST['p_barang'];
               $p_golongan = "ruang";
            $jx="select * from t_counter";
     $result_jx = $dbh->query($jx)->fetch();
     $hasil_jx = $result_jx['counter_ruang'];
                $tambah_jx = $hasil_jx + 1 ;
              // echo $p_barang;
            //   echo $p_m_pinjam;
               $p_m_kembali    = $_POST['p_m_kembali'];
           //    echo $p_m_kembali;
               $p_tujuan       = $_POST['p_tujuan'];
               $p_cp       = $_POST['p_cp'];
    $post_status = "draft";
    $post_type="draft";
$date2 = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
$p_timest= $date2->format('Y-m-d H:i:s');
                if($p_m_pinjam < $p_timest){
                    $status='1';
                } else {
                   $status = '0';  
                }
//echo $p_timest;
    //$r_author_data = $result['m_name'];           
           
$table = 't_data_pinjam'; // ubah ke nama tabel
        $field = '`p_unit`,`p_m_pinjam`,`p_m_kembali`,`p_tujuan`,`p_cp`,`p_barang`,`p_golongan`, `p_timest`, `p_tmp_pict_1`, `p_verif`, `p_counter`'; // kolomnya, kalo > 1 pisahkan pakai koma
        $val = '?,?,?,?,?,?,?,?,?,?,?'; // ini sesuai jumlah kolomnya, pakai koma
        $array = array( $p_unit, $p_m_pinjam, $p_m_kembali, $p_tujuan, $p_cp,$p_barang,$p_golongan, $p_timest, $new_location1 , $status, $hasil_jx ); // sesuai jumlah kolom juga
 
        $sth = $dbh->prepare( "INSERT INTO $table ($field) VALUES ($val)" );
        $input = $sth->execute( $array );
$query10 = "UPDATE t_counter SET  counter_ruang = '$tambah_jx'";

if($dbh->exec($query10))
{
//        echo ($a." haha ".$minInstalls." haha ".$maxInstalls." haha ".$reviews." haha ".$developerEmail." haha ".$developerWebsite." haha ".$updated." haha ".$genre." haha ".$genreId." haha ".$description." haha ".$descriptionHTML." haha ".$offersIAP." haha ".$adSupported." haha ".$androidVersionText." haha ".$androidVersion." haha ".$contentRating." haha ".$recentChanges." haha ".$preregister."<br><br>");

    echo 'sukses';
//    echo "<script type='text/javascript'>alert('Anda berhasil Verifikasi.');document.location='index.php'</script>";
}
else {
    echo 'gagal';
//    echo '<a href="index.php">Kembali</a>';
       }
 if (is_uploaded_file($_FILES ['upload2'] ['tmp_name'])) 
{
     $ax="select p_id_pinjam from t_data_pinjam order by p_id_pinjam desc limit 1";
     $result_ambil = $dbh->query($ax)->fetch();
     $id_gambar_ambil = $result_ambil['p_id_pinjam'];
   // echo 'sukses';
    move_uploaded_file($tmp_gambar2, $new_location2);
    $query1 = "UPDATE t_data_pinjam SET p_tmp_pict_2 = '$new_location2' WHERE p_id_pinjam = '$id_gambar_ambil'";
        
if($dbh->exec($query1))  
       
{
    echo "<script type='text/javascript'>alert('Anda berhasil memasukkan data.');document.location='form_pengajuan.php'</script>";
}
      else
{
    echo "<script type='text/javascript'>alert('upload failed, please check your internet connection or image files ');document.location='form_pengajuan.php'</script>";
       }
 }
   if (is_uploaded_file($_FILES ['upload3'] ['tmp_name'])) 
{
   // echo 'sukses';
   $ax="select p_id_pinjam from t_data_pinjam order by p_id_pinjam desc limit 1";
     $result_ambil = $dbh->query($ax)->fetch();
     $id_gambar_ambil = $result_ambil['p_id_pinjam'];
   // echo 'sukses';
    move_uploaded_file($tmp_gambar3, $new_location3);
    $query2 = "UPDATE t_data_pinjam SET p_tmp_pict_3 = '$new_location3' WHERE p_id_pinjam = '$id_gambar_ambil'";
        
if($dbh->exec($query2))  
       
{
    echo "<script type='text/javascript'>alert('Anda berhasil memasukkan data .');document.location='form_pengajuan.php'</script>";
}
      else
{
    echo "<script type='text/javascript'>alert('upload failed, please check your internet connection or image files ');document.location='form_pengajuan.php'</script>";
       }
 }
                echo "<script type='text/javascript'>alert('Anda berhasil memasukkan data.');document.location='form_pengajuan.php'</script>";
    } else {
		// upload gagal
                echo "<script type='text/javascript'>alert('upload failed, please check your internet connection or image files');document.location='form_pengajuan.php'</script>";
				//echo 'upload failed, please check your internet connection or image files';
			}
            echo "<script type='text/javascript'>alert('Anda berhasil memasukkan data.');document.location='form_pengajuan.php'</script>";
    }else{
            echo "<script type='text/javascript'>alert('Format foto yang di upload tidak sesuai!');document.location='form_pengajuan.php'</script>";
			//echo "Format foto yang di upload tidak sesuai!";
		}
           }
?>