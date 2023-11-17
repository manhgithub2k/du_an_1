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
                            <form action="?act=editlp&id=<?= $id_loaiphong ?>" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID Loại Phòng</label>
                                    <input type="text" class="form-control"  disabled placeholder="<?php echo $id_loaiphong ?>" >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên Loại Phòng</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="tenlp" value="<?php echo $ten_loai ?>" >
                                    <span style="color: red;"><?php echo isset($thongbao)? $thongbao : ''; ?></span>
                                    <span style="color: green;"><?php echo isset($thongbaoTC)? $thongbaoTC : ''; ?></span>
                                </div>
                                
                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                            </form>
                        </div>
                        <div class="col"></div>

                    </section>


                </div>