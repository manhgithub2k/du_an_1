<!-- /.container-fluid -->
<div class="container-fluid " >
    <section class="row mx-0  ">
        <div class="col"></div>

        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Sửa Phòng
        </button>
        <div class="col"></div>



        </section>
    <section class="row mx-0 mt">

        <div class="col"></div>
        <div class="col-10">
            <form action="?act=editphong&id=<?=$id_phong?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Phòng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" disabled placeholder="Tăng tự động" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tên Phòng</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="sophong" value="<?= $so_phong ?>">
                    <span style="color: red;"><?php echo isset($error['sophong']) ? $error['sophong'] : ''; ?></span>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Ảnh Phòng</label>
                    <img src="<?= $anh_phong ?>" alt="" style="height: 100px; padding: 5px;">
                    <input type="file" class="form-control" id="exampleInputPassword1" name="img" accept="*/*" >
                    <!-- <?php echo $_FILES['img']['name'] ?> -->
                    <span style="color: red;"><?php echo isset($error['img']) ? $error['img'] : ''; ?></span>
                    <span style="color: green;"><?php echo isset($imgTC) ? $imgTC : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Giá</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="gia" value="<?= $gia_phong ?>">
                    <span style="color: red;"><?php echo isset($error['gia']) ? $error['gia'] : ''; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô Tả</label> <br>
                    <textarea name="mota" id="" cols="112" rows="7" ><?= $mota_phong ?></textarea>
                    
                    <span style="color: red;"><?php echo isset($error['mota']) ? $error['mota'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Số Lượng</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="soluong" value="<?= $sl_nguoi ?>">
                    <span style="color: red;"><?php echo isset($error['soluong']) ? $error['soluong'] : ''; ?></span>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Diện Tích</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="dientich" value="<?= $dien_tich ?>">
                    <span style="color: red;"><?php echo isset($error['dientich']) ? $error['dientich'] : ''; ?></span>
                </div>
                
                <div class="form-group">

                    <label for="exampleInputPassword1">Danh Mục</label>
                    <select name="idloaiphong" id="" class="form-control" id="exampleInputPassword1">
                        <option value="" >-- Chọn --</option>
                        <?php foreach ($AllLoaiPhong as $loaiphong){ 
                            extract($loaiphong);
                        ?>
                        
                        <option value="<?= $id_loaiphong ?>" <?=  $id_loaiphong == $id_lp ? "selected" : ""  ?>   ><?= $ten_loai ?></option>
                        <?php }?>
                    </select>
                    <span style="color: red;"><?php echo isset($error['loaiphong']) ? $error['loaiphong'] : ''; ?></span>
                </div>
                
                
                
                <span style="color: green;"><?php echo isset($thongbaoTC) ? $thongbaoTC : ''; ?></span> <br>

                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <div class="col"></div>

    </section>


</div>