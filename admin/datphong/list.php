<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentTime = new DateTime();
$vietnamTime = $currentTime->format('Y-m-d H:i:s');
?>

<!-- /.container-fluid -->

<div class="container-fluid " >
<section class="row mx-0  " style="margin-bottom: 20px;">
            <div class="col"></div>

            <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                Danh Sách Đặt Phòng
                </button>
            <div class="col"></div>                        
        </section>
        <section class="row mx-0  ">
            <!-- <div class="col"></div> -->

            <span style="color: greenyellow;"><?php  echo isset($thongbao)? $thongbao : "";?></span>

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
                            foreach ($list_DH as $donHang) {
                            $stt++;
                            extract($donHang);
                            
                        ?>
                        <tr>
                        <th scope="row"><?= $stt ?></th>
                        <td><?= $id_don ?></td>
                        <td><?= $ten_phong ?></td>
                        <td><?= $ten_khachhang ?></td>
                        <td><?= $sdt ?></td>
                        <td><?= $ngay_checkin ?></td>
                        <td><?= $ngay_checkout ?></td>
                        <td><?= $ngay_datphong ?></td>
                        <td><?= $ngay_hoanthanh ?></td>
                        
                        <td><?= $trang_thai_don == 2 ? 'Đã Hoàn Thành' : ($ngay_checkin < $vietnamTime ? ($trang_thai_don == 0 ? 'Khách chưa nhận Phòng' : 'Đợi Check In') : '') ?></td>

                        <td>
                            <?php
                            if($trang_thai_don == 0) { ?>
                            <button type="submit" class="btn btn-success"><a href="?act=checkin&&iddon=<?= $id_don ?>&&idphong= <?= $id_phong ?>">Check in </a></button> <br> <br>

                           <?php } else if($trang_thai_don == 1) {
                            ?>
                            <!-- <button type="submit" class="btn btn-danger" > <a href="?act=deleteu&id=<?= $id_khachhang?>" onclick="return confirm('Bạn muốn xóa ?' )">Xóa</a></button> -->
                            <button type="submit" class="btn btn-danger"><a href="?act=?act=checkout&&iddon=<?= $id_don ?>&&idphong= <?= $id_phong ?>">Check out</a></button>
                            <?php } else { ?>
                            <?php } ?>

                        </td>
                        
                        </tr> 

                            <?php } ?>
                                                        
                    </tbody>
                </table>
                
            </div>
            <!-- <div class="col"></div> -->

        </section>


    </div>

