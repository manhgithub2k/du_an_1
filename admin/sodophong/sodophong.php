<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentTime = new DateTime();
$vietnamTime = $currentTime->format('Y-m-d H:i:s');
?>

<div class="container-fluid ">
    <section class="row mx-0  " style="margin-bottom: 20px;">
        <div class="col-2"></div>
        <div class="col-8">
            <button type="button" class="btn btn-light border border-success"><a href="?act=sodophong">Tất cả (
                    <?=count_phong1('')['0']['so_phong']?>)
                </a></button>
            <button type="button" class="btn btn-success"><a href="?act=sodophong&&trangthai=trong">Trống (
                    <?=count_phong1('trong')['0']['so_phong']?>)
                </a></button>
            <button type="button" class="btn btn-info"><a href="?act=sodophong&&trangthai=danhan">Đã Nhận (
                    <?=count_phong1('danhan')['0']['so_phong']?>)
                </a></button>
            <button type="button" class="btn btn-warning"><a href="?act=sodophong&&trangthai=quahan">Quá hạn (
                    <?=count_phong1('quahan')['0']['so_phong']?>)
                </a></button>

            <!-- <button type="button" class="btn btn-primary"><a href="?act=sodophong&&trangthai=dadat">Đã Đặt (
                    <?=count_phong1('dadat')['0']['so_phong']?>)
                </a></button>
            <button type="button" class="btn btn-danger"><a href="?act=sodophong&&trangthai=khongden">Không Đến (
                    <?=count_phong1('khongden')['0']['so_phong']?>)
                </a></button> -->

            <button type="button" class="btn btn-secondary"><a href="?act=sodophong&&trangthai=ban">Chưa Dọn (
                    <?=count_phong1('ban')['0']['so_phong']?>)
                </a></button>
            <button type="button" class="btn btn-dark"><a href="?act=sodophong&&trangthai=dangsua">Đang Sửa (
                    <?=count_phong1('dangsua')['0']['so_phong']?>)
                </a></button>

        </div>
        <div class="col"></div>
    </section>
    <hr>
    <section class="row mx-0  ">
        <?php foreach ($listPhong as $p) {
    extract($p);
        


    ?>

        <div class="  col-3 border border-success "
            style="display: flex; border-radius: 8px; float: left; margin-left: 60px; margin-bottom: 20px; height: 180px;line-height: 20px;"
            id="cart<?=$id_phong?>" data-bs-toggle="modal" href="#exampleModalToggle<?=$id_phong?>" role="button" >
            <div class="row mx btn btn-success " style="line-height: 10px;" id="cart_<?=$id_phong?>">
                <?=$ten_phong?>
            </div>
            <div class=" mx-4" >
                <p>Start:<?=$ngay_checkin?></p>
                <p>End:
                    <?=$ngay_checkout?>
                </p>
                <strong>Tên:
                    <?=$ten_khachhang?>
                </strong> <br>
                <strong>
                    <?='Giá: '.$gia.'/Đêm'?>
                </strong> <br>
                <strong style="color: red;">Tổng :
                <?= isset($tong_tien) ? $ngay_checkout < $vietnamTime ? $tong_tien + ((new DateTime($ngay_checkout))->diff(new DateTime())->format('%a')+1)*$gia  : $tong_tien : '' ?> VND
 
                </strong> <br>
                <i>
                <!-- <?= isset($ngay_checkout) ? $ngay_checkout < $vietnamTime ? (new DateTime($ngay_checkout))->diff(new DateTime())->format('Quá : %a ngày %H:%I:%S') : (new DateTime($ngay_checkout))->diff(new DateTime())->format('%a ngày %H:%I:%S') :  ''; ?> -->
                <?= isset($ngay_checkout) && isset($ngay_checkin) ? ($ngay_checkout < $vietnamTime ? 'Quá : '.(new DateTime($ngay_checkout))->diff(new DateTime())->format('%a ngày %H:%I:%S') : ($ngay_checkin > $vietnamTime ? 'Còn  '.(new DateTime($ngay_checkin))->diff(new DateTime())->format('%a ngày %H:%I:%S') : ''))   : ''; ?>
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
                        
                        <form action="?act=datphong" method="post" onclick="check(<?=$id_phong?>)" >
                            <!-- <?php print_r($p)?> -->
                            <input type="hidden" name="id_phong" value="<?=$id_phong?>">
                            <input type="hidden" name="id_loaiphong" value="<?php echo $p['id_lp'] ?>">
                            <input type="hidden" name="giaphong" id="gia<?=$id_phong?>" value="<?= $gia ?>">
                            <input type="hidden" name="tong" id="tong<?=$id_phong?>" >
                            <input type="text" id="idphong<?=$id_phong?>"   value="<?= $id_phong?>" >
                            <?php $idP=$id_phong?>
                           
                            <div class="mb-3">
                            
                                <label for="exampleInputname" class="form-label">Tên khách hàng</label>
                                <input type="text" name="tenkhachhang" class="form-control" id="exampleInputname<?=$id_phong?>"
                                    aria-describedby="emailHelp" onchange="check()">
                                <span id="errortenkh<?=$id_phong?>"  style="color:red"><?=isset($error['tenkhachhang']) ? $error['tenkhachhang'] : '';?></span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email </label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail<?=$id_phong?>"
                                    aria-describedby="emailHelp" onchange="check()">
                                    <span id="erroremail<?=$id_phong?>"  style="color:red"></span>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputnumber1" class="form-label">Số Điện Thoại</label>
                                <input type="text" name="sodienthoai" class="form-control" id="exampleInputnumber<?=$id_phong?>" onchange="check()">
                                <span id="errorsodienthoai<?=$id_phong?>"  style="color:red"></span>

                            </div>
                            <!-- <div class="mb-3">
                                <label for="checkin" class="form-label">Ngày Check In </label>
                                <input type="datetime-local" name="ngaycheckin" class="form-control" id="checkin<?=$id_phong?>"  onchange="check()">
                                <span id="errorngaycheckin<?=$id_phong?>"  style="color:red"></span>
                            </div> -->
                            <div class="mb-3">
                                <label for="checkout" class="form-label">Ngày Check Out</label>
                                <input type="datetime-local" name="ngaycheckout" class="form-control" id="checkout<?=$id_phong?>" onchange="check()">
                                <span id="errorngaycheckout<?=$id_phong?>"  style="color:red"></span>

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
                                                value="<?=$id_dichvu?>" >
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
                            <p id="hihi<?=$id_phong?>" style="font-size: 20px;">Tổng tiền :</p>
                            <!-- <p style="font-size: 20px;" id="tongtien" >Tổng tiền : <span   style="color:red"></span></p> -->

                            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                        </form>                        


                    <?php } else if( $trang_thai == 1 ){
                    ?>
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
                                <?= isset($ngay_checkout) ? $ngay_checkout < $vietnamTime ? (new DateTime($ngay_checkout))->diff(new DateTime())->format('Quá : %a ngày %H:%I:%S') : (new DateTime($ngay_checkout))->diff(new DateTime())->format('%a ngày %H:%I:%S') :  ''; ?>
                            </i>
                            <p style="font-size: 20px;" >Tổng tiền : <strong style="color: red;" id="tongtien">

                                            
                                        <?= isset($tong_tien) ? $ngay_checkout < $vietnamTime ? $tong_tien + ((new DateTime($ngay_checkout))->diff(new DateTime())->format('%a')+1)*$gia  : $tong_tien : '' ?> VND
                                    </strong></p>
                                <a href="?act=checkout&&iddon=<?= $id_don ?>&&idphong= <?= $id_phong ?>"><button type="submit" class="btn btn-primary" >Check Out</button></a>
                            <?php } else if( $trang_thai == 2) {?>

                            <p>Start:<?=$ngay_checkin?></p>
                            <p>End:<?=$ngay_checkout?></p>
                            <strong><?=$ten_khachhang?></strong> <br>
                            <i><?= isset($ngay_checkout) ? $ngay_checkout < $vietnamTime ? (new DateTime($ngay_checkout))->diff(new DateTime())->format('Quá : %a ngày %H:%I:%S') : (new DateTime($ngay_checkout))->diff(new DateTime())->format('%a ngày %H:%I:%S') :  ''; ?></i>
                            <p style="font-size: 20px;" >Tổng tiền : 
                            <strong style="color: red;" id="tongtien"><?= isset($tong_tien) ? $ngay_checkout < $vietnamTime ? $tong_tien + ((new DateTime($ngay_checkout))->diff(new DateTime())->format('%a')+1)*$gia  : $tong_tien : '' ?> VND</strong></p>
                            <a href="?act=checkout&&iddon=<?= $id_don ?>&&idphong= <?= $id_phong ?>"><button type="submit" class="btn btn-primary" >Check Out</button></a>
                                

                            <?php }else if( $trang_thai == 3) {?>

                            
                                <?php if($ngay_checkin <= $vietnamTime){?>
                                    <p>Start:<?=$ngay_checkin?></p>
                                <p>End:<?=$ngay_checkout?></p>
                                <strong><?=$ten_khachhang?></strong> <br>

                                <i><?= isset($ngay_checkout) ? $ngay_checkin > $vietnamTime ? (new DateTime($ngay_checkin))->diff(new DateTime())->format('Còn b %a ngày %H:%I:%S') : (new DateTime($ngay_checkout))->diff(new DateTime())->format('%a ngày %H:%I:%S') :  ''; ?></i>
                                <p style="font-size: 20px;" >Tổng tiền : 
                                <strong style="color: red;" id="tongtien"><?= isset($tong_tien) ? $ngay_checkout < $vietnamTime ? $tong_tien + ((new DateTime($ngay_checkout))->diff(new DateTime())->format('%a')+1)*$gia  : $tong_tien : '' ?> VND</strong></p>
                                    <a href="?act=checkin&&iddon=<?= $id_don ?>&&idphong= <?= $id_phong ?>"><button type="submit" class="btn btn-primary" >Check In</button></a>
                                <?php } else {?>
                                    <!-- <form action="?act=datphong" method="post" onclick="check([<?=$id_phong?>, '<?= isset($ngay_checkin)?$ngay_checkin:''?>'])" onsubmit="check([<?=$id_phong?>, '<?= isset($ngay_checkin)?$ngay_checkin:''?>',event])" > -->
                                    <form action="?act=datphong" method="post" onclick="check(<?=$id_phong?>)"  >
                                        <!-- <?php print_r($p)?> -->
                                        <input type="hidden" name="id_phong" value="<?=$id_phong?>">
                                        <input type="hidden" name="id_loaiphong" value="<?php echo $p['id_lp'] ?>">
                                        <input type="hidden" name="giaphong" id="gia<?=$id_phong?>" value="<?= $gia ?>">
                                        <input type="hidden" name="tong" id="tong<?=$id_phong?>" >
                                        <input type="text" id="idphong<?=$id_phong?>"   value="<?= $ngay_checkin .''.$gia ?>" >
                                        <?php $idP=$id_phong?>
                                    
                                        <div class="mb-3">
                                        
                                            <label for="exampleInputname" class="form-label">Tên khách hàng</label>
                                            <input type="text" name="tenkhachhang" class="form-control" id="exampleInputname<?=$id_phong?>"
                                                aria-describedby="emailHelp" onchange="check()">
                                            <span id="errortenkh<?=$id_phong?>"  style="color:red"><?=isset($error['tenkhachhang']) ? $error['tenkhachhang'] : '';?></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email </label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail<?=$id_phong?>"
                                                aria-describedby="emailHelp" onchange="check()">
                                                <span id="erroremail<?=$id_phong?>"  style="color:red"></span>

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputnumber1" class="form-label">Số Điện Thoại</label>
                                            <input type="text" name="sodienthoai" class="form-control" id="exampleInputnumber<?=$id_phong?>" onchange="check()">
                                            <span id="errorsodienthoai<?=$id_phong?>"  style="color:red"></span>

                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="checkin" class="form-label">Ngày Check In </label>
                                            <input type="datetime-local" name="ngaycheckin" class="form-control" id="checkin<?=$id_phong?>"  onchange="check()">
                                            <span id="errorngaycheckin<?=$id_phong?>"  style="color:red"></span>
                                        </div> -->
                                        <div class="mb-3">
                                            <label for="checkout" class="form-label">Ngày Check Out</label>
                                            <input type="datetime-local" name="ngaycheckout" class="form-control" id="checkout<?=$id_phong?>" onchange="check()">
                                            <span id="errorngaycheckout<?=$id_phong?>"  style="color:red"></span>

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
                                                            value="<?=$id_dichvu?>" >
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
                                        <p id="hihi<?=$id_phong?>" style="font-size: 20px;">Tổng tiền :</p>
                                        <!-- <p style="font-size: 20px;" id="tongtien" >Tổng tiền : <span   style="color:red"></span></p> -->

                                        <input type="submit" class="btn btn-primary" value="Check In Cho Khách Khác" name="submit">
                                    </form>  
                                   
                                
                                <?php } ?>
                            
                         <?php } else if( $trang_thai == 4){?>
                            <a href="?act=huyphong&&iddon=<?= $id_don ?>&&idphong= <?= $id_phong ?>"><button type="submit" class="btn btn-primary" >Hủy Phòng</button></a>

                        <?php } else if( $trang_thai == 5){?>
                            <a href="?act=dasach&&iddon=<?= $id_don ?>&&idphong= <?= $id_phong ?>"><button type="submit" class="btn btn-primary" >Phòng Đã Sạch</button></a>

                        <?php } else if( $trang_thai == 6){?>
                            <a href="?act=dasua&&iddon=<?= $id_don ?>&&idphong= <?= $id_phong ?>"><button type="submit" class="btn btn-primary" >Đã Sửa</button></a>

                        <?php } ?>

                    </div>

                    <div class="modal-footer" style="display: flex; justify-content: space-between;">
                        <button class="btn btn-danger" style=""><a href="?act=phonghu&&id=<?= $id_phong ?>">Phòng hư</a></button>

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

    if ($trang_thai == 3) {?>
<script>
    document.getElementById('cart<?=$id_phong?>').className = 'col-3 border border-primary';
    document.getElementById('cart_<?=$id_phong?>').setAttribute('class', ' row mx btn btn-primary');
    // document.getElementById('cart_<?=$id_phong?>').setAttribute('style', ' ');

</script>
<?php } else if ($trang_thai == 2) {?>
<script>
    document.getElementById('cart<?=$id_phong?>').className = 'col-3 border border-warning';
    document.getElementById('cart_<?=$id_phong?>').setAttribute('class', 'row mx btn btn-warning');

</script>
<?php } else if ($trang_thai == 4) {?>
<script>
    document.getElementById('cart<?=$id_phong?>').className = 'col-3 border border-danger';
    document.getElementById('cart_<?=$id_phong?>').setAttribute('class', 'row mx btn btn-danger');

</script>
<?php } else if ($trang_thai == 5) {?>
<script>
    document.getElementById('cart<?=$id_phong?>').className = 'col-3 border border-secondary';
    document.getElementById('cart_<?=$id_phong?>').setAttribute('class', 'row mx btn btn-secondary');

</script>
<?php }else if ($trang_thai == 6) {?>
<script>
    document.getElementById('cart<?=$id_phong?>').className = ' col-3 border border-dark';
    document.getElementById('cart_<?=$id_phong?>').setAttribute('class', ' row mx btn btn-dark');

</script>
<?php }
}
?>

<script>
    var error= [];
    var pattern = /^[a-zA-Z]*$/;
    var patternemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var patternNumber = /^(0|\+84)\d{9,10}$/;
    function truyen_idphong(idP){
    
    return idP;
    
}
    

    function check(idp) {
        console.log(idp);

        var tenKH = document.getElementById('exampleInputname'+idp).value;
        var email = document.getElementById('exampleInputEmail'+idp).value;
        var sodienthoai = document.getElementById('exampleInputnumber'+idp).value;
        var idPhong = document.getElementById('idphong'+idp).value;
        // var checkin = document.getElementById('checkin'+idp).value;
        var checkout = document.getElementById('checkout'+idp).value;
        
                            
                         
        // console.log(checkin);
        console.log(checkout);
        
        if(tenKH.trim() ==''){
            document.getElementById('errortenkh'+idp).innerHTML = 'Không được bỏ trống';
        } else {
            if (!pattern.test(tenKH)) {
            document.getElementById('errortenkh'+idp).innerHTML = 'Họ tên không hợp lệ';
            } else {
            document.getElementById('errortenkh'+idp).innerHTML = '';

            }
        }
        if(email.trim() ==''){
            document.getElementById('erroremail'+idp).innerHTML = 'Không được bỏ trống';
        } else {
            if (!patternemail.test(email)) {
            document.getElementById('erroremail'+idp).innerHTML = 'Email không hợp lệ';
            } else {
            document.getElementById('erroremail'+idp).innerHTML = '';

            }
        }

        if(sodienthoai ==' '){
            document.getElementById('errorsodienthoai'+idp).innerHTML = 'Không được bỏ trống';
        } else {
            if (!patternNumber.test(sodienthoai)) {
            document.getElementById('errorsodienthoai'+idp).innerHTML = 'Số điện thoại không hợp lệ';
            } else {
            document.getElementById('errorsodienthoai'+idp).innerHTML = '';

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

        


        var checkOut = new Date(checkout);
        var yearcheckOut = checkOut.getFullYear(); // Lấy năm (YYYY)
        var monthcheckOut = checkOut.getMonth() + 1; // Lấy tháng (từ 0 đến 11)
        var daycheckOut = checkOut.getDate(); // Lấy ngày trong tháng
        var hourscheckOut = checkOut.getHours(); // Lấy giờ
        var minutescheckOut = checkOut.getMinutes(); // Lấy phút
        var secondscheckOut = checkOut.getSeconds(); // Lấy giây

        // Định dạng lại thời gian
        var ngaycheckOut = yearcheckOut + '-' + monthcheckOut + '-' + daycheckOut + ' ' + hourscheckOut + ':' + minutescheckOut + ':' + secondscheckOut;
        console.log(ngaycheckOut);



        // if(checkIn ==' '){
        //     document.getElementById('errorngaycheckin'+idp).innerHTML = 'Không được bỏ trống';
        // } else {
        //     if (formattedTime > ngaycheckIn) {
        // console.log('Ngày Check In không hợp lệ');

        //     document.getElementById('errorngaycheckin'+idp).innerHTML = 'Ngày Check In không hợp lệ';
        //     } else {
        //      error['checkin'] = document.getElementById('errorngaycheckin'+idp).innerHTML = '';
             
        //     }
        // }

       
        
        // if(ngayngaycheckin != ''){
        // var ngaycheckin = new Date(data['1']);
        // var yearngaycheckin = ngaycheckin.getFullYear(); // Lấy năm (YYYY)
        // var monthngaycheckin = ngaycheckin.getMonth() + 1; // Lấy tháng (từ 0 đến 11)
        // var dayngaycheckin = ngaycheckin.getDate(); // Lấy ngày trong tháng
        // var hoursngaycheckin = ngaycheckin.getHours(); // Lấy giờ
        // var minutesngaycheckin = ngaycheckin.getMinutes(); // Lấy phút
        // var secondsngaycheckin = ngaycheckin.getSeconds(); // Lấy giây

        // // Định dạng lại thời gian
        // var ngayngaycheckin = yearngaycheckin + '-' + monthngaycheckin + '-' + dayngaycheckin + ' ' + hoursngaycheckin + ':' + minutesngaycheckin + ':' + secondsngaycheckin;
        // console.log(ngayngaycheckin);
        //     if(ngayngaycheckin <= ngaycheckOut || ngayngaycheckin - ngaycheckOut < 0 ){
        //         document.getElementById('errorngaycheckout'+idp).innerHTML = 'Ngày Check Out không hợp lệ , ngày đó có khách';
        //         data['2'].preventDefault();
        //     }else {
        //          document.getElementById('errorngaycheckout'+idp).innerHTML = '';
        //          var ngay = checkOut.getTime() - currentTime.getTime();
        //             var gia = document.getElementById('gia'+idp).value;
        //             console.log(gia);
        //             var tongTien = Math.round(ngay / (1000 * 60 * 60 * 24) + 1) * gia;
        //             document.getElementById('hihi'+idp).innerText = 'Tổng tiền  : '+gia*Math.round(ngay / (1000 * 60 * 60 * 24) + 1) + 'VND';
        //             document.getElementById('tong'+idp).value = tongTien ;
        //     }
        // } else {
            if(checkOut ==' '){
            document.getElementById('errorngaycheckout'+idp).innerHTML = 'Không được bỏ trống';
                } else {
                    if (formattedTime > ngaycheckOut || formattedTime - ngaycheckOut < 0) {
                        document.getElementById('errorngaycheckout'+idp).innerHTML = 'Ngày Check Out không hợp lệ';
                        document.getElementById('hihi'+idp).innerText = '';
                    } else  {
                        document.getElementById('errorngaycheckout'+idp).innerHTML = '';
                        var ngay = checkOut.getTime() - currentTime.getTime();
                            var gia = document.getElementById('gia'+idp).value;
                            console.log(gia);
                            var tongTien = Math.round(ngay / (1000 * 60 * 60 * 24) + 1) * gia;
                            document.getElementById('hihi'+idp).innerText = 'Tổng tiền  : '+gia*Math.round(ngay / (1000 * 60 * 60 * 24) + 1) + 'VND';
                            document.getElementById('tong'+idp).value = tongTien ;
                    }
                }
        }

    // }
    
   





</script>