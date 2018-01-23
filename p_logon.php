<?php
session_start();
include_once('koneksi.php');
//$coba=$_POST[$aku];

if ( isset($_POST['submit_log']) ) {
	$sth = $dbh->prepare( "SELECT * FROM t_user WHERE m_user_name=? and m_pass=? " );
   
    $aku = $_POST['m_pass'];
    $coba = MD5("darwin" . $aku);
    //$result1 =  $_POST['status'];
	//$result2 =  $_POST['a_status'];
	$sth->execute( array( $_POST['m_user_name'], $coba ) );
   
	$result = $sth->fetch( PDO::FETCH_OBJ );
  
   

    
  //  $result1 =  ;
//	$result2 =  ;
	
	if ( $result ) {
       if($result->m_id_user==1)
           
        {
            $_SESSION['id_admin'] = $result->m_id_user;
            header( 'Location:index.php');
        }
        else if($result->m_id_user==2){
		
		$_SESSION['id_admin'] = $result->m_id_user;
		 echo "<script type='text/javascript'>alert('Anda berhasil Melakukan Login.');document.location='index.php'</script>";
		
		} else {
            $_SESSION['id_admin'] = $result->m_id_user;
		 echo "<script type='text/javascript'>alert('Anda berhasil Melakukan Login.');document.location='index.php'</script>";
        }
	} else 
		echo "<script type='text/javascript'>alert('Anda Gagal Login, Isikan Username dan Password dengan benar');document.location='login.html'</script>";
        
}
?>