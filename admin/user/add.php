<!-- /.container-fluid -->
<div class="container-fluid " >
    <section class="row mx-0  ">
        <div class="col"></div>

        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." style="margin-bottom: 30px;">
            Thêm Tài Khoản Nhân Viên
        </button>
        <div class="col"></div>



        </section>
    <section class="row mx-0 mt">

        <div class="col"></div>
        <div class="col-10">
            <form action="?act=addu" method="post" enctype="multipart/form-data" >

                <div class="form-group">
                    <label for="hovaten">Họ và Tên</label>
                    <input type="text"   class="form-control" id="hovaten"  name="tennhanvien" value="<?= isset($tenNV) ? $tenNV : '' ?>">
                    <span style="color: red;" ><?php echo isset($error['tennhanvien'])? $error['tennhanvien'] : ''; ?></span>
                </div>
                
                
                <div class="form-group">
                    <label for="ngaysinh">Ngày Sinh</label>
                    <input type="date"   class="form-control" id="ngaysinh"  name="ngaysinh"  value="<?= isset($ngaysinh) ? $ngaysinh : '' ?>">
                    <span style="color: red;" ><?php echo isset($error['ngaysinh'])? $error['ngaysinh'] : ''; ?></span>
                </div>
                
                
                <div class="form-group">
                    <label for="anh">Ảnh</label>
                    <input type="file"   class="form-control" id="anh"  name="anh">
                    <span style="color: red;" ><?php echo isset($error['anh'])? $error['anh'] : ''; ?></span>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text"   class="form-control" id="email"  name="email" value="<?= isset($email) ? $email : '' ?>">
                    <span style="color: red;" ><?php echo isset($error['email'])? $error['email'] : ''; ?></span>
                </div>
                
                
                <div class="form-group">
                    <label for="sodienthoai">Số Điện Thoại</label>
                    <input type="text"   class="form-control" id="sodienthoai"  name="sodienthoai" value="<?= isset($sodienthoai) ? $sodienthoai : '' ?>">
                    <span style="color: red;" ><?php echo isset($error['sodienthoai'])? $error['sodienthoai'] : ''; ?></span>
                </div>
                
                
                <!-- <div class="form-group">
                    <label for="sodienthoai">Số Điện Thoại</label>
                    <input type="text"   class="form-control" id="sodienthoai"  name="sodienthoai">
                    <span style="color: red;" ><?php echo isset($error['sodienthoai'])? $error['sodienthoai'] : ''; ?></span>
                </div> -->
                
                
                
                <span style="color: green;"><?php echo isset($thongbao) ? $thongbao : ''; ?></span> <br>
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <div class="col"></div>

    </section>
</div>

<script>
    

</script>   