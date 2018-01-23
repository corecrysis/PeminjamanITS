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
            $query1 = "SELECT t_id_ruang, m_nama_barang FROM t_ruang ORDER BY m_nama_barang;";
           $result1 = $dbh->query($query1)->fetchAll();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Peminjaman ITS</title>
        <!--
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.bootstrap.min.css">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/date/datepicker.min.css" rel="stylesheet"  type="text/css">
Icons
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/lumino.glyphs.js"></script>
<script src="js/datepicker.js"></script>
<script src="js/datepicker.en.js"></script>
-->
        <!--Icons-->
        <!--<script src="js/lumino.glyphs.js"></script>-->
        <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!--<link href="css/datepicker3.css" rel="stylesheet">-->
        <link href="../css/styles.css" rel="stylesheet">
        <link href="../css/date/datepicker.min.css" rel="stylesheet" type="text/css">
        <!--Icons-->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/lumino.glyphs.js"></script>
        <script src="../js/datepicker.js"></script>
        <script src="../js/datepicker.en.js"></script>
    </head>

    <body>
        <script type="text/javascript">
            function checkNumber(e) {
                var key = e.which || e.keyCode || e.charCode;
                if (key == 8 || key == 9 || key == 44 || key == 13 || key == 27 || key == 190 || (key >= 35 && key <= 38) || (key >= 48 && key <= 57)) return;
                else {
                    e.preventDefault();
                }
            }
        </script>
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
                <li >
                    <a href="../index.php">
                        <svg class="glyph stroked dashboard-dial">
                            <use xlink:href="#stroked-dashboard-dial"></use>
                        </svg> Halaman Utama</a>
                </li>
                <li>
                    <a href="index.php">
                        <svg class="glyph stroked dashboard-dial">
                            <use xlink:href="#stroked-dashboard-dial"></use>
                        </svg> Informasi</a>
                </li>
                <li  class="active">
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
                <div class="container">
                    <div class="page-header">
                        <center>
                            <h3> Daftarkan Peminjaman</h3></center>
                    </div>
                    <form class="form-horizontal" action="p_form.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Unit Peminjam</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="p_unit" placeholder="Bem/Hima" required> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">Jenis Ruangan</label>
                            <div class="col-md-4">
                                <select name="p_barang" class="form-control" required>
                                    <?php foreach ( $result1 as $r1 ) 
            { ?>
                                        <option value="<?php echo $r1['t_id_ruang'] ?>">
                                            <?php echo $r1['m_nama_barang'];?>
                                        </option>
                                        <!--                    <input type="hidden" name="idview" id="hx" value="<?php echo $r1['id_member']; ?>">-->
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal dan Waktu Peminjaman</label>
                            <div class="col-md-4">
                                <input type='text' name="p_m_pinjam" data-date-format="yyyy-mm-dd" data-time-format="hh:mm" class='datepicker-here' data-timepicker="true" data-language='en' required /> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">Tanggal dan Waktu Pengembalian</label>
                            <div class="col-md-4">
                                <input type='text' name="p_m_kembali" data-date-format="yyyy-mm-dd" data-time-format="hh:mm" class='datepicker-here' data-timepicker="true" data-language='en' required /> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="message">Tujuan Peminjaman</label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="message" name="p_tujuan" placeholder="Tujuan Kegiatan" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Contact Person</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="p_cp" onkeypress="checkNumber(event)" placeholder="masukkan cp" required> </div>
                        </div>
                        <div class="form-group">
                            <label for="InputFile" class="col-sm-3 control-label">Upload Bukti Foto 1 (Wajib)</label>
                            <div class="col-md-4">
                                <input type="file" name="upload1" id="exampleInputFile" required>
                                <p class="help-block">tipe file : .jpg ; .png : .png ; .jpg ; .jpeg </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputFile" class="col-sm-3 control-label">Upload Bukti Foto 2 (jika Ada)</label>
                            <div class="col-md-4">
                                <input type="file" name="upload2" id="exampleInputFile">
                                <p class="help-block">tipe file : .jpg ; .png : .png ; .jpg ; .jpeg </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputFile" class="col-sm-3 control-label">Upload Bukti Foto 3 (Jika Ada)</label>
                            <div class="col-md-4">
                                <input type="file" name="upload3" id="exampleInputFile">
                                <p class="help-block">tipe file : .jpg ; .png : .png ; .jpg ; .jpeg </p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label"></label>
                            <div class="col-sm-4">
                                <button type="submit" name="submit" class="btn btn-primary" value="simpan">Submit</button>
                                <button type="reset" class="btn btn-primary" value="reset" onclick="return confirm('hapus data yang telah diinput?')">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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