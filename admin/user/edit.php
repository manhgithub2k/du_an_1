<!-- /.container-fluid -->
<div class="container-fluid " >
                    <section class="row mx-0  ">
                        <div class="col"></div>

                        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Cập Nhật Vai Trò
                          </button>
                        <div class="col"></div>

                        
                        
                        </section>
                        
                    <section class="row mx-0 mt">
                        
                        <div class="col"></div>
                        <div class="col-10">
                            <form action="?act=editu&id=<?= $id_khachhang ?>" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ Và Tên</label>
                                    <input type="text" class="form-control"  disabled placeholder="<?php echo $ho_ten ?>" >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Vai Trò</label>
                                    <select name="vaitro" id="" class="form-control" id="exampleInputPassword1">
                                        <option value="" >-- Chọn --</option>
                                        <?php foreach ($roLe as $vt){ 
                                            extract($vt);
                                        ?>
                                        
                                        <option value="<?= $value ?>" <?= isset($vai_tro) && $value == $vai_tro? "selected" : ""  ?>   ><?= $name ?></option>
                                        <?php }?>
                                    </select>
                                    <!-- <input type="text" class="form-control" id="exampleInputPassword1" name="tendm" value="<?php echo $name_dm ?>" > -->
                                    <span style="color: green;"><?php echo isset($thongbaoTC)? $thongbaoTC : ''; ?></span>
                                </div>
                                
                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                            </form>
                        </div>
                        <div class="col"></div>

                    </section>


                </div>