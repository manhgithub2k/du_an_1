<!-- /.container-fluid -->
<div class="container-fluid " >
    <section class="row mx-0  ">
        <div class="col"></div>

        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Thêm Sách
        </button>
        <div class="col"></div>



        </section>
    <section class="row mx-0 mt">

        <div class="col"></div>
        <div class="col-10">
            <form action="?act=addphong" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Phòng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" disabled placeholder="Tăng tự động" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số Phòng</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="sophong" value="<?= isset($soPhong) ? $soPhong : '' ?>">
                    <span style="color: red;"><?php echo isset($error['sophong']) ? $error['sophong'] : ''; ?></span>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Hình Ảnh</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="img" accept="*/*" >
                    <!-- <?php echo $_FILES['img']['name'] ?> -->
                    <span style="color: red;"><?php echo isset($error['img']) ? $error['img'] : ''; ?></span>
                    <span style="color: green;"><?php echo isset($imgTC) ? $imgTC : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Giá Phòng</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="gia" value="<?= isset($gia) ? $gia : '' ?>">
                    <span style="color: red;"><?php echo isset($error['gia']) ? $error['gia'] : ''; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô Tả</label> <br>
                    <textarea name="mota" id="" cols="112" rows="7" value="<?= isset($moTa) ? $moTa : '' ?>"><?= isset($moTa) ? $moTa : '' ?></textarea>
                    
                    <span style="color: red;"><?php echo isset($error['mota']) ? $error['mota'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Số Lượng Người</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="soluongnguoi" value="<?= isset($soLN) ? $soLN : '' ?>">
                    <span style="color: red;"><?php echo isset($error['soluongnguoi']) ? $error['soluongnguoi'] : ''; ?></span>
                </div>
                

                <div class="form-group">
                    <label for="exampleInputPassword1">Diện Tích</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="dientich" value="<?= isset($dienTich) ? $dienTich : '' ?>">
                    <span style="color: red;"><?php echo isset($error['dientich']) ? $error['dientich'] : ''; ?></span>
                </div>
                
                <div class="form-group">

                    <label for="exampleInputPassword1">Loại Phòng</label>
                    <select name="idlp" id="" class="form-control" id="exampleInputPassword1">
                        <option value="" >-- Chọn --</option>
                        <?php foreach ($AllLoaiPhong as $loaiPhong){ 
                            extract($loaiPhong);
                        ?>
                        
                        <option value="<?= $id_loaiphong ?>" <?= isset($idLP) && $id_loaiphong == $idLP? "selected" : ""  ?>   ><?= $ten_loai ?></option>
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