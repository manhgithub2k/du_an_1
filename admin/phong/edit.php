
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
            <form action="?act=editp&id=<?=$id_phong?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Phòng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" disabled placeholder="Tăng tự động" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tên Phòng</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="ten_phong" value="<?= $ten_phong ?>">
                    <span style="color: red;"><?php echo isset($error['ten_phong']) ? $error['ten_phong'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Mô Tả</label> <br>
                    <textarea name="mota_phong" id="" cols="112" rows="7" ><?= $mota_phong ?></textarea>
                    
                    <span style="color: red;"><?php echo isset($error['mota_phong']) ? $error['mota_phong'] : ''; ?></span>
                </div>
                
                <div class="form-group">

                    <label for="exampleInputPassword1">Loại Phòng</label>
                    <select name="id_lp" id="" class="form-control" id="exampleInputPassword1">
                        <option value="" >-- Chọn --</option>
                        <?php foreach ($AllLoaiPhong as $loaiphong){ 
                            extract($loaiphong);
                        ?>
                        
                        <option value="<?= $id_loaiphong ?>" <?=  $id_loaiphong == $id_lp ? "selected" : ""  ?>   ><?= $ten_loai ?></option>
                        <?php }?>
                    </select>
                    <span style="color: red;"><?php echo isset($error['loai_phong']) ? $error['loai_phong'] : ''; ?></span>
                </div>
                
                
                
                <span style="color: green;"><?php echo isset($thongbaoTC) ? $thongbaoTC : ''; ?></span> <br>

                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <div class="col"></div>

    </section>


</div>