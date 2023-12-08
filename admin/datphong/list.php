<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentTime = new DateTime();
$vietnamTime = $currentTime->format('Y-m-d H:i:s');
?>

<!-- /.container-fluid -->

<div class="container-fluid ">
    <section class="row mx-0  " style="margin-bottom: 20px;">
        <div class="col"></div>

        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover"
            data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Danh Sách Đặt Phòng
        </button>
        <div class="col"></div>
    </section>
    <section class="row mx-0  ">
        <!-- <div class="col"></div> -->

        <span style="color: greenyellow;">
            <?php echo isset($thongbao) ? $thongbao : ""; ?>
        </span>

        <!-- <div class="col-0.5"></div>                         -->
    </section>
    <section class="row mx-0 mt">

        <!-- <div class="col"></div> -->
        <div class="col-12 fs-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col fs-6">STT</th>
                        <th scope="col">ID Đơn Hàng</th>
                        <th scope="col">Loại Phòng</th>
                        <th scope="col">Số Phòng</th>
                        <th scope="col">Họ Tên Khách Hàng </th>
                        <th scope="col">SDT </th>
                        <th scope="col">Ngày Check In</th>
                        <th scope="col">Ngày Check Out</th>
                        <th scope="col">Ngày Đặt</th>
                        <th scope="col">Ngày Hoàn Thành</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 0;
                    foreach($list_DH as $donHang) {

                        $stt++;
                        extract($donHang);
                        $listPhong = select_Allphong_trong($donHang['3']);
                        // echo "<pre>";
                        //         print_r($donHang);
                    
                        ?>
                        <form action="?act=checkin&&iddon=<?= $id_don ?>" method="POST">
                            <tr>
                                <th scope="row">
                                    <?= $stt ?>
                                </th>
                                <td>
                                    <?= $id_don ?>
                                </td>
                                <td>
                                    <?= isset($donHang['3']) ? select_Oneloaiphong($donHang['3'])['ten_loai'] : '1' ?>
                                </td>
                                <td>
                                    <?php
                                    if($trang_thai_don == 0) { ?>
                                        <div class="mb-3">
                                            <select name="tenphong" id="tenphong" class="form-control"
                                                id="exampleInputPassword1">
                                                <option value="">-- Chọn --</option>
                                                <?php
                                                foreach($listPhong as $phong) {

                                                    extract($phong);
                                                    ?>
                                                    <option value="<?= $id_phong ?>" <?= isset($idPhong) && $id_phong == $idPhong ? "selected" : "" ?>>
                                                        <?= $ten_phong ?>
                                                    </option>
                                                    
                                                <?php } ?>
                                            </select>
                                            <span id="errorngaycheckout" style="color:red"><?= isset($error['tenphong'])? $error['tenphong'] :'' ?> </span>

                                        </div>

                                    <?php } else if($trang_thai_don == 1) {
                                        echo $ten_phong;
                                        ?>

                                    <?php } else { ?>
                                        <?php if($id_p > 1000 ){
                                            echo select_Onephong($id_p-1000)['ten_phong'];
                                            ?>
                                    <?php } } ?>

                                </td>

                                <td>
                                    <?= $ten_khachhang ?>
                                </td>
                                <td>
                                    <?= $sdt ?>
                                </td>
                                <td>
                                    <?= $ngay_checkin ?>
                                </td>
                                <td>
                                    <?= $ngay_checkout ?>
                                </td>
                                <td>
                                    <?= $ngay_datphong ?>
                                </td>
                                <td>
                                    <?= $ngay_hoanthanh ?>
                                </td>

                                <td>
                                    <?php
                                    if($trang_thai_don == 2){
                                       echo "Đã Hoàn Thành";
                                    } else if( $ngay_checkin < $vietnamTime ){
                                        if($trang_thai_don == 0){
                                            echo 'Khách chưa nhận Phòng';
                                        } else if($trang_thai_don == 1 ){
                                            echo 'Đã Nhận Phòng';
                                        }
                                    } else if($ngay_checkin > $vietnamTime){
                                        if($trang_thai_don == 0){
                                            echo 'Đợi Check In';
                                        } else if($trang_thai_don == 3 ){
                                            echo 'Đã Hủy';
                                        }
                                    }

                                    
                                    // ($trang_thai_don == 2 ?
                                    //     'Đã Hoàn Thành' : ($ngay_checkin < $vietnamTime ? ($trang_thai_don == 0 ? 'Khách chưa nhận Phòng' : ($trang_thai_don == 1 ? 'Đã Nhận Phòng' : '')) : 'Đợi Check In')); 
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if($trang_thai_don == 0 && $ngay_checkin <= $vietnamTime) { ?>
                                        <!-- <button type="submit" class="btn btn-success"><a href="">Check in </a></button> <br> <br> -->
                                        <input type="submit" class="btn btn-success" value="Check In" name="submit">

                                    <?php } else if($trang_thai_don == 1) {
                                        ?>
                                            <!-- <button type="submit" class="btn btn-danger" > <a href="?act=deleteu&id=<?= $id_khachhang ?>" onclick="return confirm('Bạn muốn xóa ?' )">Xóa</a></button> -->
                                            <button type="submit" class="btn btn-warning"><a
                                                    href="?act=checkout&iddon=<?= $id_don ?>&idphong= <?= $id_phong ?>">Check
                                                    out</a></button>
                                                   
                                    <?php } else if( $trang_thai_don == 0 && $ngay_checkin > $vietnamTime) { ?>
                                            <button type="submit" class="btn btn-danger" > <a href="?act=huyphong&iddon=<?= $id_don ?>&idphong= <?= $id_phong ?>" onclick="return confirm('Bạn muốn Hủy ?' )">Hủy Đặt Phòng</a></button>
                                        
                                    <?php } ?>
                                    <!-- <?php 
                                                    echo $id_don."</br>";
                                                    echo $id_phong;
                                                    ?> -->

                                </td>

                            </tr>
                        </form>

                    <?php } ?>

                </tbody>
            </table>

        </div>
        <!-- <div class="col"></div> -->

    </section>


</div>