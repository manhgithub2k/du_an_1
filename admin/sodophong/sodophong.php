<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentTime = new DateTime();
$vietnamTime = $currentTime->format('Y-m-d H:i:s');
?>
<div class="container-fluid ">
    <section class="row mx-0  " style="margin-bottom: 20px;">
        <div class="col"></div>
        <div class="col-10">
            <button type="button" class="btn btn-light border border-success"><a href="?act=sodophong">Tất cả (
                    <?=100?>)
                </a></button>
            <button type="button" class="btn btn-success"><a href="?act=sodophong&&trangthai=trong">Trống (
                    <?=80?>)
                </a></button>
            <button type="button" class="btn btn-info"><a href="?act=sodophong&&trangthai=danhan">Đã Nhận (
                    <?=15?>)
                </a></button>
            <button type="button" class="btn btn-warning"><a href="?act=sodophong&&trangthai=quahan">Quá hạn (
                    <?=3?>)
                </a></button>

            <button type="button" class="btn btn-primary"><a href="?act=sodophong&&trangthai=dadat">Đã Đặt (
                    <?=10?>)
                </a></button>
            <button type="button" class="btn btn-danger"><a href="?act=sodophong&&trangthai=khongden">Không Đến (
                    <?=1?>)
                </a></button>

            <button type="button" class="btn btn-secondary"><a href="?act=sodophong&&trangthai=ban">Bẩn (
                    <?=1?>)
                </a></button>
            <button type="button" class="btn btn-dark"><a href="?act=sodophong&&trangthai=dangsua">Đang Sửa (
                    <?=2?>)
                </a></button>

        </div>
        <div class="col"></div>
    </section>
    <hr>
    <section class="row mx-0  ">
        <?php foreach ($listPhong as $p) {
    extract($p);

    ?>

        <div class="col-3 border border-success "
            style="display: flex; border-radius: 8px; float: left; margin-left: 60px; margin-bottom: 30px;"
            id="cart<?=$id_phong?>" data-bs-toggle="modal" href="#exampleModalToggle<?=$id_phong?>" role="button">
            <div class="row mx btn btn-success " style="line-height: 100%;" id="cart_<?=$id_phong?>">
                <?=$ten_phong?>
            </div>
            <div class=" mx-4" style="">
                <p>Start:
                    <?=$ngay_checkin?>
                </p>
                <p>End:
                    <?=$ngay_checkout?>
                </p>
                <strong>
                    <?=$ten_khachhang?>
                </strong> <br>
                <strong style="color: red;">Tổng :
                    <?=$tong_tien?> VND
                </strong> <br>
                <i>
                    <?=isset($ngay_checkout) ? (new DateTime($ngay_checkout))->diff(new DateTime())->format('%a ngày %H:%I:%S') : ''?>
                </i>
            </div>

        </div>
        <div class="modal fade " id="exampleModalToggle<?=$id_phong?>" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel<?=$id_phong?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Phòng
                            <?=$ten_phong?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                    <?php if (!isset($ten_khachhang) && $trang_thai == 0) {?>

                        <form action="?act=datphong" method="post" >
                            <!-- <?php print_r($p)?> -->
                            <input type="hidden" name="id_phong" value="<?=$id_phong?>">
                            <input type="hidden" name="id_loaiphong" value="<?php echo $p['id_lp'] ?>">
                            <input type="hidden" name="giaphong" id="gia" value="<?= $gia ?>">
                            <input type="hidden" name="tong" id="tong" >

                            <div class="mb-3">
                            
                                <label for="exampleInputname" class="form-label">Tên khách hàng</label>
                                <input type="text" name="tenkhachhang" class="form-control" id="exampleInputname"
                                    aria-describedby="emailHelp" onchange="check()">
                                <span id="errortenkh"><?=isset($error['tenkhachhang']) ? $error['tenkhachhang'] : '';?></span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email </label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" onchange="check()">
                                    <span id="erroremail"  style="color:red"></span>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputnumber1" class="form-label">Số Điện Thoại</label>
                                <input type="text" name="sodienthoai" class="form-control" id="exampleInputnumber1" onchange="check()">
                                <span id="errorsodienthoai"  style="color:red"></span>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputcheckin" class="form-label">Ngày Check In</label>
                                <input type="datetime-local" name="ngaycheckin" class="form-control" id="exampleInputcheckin"  onchange="check()">
                                <span id="errorngaycheckin"  style="color:red"></span>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputcheckout" class="form-label">Ngày Check Out</label>
                                <input type="datetime-local" name="ngaycheckout" class="form-control" id="exampleInputcheckout" onchange="check()">
                                <span id="errorngaycheckout"  style="color:red"></span>

                            </div>
                            

                            <div class="form-group">
                                <label for="exampleInputdichvu">Dịch Vụ :</label> <br>
                                <table>
                                    <tr class="table_checkbox">

                                        <?php
                                        foreach ($listDichVu as $dichVu) {
                                                extract($dichVu);
                                                ?>

                                        <td>
                                            <input type="checkbox" id="dichvu<?=$id_dichvu?>" name="dichvu[]"
                                                value="<?=$id_dichvu?>">
                                            <label for="dichvu<?=$id_dichvu?>">
                                                <?=$ten_dichvu?>
                                            </label><br>
                                        </td>
                                        <?php }?>
                                    </tr>



                                </table>
                                <span style="color: red;">
                                    <?php echo isset($error['dichvu']) ? $error['dichvu'] : ''; ?>
                                </span>
                                <span style="color: green;">
                                    <?php echo isset($thongbao) ? $thongbao : ''; ?>
                                </span>
                                

                                

                            </div>
                            <p id="hihi" style="font-size: 20px;">Tổng tiền :</p>
                            <!-- <p style="font-size: 20px;" id="tongtien" >Tổng tiền : <span   style="color:red"></span></p> -->

                            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                        </form>                        



                    <?php } else {?>
                            <p>Start:
                                <?=$ngay_checkin?>
                            </p>
                            <p>End:
                                <?=$ngay_checkout?>
                            </p>
                            <strong>
                                <?=$ten_khachhang?>
                            </strong> <br>
                            <!-- <strong style="color: red;">Tổng : <?=$tong_tien?> VND</strong> <br> -->
                            <i>
                                <?=isset($ngay_checkout) ? (new DateTime($ngay_checkout))->diff(new DateTime())->format('%a ngày %H:%I:%S') : ''?>
                            </i>
                            <p style="font-size: 20px;" >Tổng tiền : <strong style="color: red;" id="tongtien">
                                        <?=isset($tong_tien) ? $tong_tien : "0"?> VND
                                    </strong></p>
                            <?php }?>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Thoát</button>
                    </div>
                </div>
            </div>
        </div>

        

        <?php

}?>








    </section>


</div>
<?php foreach ($listPhong as $p) {
    extract($p);
    // print_r($p);
    if ($trang_thai == 0) {

        ?>


<?php
}
    if ($trang_thai == 1) {?>
<script>
    document.getElementById('cart<?=$id_phong?>').className = 'col-3 border border-info';
    document.getElementById('cart_<?=$id_phong?>').setAttribute('class', 'row mx btn btn-info');

</script>

<?php
}
}
?>
<?php foreach ($listPhong as $p) {
    extract($p);

    if ($trang_thai == 4) {?>
<script>
    document.getElementById('cart<?=$id_phong?>').className = 'col-3 border border-primary';
    document.getElementById('cart_<?=$id_phong?>').setAttribute('class', 'row mx btn btn-primary');

</script>
<?php } else if ($trang_thai == 6) {?>
<script>
    document.getElementById('cart<?=$id_phong?>').className = 'col-3 border border-secondary';
    document.getElementById('cart_<?=$id_phong?>').setAttribute('class', 'row mx btn btn-secondary');

</script>
<?php } else if ($trang_thai == 7) {?>
<script>
    document.getElementById('cart<?=$id_phong?>').className = 'col-3 border border-dark';
    document.getElementById('cart_<?=$id_phong?>').setAttribute('class', 'row mx btn btn-dark');

</script>
<?php }
}
?>

<script>
    error= [];
    // var pattern = /^[\p{L}']+([\s][\p{L}']+)*$/u;
    var pattern = /^[a-zA-Z]*$/;
    var patternemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var patternNumber = /^(0|\+84)\d{9,10}$/;

    function check() {
        var tenKH = document.getElementById('exampleInputname').value;
        var email = document.getElementById('exampleInputEmail1').value;
        var sodienthoai = document.getElementById('exampleInputnumber1').value;
        var checkIn = document.getElementById('exampleInputcheckin').value;
        var checkOut = document.getElementById('exampleInputcheckout').value;
        console.log(tenKH);
        if(tenKH ==' '){
            document.getElementById('errortenkh').innerHTML = 'Không được bỏ trống';
        } else {
            if (!pattern.test(tenKH)) {
            document.getElementById('errortenkh').innerHTML = 'Họ tên không hợp lệ';
            } else {
            document.getElementById('errortenkh').innerHTML = '';

            }
        }
        if(email ==' '){
            document.getElementById('erroremail').innerHTML = 'Không được bỏ trống';
        } else {
            if (!patternemail.test(email)) {
            document.getElementById('erroremail').innerHTML = 'Email không hợp lệ';
            } else {
            document.getElementById('erroremail').innerHTML = '';

            }
        }

        if(sodienthoai ==' '){
            document.getElementById('errorsodienthoai').innerHTML = 'Không được bỏ trống';
        } else {
            if (!patternNumber.test(sodienthoai)) {
            document.getElementById('errorsodienthoai').innerHTML = 'Số điện thoại không hợp lệ';
            } else {
            document.getElementById('errorsodienthoai').innerHTML = '';

            }
        }

        var currentTime = new Date();
        var year = currentTime.getFullYear(); // Lấy năm (YYYY)
        var month = currentTime.getMonth() + 1; // Lấy tháng (từ 0 đến 11)
        var day = currentTime.getDate(); // Lấy ngày trong tháng
        var hours = currentTime.getHours(); // Lấy giờ
        var minutes = currentTime.getMinutes(); // Lấy phút
        var seconds = currentTime.getSeconds(); // Lấy giây

        // Định dạng lại thời gian
        var formattedTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
        console.log(formattedTime);

        var checkIn = new Date(checkIn);
        var yearcheckIn = checkIn.getFullYear(); // Lấy năm (YYYY)
        var monthcheckIn = checkIn.getMonth() + 1; // Lấy tháng (từ 0 đến 11)
        var daycheckIn = checkIn.getDate(); // Lấy ngày trong tháng
        var hourscheckIn = checkIn.getHours(); // Lấy giờ
        var minutescheckIn = checkIn.getMinutes(); // Lấy phút
        var secondscheckIn = checkIn.getSeconds(); // Lấy giây

        // Định dạng lại thời gian
        var ngaycheckIn = yearcheckIn + '-' + monthcheckIn + '-' + daycheckIn + ' ' + hourscheckIn + ':' + minutescheckIn + ':' + secondscheckIn;
        console.log(checkIn);


        var checkOut = new Date(checkOut);
        var yearcheckOut = checkOut.getFullYear(); // Lấy năm (YYYY)
        var monthcheckOut = checkOut.getMonth() + 1; // Lấy tháng (từ 0 đến 11)
        var daycheckOut = checkOut.getDate(); // Lấy ngày trong tháng
        var hourscheckOut = checkOut.getHours(); // Lấy giờ
        var minutescheckOut = checkOut.getMinutes(); // Lấy phút
        var secondscheckOut = checkOut.getSeconds(); // Lấy giây

        // Định dạng lại thời gian
        var ngaycheckOut = yearcheckOut + '-' + monthcheckOut + '-' + daycheckOut + ' ' + hourscheckOut + ':' + minutescheckOut + ':' + secondscheckOut;
        console.log(checkOut);



        if(checkIn ==' '){
            document.getElementById('errorngaycheckin').innerHTML = 'Không được bỏ trống';
        } else {
            if (formattedTime > ngaycheckIn) {
        console.log('Ngày Check In không hợp lệ');

            document.getElementById('errorngaycheckin').innerHTML = 'Ngày Check In không hợp lệ';
            } else {
            error['checkin'] = document.getElementById('errorngaycheckin').innerHTML = '';
                ngayCheckIn = checkIn;
            }
        }

        if(checkOut ==' '){
            document.getElementById('errorngaycheckout').innerHTML = 'Không được bỏ trống';
        } else {
            if (ngaycheckIn > ngaycheckOut || ngaycheckIn - ngaycheckOut < 0) {
                document.getElementById('errorngaycheckout').innerHTML = 'Ngày Check In không hợp lệ';
            } else {
                 document.getElementById('errorngaycheckout').innerHTML = '';
                 var ngay = checkOut.getTime() - checkIn.getTime();
                    var gia = document.getElementById('gia').value;
                    console.log(gia);
                    var tongTien = Math.round(ngay / (1000 * 60 * 60 * 24) + 1) * gia;
                    document.getElementById('hihi').innerText = 'Tổng tiền  : '+gia*Math.round(ngay / (1000 * 60 * 60 * 24) + 1) + 'VND';
                    document.getElementById('tong').value = tongTien ;
            }
        }
        

        

    }






</script>