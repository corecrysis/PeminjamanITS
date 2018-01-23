<?php 
include('../koneksi.php');
session_start();
if (!isset($_SESSION['id_admin'])){
     header( 'Location:../login.html');
 } else {
    $jut = $_SESSION['id_admin'];
$query = "SELECT * FROM t_user where m_id_user='$jut'";
           $result = $dbh->query($query)->fetch();
//$tes = $_SESSION['id'];// = $_POST['idview'];
//$query2 = "SELECT *  FROM member WHERE id = '$tes'";

$idx = $_GET['id'];
    $_SESSION['idx'] = $idx;
$query1 = "SELECT *  FROM t_data_pinjam WHERE p_id_pinjam=$idx";
$result1 = $dbh->query($query1)->fetch();
    $query2 = "select m.m_nama_barang from t_data_pinjam  p join t_fasilitas m on p.p_barang = m.t_id_fasilitas where p_id_pinjam=$idx";
$result2 = $dbh->query($query2)->fetch();
//$stmt = $dbh->query('SELECT * FROM qcemulsifying where idx'); 
  
//$result2 = $dbh->query($query2)->fetch();

//$stmt2->setFetchMode(PDO::FETCH_ASSOC);
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
                <li class="active">
                    <a href="index.php">
                        <svg class="glyph stroked dashboard-dial">
                            <use xlink:href="#stroked-dashboard-dial"></use>
                        </svg> Back</a>
                </li>
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
                    <h1 class="page-header">Dashboard</h1> </div>
            </div>
            <!--/.row-->
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-md-8 ">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">Detail</div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <label>Unit Peminjam</label>
                                        <p>
                                            <?php echo $result1['p_unit']; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <label>Tanggal Peminjaman</label>
                                        <p>
                                            <?php 
                                    $originalaDate = $result1['p_m_pinjam'];
                                    $oriaDate = $result1['p_m_kembali'];
                                    $newaDate = date("d-m-Y H:i:s", strtotime($originalaDate));
                                    $lastaDate = date("d-m-Y H:i:s", strtotime($oriaDate));
                                            echo $newaDate; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <label>Tanggal Pengembalian</label>
                                        <p>
                                            <?php echo $lastaDate; ?>
                                        </p>
                                    </div>
                                    <label>Jenis Fasilitas</label>
                                    <p>
                                        <?php echo $result2['m_nama_barang']; ?>
                                    </p>
                                    <label>Tujuan Peminjaman</label>
                                    <p>
                                        <?php echo $result1['p_tujuan']; ?>
                                    </p>
                                    <label>Contact Person</label>
                                    <p>
                                        <?php echo $result1['p_cp']; ?>
                                    </p>
                                    <label>Bukti Foto 1</label>
                                    <p>
                                        <img src="<?php echo $result1['p_tmp_pict_1']; ?>" width="30%">
                                    </p>
                                    <label>Bukti Foto 2</label>
                                    <p>
                                        <img src="<?php echo $result1['p_tmp_pict_2']; ?>" width="30%">
                                    </p>
                                    <label>Bukti Foto 3</label>
                                    <p>
                                        <img src="<?php echo $result1['p_tmp_pict_3']; ?>" width="30%">
                                    </p>
                                    <div class="col-md-8">
                                        <?php if($jut == 1){} else { ?>
                                            <label>Status</label>
                                            <p>
                                                <?php 
                                                    $verif = $result1['p_verif'];
    
                                                    if($verif == '0'){echo 'Belum diverifikasi';
                     ?>
                                                    <br>
                                                    <div class="col-md-4">
                                                        <form action="check_verif.php" method="post">
                                                            <label>Konfirmasi</label>
                                                            <button class="btn btn-primary" type="submit" name="submit_log">Verifikasi</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <form action="tolak_verif.php" method="post">
                                                            <label>Tolak Verifikasi</label>
                                                            <button class="btn btn-primary" type="submit" name="submit_log">Tolak Verif</button>
                                                        </form>
                                                    </div>
                                                    <?php
                                                        } else if($verif == '1') {
                                                        echo 'Sudah diverifikasi';
                                                        ?>
                                                        <br>
                                                        <form action="tolak_verif.php" method="post">
                                                            <label>Tolak Verifikasi</label>
                                                            <button class="btn btn-primary" type="submit" name="submit_log">Tolak Verif</button>
                                                        </form>
                                                        <?php 
                                                        
                                                    } else {
                                                        echo 'Verifikasi Ditolak';
                                                        ?>
                                                            <div class="col-md-4">
                                                                <form action="check_verif.php" method="post">
                                                                    <label>Konfirmasi</label>
                                                                    <button class="btn btn-primary" type="submit" name="submit_log">Verifikasi</button>
                                                                </form>
                                                            </div>
                                                            <?php
                                                    }  ?>
                                            </p>
                                            <?php } ?>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!--/.row-->
            <div class="row"> </div>
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
                $('#example1').DataTable();
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