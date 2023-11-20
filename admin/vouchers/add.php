<!-- /.container-fluid -->
<div class="container-fluid " >
    <section class="row mx-0  ">
        <div class="col"></div>

        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Thêm Vouchers
        </button>
        <div class="col"></div>



        </section>
    <section class="row mx-0 mt">

        <div class="col"></div>
        <div class="col-10">
            <form action="?act=addvoucher" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Voucher</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" disabled placeholder="Tăng tự động" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tên Voucher</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="ten_voucher" value="<?= isset($ten_Voucher) ? $ten_voucher : '' ?>">
                    <span style="color: red;"><?php echo isset($error['ten_voucher']) ? $error['ten_voucher'] : ''; ?></span>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Hình Ảnh</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="anh_voucher" accept="*/*" >
                    <span style="color: red;"><?php echo isset($error['anh_voucher']) ? $error['anh_voucher'] : ''; ?></span>
                    <span style="color: green;"><?php echo isset($imgTC) ? $imgTC : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="ngay_batdau" value="<?= isset($ngay_batdau) ? $ngay_batdau : '' ?>">
                    <span style="color: red;"><?php echo isset($error['ngay_batdau)']) ? $error['ngay_batdau'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Ngày Kết Thúc</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="ngay_ketthuc" value="<?= isset($ngay_ketthuc) ? $ngay_ketthuc : '' ?>">
                    <span style="color: red;"><?php echo isset($error['ngay_ketthuc)']) ? $error['ngay_ketthuc'] : ''; ?></span>
                </div>

                
                <div class="form-group">
                    <label for="exampleInputPassword1">Giảm Giá</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="giam_gia" value="<?= isset($giam_gia) ? $giam_gia : '' ?>">
                    <span style="color: red;"><?php echo isset($error['giam_gia']) ? $error['giam_gia'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Mô Tả</label> <br>
                    <textarea name="mota_voucher" id="" cols="112" rows="7" value="<?= isset($mota_voucher) ? $mota_voucher : '' ?>"><?= isset($mota_voucher) ? $mota_voucher : '' ?></textarea> <br>
                    
                    <span style="color: red;"><?php echo isset($error['mota_voucher']) ? $error['mota_voucher'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Số Lượng</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="so_luong" value="<?= isset($so_luong) ? $so_luong : '' ?>">
                    <span style="color: red;"><?php echo isset($error['so_luong']) ? $error['so_luong'] : ''; ?></span>
                </div>
                        
                
                <span style="color: green;"><?php echo isset($thongbaoTC) ? $thongbaoTC : ''; ?></span> <br>

                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <div class="col"></div>

    </section>


</div>