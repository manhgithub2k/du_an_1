<!-- /.container-fluid -->
<div class="container-fluid " >
    <section class="row mx-0  ">
        <div class="col"></div>

        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Thêm Tiện Ích cho Phòng
        </button>
        <div class="col"></div>



        </section>
    <section class="row mx-0 mt">

        <div class="col"></div>
        <div class="col-10">
            <form action="?act=adddichvuphong" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Phòng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" disabled placeholder="Tăng tự động" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số Phòng</label>
                    <select name="idphong" id="" class="form-control" id="exampleInputPassword1">
                        <option value="" >-- Chọn --</option>
                        <?php foreach ($listPhong as $phong){ 
                            extract($phong);
                        ?>
                        
                        <option value="<?= $id_phong ?>"    ><?= $so_phong ?></option>
                        <?php }?>
                    </select>
                    <span style="color: red;"><?php echo isset($error['idphong']) ? $error['idphong'] : ''; ?></span>               
                </div>
                
               
                
                
                <div class="form-group">
                    <label for="exampleInputPassword1">TDịch Vụ</label> <br>
                    <table >
                        <tr class="table_checkbox">
                            <?php 
                                foreach ($listDichVu as $dichVu) {
                                extract($dichVu);
                            ?>

                            <td >
                                <input type="checkbox" id="dichvu<?= $id_dichvu ?>" name="dichvu[]" value="<?= $id_dichvu ?>">
                                <label for="dichvu<?= $id_dichvu ?>"> <?= $ten_dichvu ?></label><br>
                            </td>
                            <?php } ?>                           
                        </tr>

                        
                        
                    </table>
                    <span style="color: red;"><?php echo isset($error['dichvu']) ? $error['dichvu'] : ''; ?></span>
                    <span style="color: green;"><?php echo isset($thongbao) ? $thongbao : ''; ?></span>

                    
                    
                </div>
                
                
                
                
                
                <span style="color: green;"><?php echo isset($thongbaoTC) ? $thongbaoTC : ''; ?></span> <br>

                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <div class="col"></div>

    </section>


</div>