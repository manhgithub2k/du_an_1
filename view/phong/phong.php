<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Our Rooms</h2>
                    <div class="bt-option">
                        <a href="./home.html">Home</a>
                        <span>Rooms</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            <?php foreach ($tatCaLoaiPhong as $value) {

                $id_loai_giuong = $value['id_lg'];
                $loaiGiuong = getLoaiGiuongById($id_loai_giuong); //
            
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="<?php echo $value["anh"] ?>" alt="">
                        <div class="ri-text">
                            <h4>
                                <?php echo $value['ten_loai'] ?>
                            </h4>
                            <h3>
                                <?php echo $value["gia"] ?><span>/Pernight</span>
                            </h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>
                                            <?php echo $value["dien_tich"] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion
                                            <?php echo $value["sl_nguoi"] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>
                                            <?php echo $loaiGiuong["ten_giuong"] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>
                                            <?php for ($i = 0; $i < 2; $i++) {
                                                ?>
                                                <span>
                                                    <?php echo $tien_ich[$i]['ten_tienich'] . ", " ?>
                                                </span>
                                                <?php
                                            } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="?act=room-detail&id=<?php echo $value['id_loaiphong'] ?>" class="primary-btn">More
                                Details</a>
                        </div>
                    </div>
                </div>
                <?php

            } ?>

            <div class="col-lg-12">
                <div class="room-pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Rooms Section End -->