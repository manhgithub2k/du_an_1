<div class="container-fluid ">
    <section class="row mx-0  " style="margin-bottom: 20px;">
        <div class="col-2" style="min-height: 300px; line-height: 50px; ">
            <?php foreach ($listLoaiPhong as $loaiPhong) {
    extract($loaiPhong)?>
                <button type="button" class="btn btn-success" style="width: 150px;"><a href="?act=quanlyloaiphong&&idlp=<?=$id_loaiphong?>"><?=$ten_loai . '(' . $soPhongConKhaDung = getAvailableRooms($thoiGianHienTai, '', $id_loaiphong) . ')'?></a></button> <br>
            <?php }?>

        </div>
        <div class="col-8">

            <?php if (!isset($soLuongPhongTrong) || $soLuongPhongTrong <= 0) {?>
                <form action="?act=quanlyloaiphong" method="post"   >


                    <div class="mb-3">
                        <label for="checkout" class="form-label">Ngày Check Out</label>
                        <input type="datetime-local" name="ngaycheckout" class="form-control" id="checkout" onchange="check_dau()">
                        <span id="errorngaycheckout"  style="color:red"></span>

                    </div>
                    <div class="mb-3">
                        <label for="checkout" class="form-label">Loại Phòng</label>
                        <select name="idloaiphong" id="idloaiphong" class="form-control" onchange="check_dau()">
                            <option value="" >-- Chọn --</option>
                            <?php foreach ($listLoaiPhong as $loaiPhong) {
                                extract($loaiPhong);
                                ?>

                            <option value="<?=$id_loaiphong?>" <?=isset($idGiuong) && $id_loaiphong == $idGiuong ? "selected" : ""?>   ><?=$ten_loai?></option>
                            <?php }?>
                        </select>
                            <span id="erroridloaiphong"  style="color:red"></span>

                    </div>

                    <!-- <p id="hihi<?=$id_loaiphong?>" style="font-size: 20px;">Tổng tiền :</p> -->
                    <!-- <p style="font-size: 20px;" id="tongtien" >Tổng tiền : <span   style="color:red"></span></p> -->

                    <input  class="btn btn-primary" value="Check In " name="submit" id="submit" disabled type="submit">
                </form>
            <?php } else  {?>
                <h4 style="text-align: center;"><b>Số lượng phòng trống của loại phòng này là : <?=isset($soLuongPhongTrong) ? $soLuongPhongTrong : 0?></b></h4>
                <form action="?act=datphong" method="post"   >
                <input type="hidden" name="idloaiphong" value="<?=$idLoaiPhong?>">
                <input type="hidden" name="ngaycheckout"  value="<?= $ngayCheckOut ?>">
                <input type="hidden" name="tong" id="tong" value="<?= $tongTien ?>">
                <input type="hidden"  id="sltrong" value="<?= $soLuongPhongTrong ?>">

                <div class="mb-3">

                    <label for="exampleInputname" class="form-label">Tên khách hàng</label>
                    <input type="text" name="tenkhachhang" class="form-control" id="exampleInputname"
                        aria-describedby="emailHelp" onchange="check()">
                    <span id="errortenkh"  style="color:red"><?=isset($error['tenkhachhang']) ? $error['tenkhachhang'] : '';?></span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" name="email" class="form-control" id="email"
                        aria-describedby="emailHelp" onchange="check()">
                        <span id="erroremail"  style="color:red"></span>

                </div>
                <div class="mb-3">
                    <label for="exampleInputnumber1" class="form-label">Số Điện Thoại</label>
                    <input type="text" name="sodienthoai" class="form-control" id="exampleInputnumber" onchange="check()">
                    <span id="errorsodienthoai"  style="color:red"></span>

                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa Chỉ</label>
                    <input type="text" name="diachi" class="form-control" id="diachi" onchange="check()">
                    <span id="errordiachi"  style="color:red"></span>

                </div>

                <div class="mb-3">
                    <label for="checkout" class="form-label">Ngày Check Out</label>
                    <input type="datetime-local" name="ngaycheckout" class="form-control" id="checkout" onchange="check()" value="<?=$checkOut?>" disabled placeholder="">
                    <span id="errorngaycheckout"  style="color:red"></span>

                </div>
                <div class="mb-3">
                    <label for="loaiphong" class="form-label">Loại Phòng</label>
                    <select name="idloaiphong" id="" class="form-control" id="exampleInputPassword1" disabled placeholder="" >
                        <option value="" >-- Chọn --</option>
                        <?php foreach ($listLoaiPhong as $loaiPhong) {
                        extract($loaiPhong);
                        ?>

                        <option value="<?=$id_loaiphong?>" <?=isset($idLoaiPhong) && $id_loaiphong == $idLoaiPhong ? "selected" : ""?>   ><?=$ten_loai?></option>
                        <?php }?>
                    </select>
                        <span id="errorngaycheckout"  style="color:red"></span>

                </div>
                <div class="mb-3">
                    <label for="tenphong" class="form-label">Tên Phòng</label>
                    <select name="idphong" id="tenphong" class="form-control" id="exampleInputPassword1" onchange="check()">
                        <option value="" >-- Chọn --</option>
                        <?php foreach ($listPhong as $phong) {
                        extract($phong);
                        ?>

                        <option value="<?=$id_phong?>" <?=isset($idPhong) && $id_phong == $idPhong ? "selected" : ""?>   ><?=$ten_phong?></option>
                        <?php }?>
                    </select>
                        <span id="errortenphong"  style="color:red"></span>

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
                                    value="<?=$id_dichvu?>" onclick="check(<?=$gia_dichvu?>)" >
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
                <p id="hihi" style="font-size: 20px; color: red;">Tiền Phòng : <?=$tongTien?> VND</p>


                <input type="submit"  class="btn btn-primary" value="OK" name="submit" id="submitok" disabled>
            </form>
            <?php }?>



        </div>
        <div class="col"></div>
    </section>
</div>



<script>
    var flag = true;
     var error= [];
    var pattern = /^[a-zA-Z]*$/;
    var patternemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var patternNumber = /^(0|\+84)\d{9,10}$/;

    function check(gia_dichvu) {

        var tenKH = document.getElementById('exampleInputname').value;
        var email = document.getElementById('email').value;
        var sodienthoai = document.getElementById('exampleInputnumber').value;
        var tenphong = document.getElementById('tenphong').value;
        var diachi = document.getElementById('diachi').value;
        var checkout = document.getElementById('checkout').value;
        var sltrong = document.getElementById('sltrong').value;

        if(sltrong < 0){
            flag = false;

        }

        // console.log(checkin);
        console.log(checkout);
        if(tenphong ==''){
            document.getElementById('errortenphong').innerHTML = 'Không được bỏ trống';
            flag = false;

            } else {
            document.getElementById('errortenphong').innerHTML = '';

            }
        if(diachi ==''){
            document.getElementById('errordiachi').innerHTML = 'Không được bỏ trống';
            flag = false;

            } else {
            document.getElementById('errordiachi').innerHTML = '';

            }
        
        if(tenKH.trim() ==''){
            document.getElementById('errortenkh').innerHTML = 'Không được bỏ trống';
             flag = false;

            } else {
            if (!pattern.test(tenKH)) {
            document.getElementById('errortenkh').innerHTML = 'Họ tên không hợp lệ';
            flag = false;

            } else {
            document.getElementById('errortenkh').innerHTML = '';

            }
        }

        if(email.trim() ==''){
            document.getElementById('erroremail').innerHTML = 'Không được bỏ trống';
            flag = false;

            } else {
            if (!patternemail.test(email)) {
            document.getElementById('erroremail').innerHTML = 'Email không hợp lệ';
            flag = false;

            } else {
            document.getElementById('erroremail').innerHTML = '';

            }
        }

        
        if(sodienthoai ==''){
            document.getElementById('errorsodienthoai').innerHTML = 'Không được bỏ trống';
            flag = false;

            } else {
            if (!patternNumber.test(sodienthoai)) {
            document.getElementById('errorsodienthoai').innerHTML = 'Số điện thoại không hợp lệ';
            flag = false;

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
        if(checkOut ==' '){
                document.getElementById('errorngaycheckout').innerHTML = 'Không được bỏ trống';
                 flag = false;

                } else {
                    if (currentTime.getTime() > checkOut.getTime())  {
                        document.getElementById('errorngaycheckout').innerHTML = 'Ngày Check Out không hợp lệ';
                        flag = false;

                    } else  {
                        document.getElementById('errorngaycheckout').innerHTML = '';
                        flag = true;
                    }
            }

             if(flag == true) {
                // document.getElementById('submitok').type="submit" ;
                document.getElementById('submitok').disabled = false;


             }
    }

    function check_dau() {
        var checkout = document.getElementById('checkout').value;
        var idloaiphong = document.getElementById('idloaiphong').value;
            
        // if(idloaiphong ==''){
        //     document.getElementById('erroridloaiphong').innerHTML = 'Không được bỏ trống';
        //      flag = false;

        // } else {
            
        //     document.getElementById('erroridloaiphong').innerHTML = '';

        //     }
        // }
        var currentTime = new Date();
        var year = currentTime.getFullYear(); // Lấy năm (YYYY)
        var month = currentTime.getMonth() + 1; // Lấy tháng (từ 0 đến 11)
        var day = currentTime.getDate(); // Lấy ngày trong tháng
        var hours = currentTime.getHours(); // Lấy giờ
        var minutes = currentTime.getMinutes(); // Lấy phút
        var seconds = currentTime.getSeconds(); // Lấy giây

        // Định dạng lại thời gian
        var formattedTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
        console.log('hiên tai '+formattedTime);

            var checkOut = new Date(checkout);
        var yearcheckOut = checkOut.getFullYear(); // Lấy năm (YYYY)
        var monthcheckOut = checkOut.getMonth() + 1; // Lấy tháng (từ 0 đến 11)
        var daycheckOut = checkOut.getDate(); // Lấy ngày trong tháng
        var hourscheckOut = checkOut.getHours(); // Lấy giờ
        var minutescheckOut = checkOut.getMinutes(); // Lấy phút
        var secondscheckOut = checkOut.getSeconds(); // Lấy giây


        // Định dạng lại thời gian
        var ngaycheckOut = yearcheckOut + '-' + monthcheckOut + '-' + daycheckOut + ' ' + hourscheckOut + ':' + minutescheckOut + ':' + secondscheckOut;
        console.log('ngaycheckout' +ngaycheckOut);

        if(checkOut ==' '){
            document.getElementById('errorngaycheckout').innerHTML = 'Không được bỏ trống';
            document.getElementById('submit').disabled = true;

            flag = false;

        } else {
            if (currentTime.getTime() > checkOut.getTime())  {
                document.getElementById('errorngaycheckout').innerHTML = 'Ngày Check Out không hợp lệ';
                document.getElementById('submit').disabled = true;

                flag = false;

            } else  {
                document.getElementById('errorngaycheckout').innerHTML = '';
                flag = true;
            }
        }

        
             

        
        if(idloaiphong =="" || idloaiphong ==null){
            document.getElementById('erroridloaiphong').innerHTML = 'Không được bỏ trống';
            document.getElementById('submit').disabled = true;

            flag = false;

        } else {
                    
            document.getElementById('erroridloaiphong').innerHTML = '';
            flag = true;
                    
        }

        if(flag == true) {
                document.getElementById('submit').disabled = false;
                console.log ('hhh');

        }
    }



</script>