<!-- /.container-fluid -->
<div class="container-fluid " >
                    <section class="row mx-0  ">
                        <div class="col"></div>

                        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Thêm Tiện Ích
                          </button>
                        <div class="col"></div>

                        
                        
                        </section>
                    <section class="row mx-0 mt">
                        
                        <div class="col"></div>
                        <div class="col-10">
                            <form action="?act=addti" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID Tiện Ích</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" disabled placeholder="Tăng tự động" >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên Tiện Ích</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="ten_tienich">
                                    <label for="exampleInputPassword1">Mô Tả</label> <br>
                                    <textarea name="mota_tienich" id="" cols="112" rows="7" ></textarea> <br>
                                    <span style="color: red;"><?php echo isset($thongbao)? $thongbao : ''; ?></span>
                                    <span style="color: green;"><?php echo isset($thongbaoTC)? $thongbaoTC : ''; ?></span>
                                </div>
                                
                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                            </form>
                        </div>
                        <div class="col"></div>

                    </section>


                </div>