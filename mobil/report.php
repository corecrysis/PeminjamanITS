<?php
include('../koneksi.php');
session_start();
       if (!isset($_SESSION['id_admin'])){
     header( 'Location:../login.html');
 } else {
$jut = $_SESSION['id_admin'];
$query = "SELECT * FROM t_user where m_id_user='$jut'";
           $result = $dbh->query($query)->fetch();
//               $from_date = '2017-02-01';
//               $to_date = '2017-02-08';
//           $query1 = "SELECT * FROM t_data_pinjam where (p_m_pinjam BETWEEN '" . $from_date . "' AND  '" . $to_date . "') AND  p_golongan = 'trans' ORDER by p_id_pinjam DESC";
//           $result1 = $dbh->query($query1)->fetchAll();
//$query1= "SELECT COUNT(*) AS masuk FROM b_member where m_id_member > 1";
//           $result1 = $dbh->query($query1)->fetch();
// $query2= "SELECT * FROM b_news  ORDER BY r_id_news DESC LIMIT 10 OFFSET 0";
//           $result2 = $dbh->query($query2)->fetchAll();
?>
<script type="text/javascript">
      
function updateForm() {
  var url_do = "process_form.php";
  //var plugin_reffer = document.getElementById('plugin_reffer');
  $.post(url_do, {
    
    p_m_from: $('#p_m_from').val(),
    p_m_to: $('#p_m_to').val()
   },
   function(data) {
    console.log(data);
   
      $('#detail_container').html(data);

   });


 }
</script>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Peminjaman ITS</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!--<link href="css/datepicker3.css" rel="stylesheet">-->
        <link href="../css/styles.css" rel="stylesheet">
        <link href="../css/date/datepicker.min.css" rel="stylesheet" type="text/css">
        <!--Icons-->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/lumino.glyphs.js"></script>
        <script src="../js/datepicker.js"></script>
        <script src="../js/datepicker.en.js"></script>
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
                <li>
                    <a href="form_pengajuan.php">
                        <svg class="glyph stroked table">
                            <use xlink:href="#stroked-table"></use>
                        </svg> Form Pengajuan</a>
                </li>
                <li class="active">
                    <a href="report.php">
                        <svg class="glyph stroked table">
                            <use xlink:href="#stroked-table"></use>
                        </svg> Pelaporan</a>
                </li>
                <li>
                    <a href="settings.php">
                        <svg class="glyph stroked app-window">
                            <use xlink:href="#stroked-app-window"></use>
                        </svg> Setting </a>
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
                    <h1 class="page-header">Pelaporan</h1> </div>
            </div>
            <!--/.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Pelaporan Transportasi</div>
                        <div class="panel-body">
                            <!--<table data-toggle="table" data-url="tables/data2.json" >
						    <thead>
						    <tr>
						        <th data-field="id" data-align="right">Item ID</th>
						        <th data-field="name">Item Name</th>
						        <th data-field="price">Item Price</th>
						    </tr>
						    </thead>
						</table>-->
                            
                                <center>
                                    <div class="panel-heading">Table Mobil</div>
                                </center>
                                
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Rentang Waktu</label>
                                        <div class="col-md-3">
                                            <input type='text' name="p_m_from" id="p_m_from" data-date-format="yyyy-mm-dd" data-time-format="hh:mm" class='datepicker-here' data-timepicker="true" data-language='en' /> </div>
                                        <label class="col-sm-1 control-label">s/d</label>
                                        <div class="col-md-3">
                                            <input type='text' name="p_m_to" id="p_m_to" data-date-format="yyyy-mm-dd" data-time-format="hh:mm" class='datepicker-here' data-timepicker="true" data-language='en' /> </div>
                                        <button type="submit" name="submit" class="btn btn-primary" onClick="updateForm();" value="simpan">Tampilkan</button>
                                    </div>
                                
                                <br>
                                <div id="detail_container" name="detail_container"></div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row-->
            <div class="row"> </div>
            <!--/.row-->
            <div class="row"> </div>
            <!--/.row-->
            <div class="row">
                <div class="col-md-8"> </div>
                <!--/.col-->
                <div class="col-md-4"> </div>
                <!--/.col-->
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
                $('#example2').DataTable();
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
            $('#calendar').datepicker({});
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