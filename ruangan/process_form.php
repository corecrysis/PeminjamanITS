<?php
include('../koneksi.php');
$p_m_from         = $_POST['p_m_from'];
$_SESSION['p_m_from'] = $p_m_from;
$p_m_to         = $_POST['p_m_to'];
$_SESSION['p_m_to'] = $p_m_to;
$query1 = "SELECT * FROM t_data_pinjam p join t_ruang m on p.p_barang = m.t_id_ruang where (p_m_pinjam BETWEEN '" . $p_m_from . "' AND  '" . $p_m_to . "') AND p_verif = '1' AND  p_golongan = 'ruang' ORDER by p_counter ASC";
        $result1 = $dbh->query($query1)->fetchAll();

    $query2 = "select m.m_nama_barang from t_data_pinjam  p join t_ruang m on p.p_barang = m.t_id_ruang";
$result2 = $dbh->query($query2)->fetch();

echo'<script>
    function printDiv() {
     var printContents = document.getElementById("printableArea").innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<div id="printableArea"><table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<img src="img/kop_laporan_ruang.png" width="100%">
    <thead>
        <tr>
            <th>No.</th>
            <th>Waktu Peminjaman</th>
            <th>Waktu Pengembalian</th>
            <th>Jenis Ruangan</th>
            <th>Unit Peminjam</th>
            <th>Tujuan</th>
            <th>Contact Person</th>
        </tr>
    </thead>
    <tbody>
        <tr>';
            foreach ( $result1 as $r1 ) 
            {
       echo '         <tr>
                    <td> ';
                                $originalaDate = $r1['p_m_pinjam'];
                                $oriaDate = $r1['p_m_kembali'];
                                $newaDate = date("d-m-Y H:i:s", strtotime($originalaDate));
                                $lastaDate = date("d-m-Y H:i:s", strtotime($oriaDate));
                        echo $r1['p_id_pinjam'];
                  echo '  </td>
                  <td> ';
                        echo $newaDate;
                    echo '  </td>
                    <td> ';
                       echo $lastaDate;
                    echo '  </td>
                    <td> ';
                        echo $r1['m_nama_barang'];
                    echo '  </td>
                    <td> ';
                         echo $r1['p_unit'];
                    echo '  </td>
                    <td> ';
                        echo $r1['p_tujuan'];
                   echo ' </td>
                       <td> ';
                        echo $r1['p_cp'];
                   echo ' </td>';
                    } 
               echo ' </tr>
    </tbody>
</table>

<div class="col-md-10">
<img src="img/mengetahui.png" class="pull-right img-responsive" width="30%">
</div>
</div>
<input type="button"  class="btn btn-primary" onclick="printDiv()" value="Print" style="float:right;" />';
?>