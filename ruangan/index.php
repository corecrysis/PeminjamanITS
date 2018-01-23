<?php
include('../koneksi.php');
session_start();
       if (!isset($_SESSION['id_admin'])){
     header( 'Location:../login.html');
 } else {
$jut = $_SESSION['id_admin'];
$query = "SELECT * FROM t_user where m_id_user='$jut'";
           $result = $dbh->query($query)->fetch();
//$query1= "SELECT COUNT(*) AS masuk FROM b_member where m_id_member > 1";ORDER BY r_id_news DESC LIMIT 10 OFFSET 0
//           $result1 = $dbh->query($query1)->fetch();  where t_nama_mobil =''
            
           $query3= "SELECT * FROM t_ruang  ";
           $result1 = $dbh->query($query3)->fetchAll();
           $query4= "SELECT COUNT(*) AS ruang FROM t_ruang  ";
           $result4 = $dbh->query($query4)->fetch();
           
           $query_pinjam= "SELECT * FROM t_data_pinjam  ";
           $result_pinjam = $dbh->query($query_pinjam)->fetchAll();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Peminjaman ITS</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../css/responsive.bootstrap.min.css">
        <link href="../css/datepicker3.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
        <!--Icons-->
        <script src="../js/lumino.glyphs.js"></script>
        <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#"><span>Peminjaman</span>ITS</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <svg class="glyph stroked male-user">
                                    <use xlink:href="#stroked-male-user"></use>
                                </svg>
                                <?php echo $result['m_user_name'];?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="../logout.php">
                                        <svg class="glyph stroked cancel">
                                            <use xlink:href="#stroked-cancel"></use>
                                        </svg> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <!--				<input type="text" class="form-control" placeholder="Search">-->
                </div>
            </form>
            <ul class="nav menu">
                <li>
                    <a href="../index.php">
                        <svg class="glyph stroked dashboard-dial">
                            <use xlink:href="#stroked-dashboard-dial"></use>
                        </svg> Halaman Utama</a>
                </li>
                <li class="active">
                    <a href="index.php">
                        <svg class="glyph stroked dashboard-dial">
                            <use xlink:href="#stroked-dashboard-dial"></use>
                        </svg> Informasi</a>
                </li>
                <li>
                    <a href="form_pengajuan.php">
                        <svg class="glyph stroked table">
                            <use xlink:href="#stroked-table"></use>
                        </svg> Form Pengajuan</a>
                </li>
                <li>
                    <a href="report.php">
                        <svg class="glyph stroked table">
                            <use xlink:href="#stroked-table"></use>
                        </svg> Pelaporan</a>
                </li>
                <?php if($result['m_id_user']==1){} else { ?>
                <li>
                    <a href="settings.php">
                        <svg class="glyph stroked app-window">
                            <use xlink:href="#stroked-app-window"></use>
                        </svg> Setting </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!--/.sidebar-->
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <svg class="glyph stroked home">
                                <use xlink:href="#stroked-home"></use>
                            </svg>
                        </a>
                    </li>
                </ol>
            </div>
            <!--/.row-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Informasi</h1> </div>
            </div>
            <!--/.row-->
            <div class="row"> </div>
            <!--/.row-->
            <center>
                <style>
                    .col-centered {
                        float: none;
                        margin: 0 auto;
                    }
                </style>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-centered">
                            <?php
           $date2 = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
           $p_timest= $date2->format('Y-m-d H:i:s');
           if($jut == 1){
               ?>
                            <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <center>
                                    <div class="panel-heading">Table Informasi Ruangan</div>
                                </center>
                                <thead>
                                    <tr>
                                        <?php foreach ( $result1 as $r1 ) { 
                            $p_barang = $r1['t_id_ruang'];
                       $query_pinjam = "SELECT * FROM t_data_pinjam p where p_golongan = 'ruang' AND p_barang= '$p_barang' AND p_m_kembali >= '$p_timest'";
                   
                       $result_pinjam = $dbh->query($query_pinjam)->fetchAll();
                            ?>
                                            <th>
                                                <?php echo $r1['m_nama_barang'];?>
                                            </th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $result_pinjam as $r2 ) { ?>
                                        <tr>
                                            <td id="<?php echo $r2['p_id_pinjam'] ?>">
                                                <?php 
                                $originalaDate = $r2['p_m_pinjam'];
                                $oriaDate = $r2['p_m_kembali'];
                                $newaDate = date("d-m-Y H:i:s", strtotime($originalaDate));
                                $lastaDate = date("d-m-Y H:i:s", strtotime($oriaDate));
                                echo "<a href='detail.php?id=".$r2['p_id_pinjam']."' >".$newaDate." s/d ". $lastaDate."</a>"; ?> </td>
                                            <td>
                                                    <?php $verif = $r2['p_verif']; 
                                    if($verif == '0') { echo 'Belum Diverifikasi';} else
                                        if ($verif == '1') { echo 'Sudah Diverifikasi';} else
                                        { echo 'Verifikasi Ditolak';}
                                    ?>
                                                </td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                                <?php } ?>
                            </table>
                            <?php   
               
           } else { ?>
                                <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <center>
                                        <div class="panel-heading">Table Informasi Fasilitas</div>
                                    </center>
                                    <thead>
                                        <tr>
                                            <?php foreach ( $result1 as $r1 ) { 
                            $p_barang = $r1['t_id_ruang'];
                       $query_pinjam = "SELECT * FROM t_data_pinjam p where p_golongan = 'ruang' AND p_barang= '$p_barang' AND p_m_kembali >= '$p_timest' ";
               
                       $result_pinjam = $dbh->query($query_pinjam)->fetchAll();
                            ?>
                                                <th>
                                                    <?php echo $r1['m_nama_barang'] ;?>
                                                </th>
                                                <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $result_pinjam as $r2 ) { ?>
                                            <tr>
                                                <td id="<?php echo $r2['p_id_pinjam'] ?>">
                                                    <?php 
                                $originalDate = $r2['p_m_pinjam'];
                                $oriDate = $r2['p_m_kembali'];
                                $newDate = date("d-m-Y H:i:s", strtotime($originalDate));
                                $lastDate = date("d-m-Y H:i:s", strtotime($oriDate));
                                echo "<a href='detail.php?id=".$r2['p_id_pinjam']."' >".$newDate." s/d ". $lastDate."</a>"; ?> </td>
                                                <td>
                                                    <?php $verif = $r2['p_verif']; 
                                    if($verif == '0') { echo 'Belum Diverifikasi';} else
                                        if ($verif == '1') { echo 'Sudah Diverifikasi';} else
                                        { echo 'Verifikasi Ditolak';}
                                    ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                    <?php } ?>
                                </table>
                                <?php } ?>
                        </div>
                        <!--/.row-->
                    </div>
                </div>
            </center>
            <!--/.row-->
            <div class="row"> </div>
            <!--/.row-->
            <div class="row"> </div>
            <!--/.row-->
        </div>
        <!--/.main-->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/chart.min.js"></script>
        <script src="../js/chart-data.js"></script>
        <script src="../js/easypiechart.js"></script>
        <script src="../js/easypiechart-data.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>
        <script src="../js/bootstrap-table.js"></script>
        <!-- DataTables -->
        <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example1').DataTable({
                    bFilter: false
                    , bPaginate: false
                    , bSort: false
                    , bInfo: false
                });
            });
        </script>
        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        <script>
            ! function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);
            $(window).on('resize', function () {
                if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
            })
        </script>
    </body>

    </html>
    <?php } ?>