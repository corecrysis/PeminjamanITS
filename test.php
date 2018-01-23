<?php
$date2 = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
$date3= $date2->format('d-m-Y h:i a');// 0,'%d/%m/%Y %h:%i','local'
echo $date3;
?>

02/07/2017 yyyy-February-07 04:02