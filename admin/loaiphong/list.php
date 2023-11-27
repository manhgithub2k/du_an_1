<!-- /.container-fluid -->
<div class="container-fluid " >
                    <section class="row mx-0  ">
                        <div class="col"></div>

                        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Danh Sách Danh Mục
                          </button>
                        <div class="col"></div>                        
                    </section>
                    <section class="row mx-0  ">
                        <div class="col"></div>

                        <span style="color: greenyellow;"><?php  echo isset($thongbao)? $thongbao : "";?></span>

                        <div class="col"></div>                        
                    </section>
                    <section class="row mx-0 mt">
                        
                        <div class="col"></div>
                        <div class="col-10">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">ID Loại Phòng</th>
                                    <th scope="col">Tên Loại Phòng</th>
                                    <th scope="col">Ảnh Bìa</th>
                                    <th scope="col">Mô Tả</th>
                                    <th scope="col">Giá </th>
                                    <th scope="col">Số Người </th>
                                    <th scope="col">Diện Tích </th>
                                    <th scope="col">Loại Giường </th>
                                    <th scope="col">ACT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stt = 0;
                                     foreach ($listLoaiPhong as $dm) {
                                        $stt++;
                                        extract($dm);
                                     
                                    ?>
                                    <tr>
                                    <th scope="row"><?= $stt ?></th>
                                    <td><?= $dm['0'] ?></td>
                                    <td><?= $ten_loai?></td>
                                    <td><img src="<?= $anh ?>" alt="" style="height: 100px;"></td>
                                    <td><?= $mo_ta ?></td>
                                    <td><?= $gia ?> VND</td>
                                    <td><?= $sl_nguoi == null ? 0 : $sl_nguoi ?></td>
                                    <td><?= $dien_tich ?></td>
                                    <td><?= $ten_giuong ?></td>

                                    <!-- <td><?= $sl_sach == null ? 0 : $sl_sach ?></td> -->
                                    <td>
                                        <button type="submit" class="btn btn-danger" > <a href="?act=deletelp&id=<?= $dm['0']?>">Xóa</a></button>
                                        <button type="submit" class="btn btn-warning"><a href="?act=editlp&id=<?= $dm['0']?>">Sửa</a></button>
                                    </td>
                                    
                                    </tr> 

                                     <?php } ?>
                                                                    
                                </tbody>
                            </table>
                           
                        </div>
                        <div class="col"></div>

                    </section>


                </div>