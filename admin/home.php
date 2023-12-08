<?php 
$sl_phongdon = $sl_phongdon['soluong'];
$sl_phongdoi = $sl_phongdoi['soluong'];
$sl_canho = $sl_canho['soluong'];
$sl_villa = $sl_villa['soluong'];

echo "<script>";
echo "var sl_phongdon = " . json_encode($sl_phongdon) . ";";
echo "var sl_phongdoi = " . json_encode($sl_phongdoi) . ";";
echo "var sl_canho = " . json_encode($sl_canho) . ";";
echo "var sl_villa = " . json_encode($sl_villa) . ";";

echo "</script>";
?>
<script src="../js/demo/chart-pie-demo.js"></script>

<div class="container-fluid" >

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">POLY HOTEL</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Tổng tiền tháng</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo 0 +  $tongtien_thang['tongtien_thang'] ; ?> VND</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Tổng tiền ngày</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo 0+$tongtien_ngay['tongtien_ngay']; ?> VND</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tỉ lệ đặt phòng
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $tile_phongduocdat['tile'] ?> %</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: <?php echo $tile_phongduocdat['tile'];?>%" aria-valuenow="<?php echo $tile_phongduocdat['tile'];?>" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                   Tổng đơn ngày</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tongdon_ngay['tongdon_ngay']; ?> ĐƠN</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Doanh thu theo các tháng </h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Biểu đồ phòng</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Phòng đơn
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Phòng đôi
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Căn hộ
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-warning"></i> Villa
                            </span>
                        </div>
                    </div>
                </div>
            </div>
</div> 
</div>
<?php
$tongtien_thang1 = 0 + $tongtien_thang1['tongtien_thang'];
$tongtien_thang2 = 0 + $tongtien_thang2['tongtien_thang'];
$tongtien_thang3 = 0 + $tongtien_thang3['tongtien_thang'];
$tongtien_thang4 = 0 + $tongtien_thang4['tongtien_thang'];
$tongtien_thang5 = 0 + $tongtien_thang5['tongtien_thang'];
$tongtien_thang6 = 0 + $tongtien_thang6['tongtien_thang'];
$tongtien_thang7 = 0 + $tongtien_thang7['tongtien_thang'];
$tongtien_thang8 = 0 + $tongtien_thang8['tongtien_thang'];
$tongtien_thang9 = 0 + $tongtien_thang9['tongtien_thang'];
$tongtien_thang10 = 0 + $tongtien_thang10['tongtien_thang'];
$tongtien_thang11 = 0 + $tongtien_thang11['tongtien_thang'];
$tongtien_thang12 = 0 + $tongtien_thang12['tongtien_thang'];
echo "<script>";

echo "var tongtien_thang1 = " . json_encode($tongtien_thang1) . ";";
echo "var tongtien_thang2 = " . json_encode($tongtien_thang2) . ";";
echo "var tongtien_thang3 = " . json_encode($tongtien_thang3) . ";";
echo "var tongtien_thang4 = " . json_encode($tongtien_thang4) . ";";
echo "var tongtien_thang5 = " . json_encode($tongtien_thang5) . ";";
echo "var tongtien_thang6 = " . json_encode($tongtien_thang6) . ";";
echo "var tongtien_thang7 = " . json_encode($tongtien_thang7) . ";";
echo "var tongtien_thang8 = " . json_encode($tongtien_thang8) . ";";
echo "var tongtien_thang9 = " . json_encode($tongtien_thang9) . ";";
echo "var tongtien_thang10 = " . json_encode($tongtien_thang10) . ";";
echo "var tongtien_thang11 = " . json_encode($tongtien_thang11) . ";";
echo "var tongtien_thang12 = " . json_encode($tongtien_thang12) . ";";
echo "</script>";


?>

<!-- <script src="../js/demo/chart-area-demo.js"></script> -->
<script src="../js/demo/chart-area-demo.js"></script>
