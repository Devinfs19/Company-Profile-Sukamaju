<?php 
    include ("konek.php");
?>
<?php 
    $query1             = $conn->query("SELECT * FROM tbl_kependudukan");
    $jml_warga          = mysqli_num_rows($query1);

    $query2             = "SELECT count(distinct no_kk) as total FROM tbl_kependudukan";
    $result             = mysqli_query($conn,$query2);
    $values             = mysqli_fetch_assoc($result);
    $num_rows           = $values['total'];

    $query3             = "SELECT count(*) as total1 FROM tbl_kependudukan where jenis_kelamin='laki-laki'";
    $result1             = mysqli_query($conn,$query3);
    $values1             = mysqli_fetch_assoc($result1);
    $num_rows1           = $values1['total1'];

    $query4             = "SELECT count(*) as total2 FROM tbl_kependudukan where jenis_kelamin='Perempuan'";
    $result2             = mysqli_query($conn,$query4);
    $values2             = mysqli_fetch_assoc($result2);
    $num_rows2           = $values2['total2'];

    $query5             = "SELECT count(*) as total3 FROM tbl_kependudukan where status='Belum Menikah'";
    $result3             = mysqli_query($conn,$query5   );
    $values3             = mysqli_fetch_assoc($result3);
    $num_rows3           = $values3['total3'];

    $query6             = "SELECT count(*) as total4 FROM tbl_kependudukan where status='Menikah'";
    $result4             = mysqli_query($conn,$query6);
    $values4             = mysqli_fetch_assoc($result4);
    $num_rows4           = $values4['total4'];
    
?>
<h1 class="page-header">Data Kependudukan</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-group fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo number_format ($jml_warga,0,",",","); ?></div>
                                            <div>Jumlah Warga</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                	<div class="panel-footer">
                                        

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo number_format ($num_rows); ?></div>
                                            <div>Jumlah KK</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                
                                        

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-male fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo number_format ($num_rows1); ?></div>
                                            <div>Penduduk Laki-laki</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                       

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-male fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo number_format ($num_rows2); ?></div>
                                            <div>Penduduk Perempuan</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                       

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-heart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo number_format ($num_rows3); ?></div>
                                            <div>Belum Menikah</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                       
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-expeditedssl fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo number_format ($num_rows4); ?></div>
                                            <div>Menikah</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                     

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>