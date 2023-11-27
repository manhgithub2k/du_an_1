<!-- /.container-fluid -->
<div class="container-fluid " >
                    <section class="row mx-0  ">
                        <div class="col"></div>

                        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Sửa Danh Mục
                          </button>
                        <div class="col"></div>

                        
                        
                        </section>
                        
                    <section class="row mx-0 mt">
                        
                        <div class="col"></div>
                        <div class="col-10">
                            <form action="?act=editlp&id=<?= $id_loaiphong ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID Loại Phòng</label>
                                    <input type="text" class="form-control"  disabled placeholder="<?php echo $id_loaiphong ?>" >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên Loại Phòng</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="tenlp" value="<?php echo $ten_loai ?>" >
                                    <span style="color: red;"><?php echo isset($thongbao)? $thongbao : ''; ?></span>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình Ảnh</label>
                                    <img src="<?= $anh ?>" alt="" style="height: 100px; padding: 5px;">
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="img" accept="*/*" >
                                    <!-- <?php echo $_FILES['img']['name'] ?> -->
                                    <span style="color: green;"><?php echo isset($imgTC) ? $imgTC : ''; ?></span>
                                    <span style="color: red;"><?php echo isset($error['img']) ? $error['img'] : ''; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá </label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="gia" value="<?= isset($gia) ? $gia : '' ?>">
                                    <span style="color: red;"><?php echo isset($error['gia']) ? $error['gia'] : ''; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả</label> <br>
                                    <textarea name="mota" id="" cols="112" rows="7" value="<?= isset($moTa) ? $moTa : '' ?>"><?= isset($mo_ta) ? $mo_ta : '' ?></textarea>
                                    
                                    <span style="color: red;"><?php echo isset($error['mota']) ? $error['mota'] : ''; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số Lượng Người</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="soluongnguoi" value="<?= isset($sl_nguoi) ? $sl_nguoi : '' ?>">
                                    <span style="color: red;"><?php echo isset($error['soluongnguoi']) ? $error['soluongnguoi'] : ''; ?></span>
                                </div>

                           
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Diện Tích</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="dientich" value="<?= isset($dien_tich) ? $dien_tich : '' ?>">
                                    <span style="color: red;"><?php echo isset($error['dientich']) ? $error['dientich'] : ''; ?></span>
                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Loại Giường</label>
                                    <select name="idgiuong" id="" class="form-control" id="exampleInputPassword1">
                                        <option value="" >-- Chọn --</option>
                                        <?php foreach ($AllLoaiGiuong as $loaiGiuong){ 
                                            extract($loaiGiuong);
                                        ?>
                                        
                                        <option value="<?= $id_lg ?>" <?= isset($id_loaigiuong) && $id_lg == $id_loaigiuong? "selected" : ""  ?>   ><?= $ten_giuong ?></option>
                                        <?php }?>
                                    </select>
                                    <span style="color: red;"><?php echo isset($error['loaigiuong']) ? $error['loaigiuong'] : ''; ?></span>
                                </div>

                                <span style="color: green;"><?php echo isset($thongbaoTC)? $thongbaoTC : ''; ?></span> <br>
                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                            </form>
                        </div>
                        <div class="col"></div>

                    </section>


                </div>