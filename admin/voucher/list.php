<!-- /.container-fluid -->
<div class="container-fluid " >
                    <section class="row mx-0  ">
                        <div class="col"></div>

                        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Danh Sách Vouchers
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
                                    <th scope="col">ID Voucher</th>
                                    <th scope="col">Mã Voucher</th>
                                    <th scope="col">Tên Voucher</th>
                                    <th scope="col">Ảnh Voucher</th>
                                    <th scope="col">Ngày Bắt Đầu</th>
                                    <th scope="col">Ngày Kết Thúc</th>
                                    <th scope="col">Giảm Giá(%)</th>
                                    <th scope="col">Mô Tả</th>
                                    <th scope="col">Số Lượng</th>

                
                                    <th scope="col">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stt = 0;
                                     foreach ($listVouchers as $voucher) {
                                        $stt++;
                                        extract($voucher);
                                     
                                    ?>
                                    <tr>
                                    <th scope="row"><?= $stt ?></th>
                                    <td><?= $voucher['0'] ?></td>
                                    <td><?= $ma_voucher?></td>
                                    <td><?= $ten_voucher?></td>
                                    <td><img src="<?= $anh_voucher?>" alt="" style="height: 100px;"></td>
                                    <td><?= date ("d/m/Y",strtotime($ngay_batdau))?></td>
                                    <td><?= date ("d/m/Y",strtotime($ngay_ketthuc))?></td>
                                    <td><?= $giam_gia?></td>
                                    <td><?= $mota_voucher?></td>
                                    <td><?= $so_luong?></td>




                        
                                    <td>
                                        <button type="submit" class="btn btn-danger" > <a href="?act=deletevoucher&id=<?= $voucher['0']?>" onclick="return confirm('Bạn muốn xóa ?' )">Xóa</a></button>
                                        <button type="submit" class="btn btn-warning"><a href="?act=editvoucher&id=<?= $voucher['0']?>">Sửa</a></button>
                                    </td>
                                    
                                    </tr> 

                                     <?php } ?>
                                                                    
                                </tbody>
                            </table>
                           
                        </div>
                        <div class="col"></div>

                    </section>


                </div>