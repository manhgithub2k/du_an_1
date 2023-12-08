<!-- /.container-fluid -->
<div class="container-fluid " >
    <section class="row mx-0  ">
        <div class="col"></div>

        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Sửa Voucher
        </button>
        <div class="col"></div>



        </section>
    <section class="row mx-0 mt">

        <div class="col"></div>
        <div class="col-10">
            <form action="?act=editvoucher&id=<?=$id_voucher?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Voucher</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" disabled placeholder="Tăng tự động" >

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Mã Voucher</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="ma_voucher" value="<?= $ma_voucher ?>">
                    <span style="color: red;"><?php echo isset($error['ma_voucher']) ? $error['ma_voucher'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Tên Voucher</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="ten_voucher" value="<?= $ten_voucher ?>">
                    <span style="color: red;"><?php echo isset($error['ten_voucher']) ? $error['ten_voucher'] : ''; ?></span>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Ảnh Voucher</label>
                    <img src="<?= $anh_voucher ?>" alt="" style="height: 100px; padding: 5px;">
                    <input type="file" class="form-control" id="exampleInputPassword1" name="anh_voucher" accept="*/*" >
                
                    <span style="color: red;"><?php echo isset($error['anh_voucher']) ? $error['anh_voucher'] : ''; ?></span>
                    <span style="color: green;"><?php echo isset($imgTC) ? $imgTC : ''; ?></span>
                </div>
            
                <div class="form-group">
                    <label for="exampleInputPassword1">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control" id="ngay_batdau" name="ngay_batdau" onchange="checkTimeBatDau()" value="<?= $ngay_batdau ?>">
                    <p id="errorChecktime1" style="color:red"></p>
                    <span style="color: red;"><?php echo isset($error['ngay_batdau']) ? $error['ngay_batdau'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Ngày Kết Thúc</label>
                    <input type="date" class="form-control" id="ngay_ketthuc" name="ngay_ketthuc" onchange="checkTimeKetThuc()" value="<?= $ngay_ketthuc ?>">
                    <p id="errorChecktime2" style="color:red"></p>
                    <span style="color: red;"><?php echo isset($error['ngay_ketthuc']) ? $error['ngay_ketthuc'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Giảm Giá</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="giam_gia" value="<?= $giam_gia ?>">
                    <span style="color: red;"><?php echo isset($error['giam_gia']) ? $error['giam_gia'] : ''; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô Tả</label> <br>
                    <textarea name="mota_voucher" id="" cols="112" rows="7" ><?= $mota_voucher ?></textarea>
                    
                    <span style="color: red;"><?php echo isset($error['mota_voucher']) ? $error['mota_voucher'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Số Lượng</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="so_luong" value="<?= $so_luong ?>">
                    <span style="color: red;"><?php echo isset($error['so_luong']) ? $error['so_luong'] : ''; ?></span>
                </div>
                
                
                
                <span style="color: green;"><?php echo isset($thongbaoTC) ? $thongbaoTC : ''; ?></span> <br>

                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <div class="col"></div>

    </section>


</div>
<script>
    function checkTimeBatDau(){
            // Lấy ngày hiện tại
    var ngayHienTai = new Date();

// Lấy giá trị ngày được chọn từ biểu mẫu
var ngayDuocChon = new Date(document.getElementById("ngay_batdau").value);

// So sánh ngày được chọn với ngày hiện tại
if(ngayDuocChon != " "){
    console.log(ngayDuocChon);
    if (ngayDuocChon < ngayHienTai) {
        // window.location.href = "index.php?act=addvoucher";
        document.getElementById('errorChecktime1').innerHTML = "Ngày không được nhỏ hơn ngày hiện tại !";
    // Ngày được chọn nhỏ hơn ngày hiện tại, xuất thông báo lỗi
    console.log("Ngày chọn không được nhỏ hơn ngày hiện tại.");
} else {
    document.getElementById('errorChecktime1').innerHTML = "";
}
}
    }

    function checkTimeKetThuc(){
            // Lấy ngày hiện tại
    var ngayHienTai = new Date();

// Lấy giá trị ngày được chọn từ biểu mẫu
var ngayDuocChon = new Date(document.getElementById("ngay_ketthuc").value);

// So sánh ngày được chọn với ngày hiện tại
if(ngayDuocChon != " "){
    console.log(ngayDuocChon);
    if (ngayDuocChon < ngayHienTai) {
        // window.location.href = "index.php?act=addvoucher";
        document.getElementById('errorChecktime2').innerHTML = "Ngày không được nhỏ hơn ngày hiện tại !";
// Ngày được chọn nhỏ hơn ngày hiện tại, xuất thông báo lỗi
console.log("Ngày chọn không được nhỏ hơn ngày hiện tại.");
} else {
    document.getElementById('errorChecktime2').innerHTML = "";
}
}
    }

</script>