<!-- /.container-fluid -->
<div class="container-fluid " >
        <section class="row mx-0  ">
            <div class="col"></div>

            <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                Danh Sách Loại Phòng
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
                        <th scope="col">ID Phòng</th>
                        <th scope="col">Tên Phòng</th>
                        <th scope="col">Ảnh Bìa</th>
                        <th scope="col">Mô Tả</th>
                        <th scope="col">Giá Phòng</th>
                        <th scope="col">Số Lượng Người </th>
                        <th scope="col">Danh Mục </th>
                        <th scope="col">ACT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                            foreach ($listPhong as $phong) {
                            $stt++;
                            extract($phong);
                            
                        ?>
                        <tr>
                        <th scope="row"><?= $stt ?></th>
                        <td><?= $id_phong ?></td>
                        <td><?= $so_phong ?></td>
                        <td><img src="<?= $anh_phong ?>" alt="" style="height: 100px;"></td>
                        <td><?= $mota_phong ?></td>
                        <td><?= $gia_phong ?> VND</td>
                        <td><?= $sl_nguoi == null ? 0 : $sl_nguoi ?></td>
                        <td><?= $ten_loai ?></td>

                        <td>
                            <button type="submit" class="btn btn-danger" > <a href="?act=deletephong&id=<?= $id_phong?>" onclick="return confirm('Bạn muốn xóa ?' )">Xóa</a></button>
                            <button type="submit" class="btn btn-warning"><a href="?act=editphong&id=<?= $id_phong?>">Sửa</a></button>
                        </td>
                        
                        </tr> 

                            <?php } ?>
                                                        
                    </tbody>
                </table>
                
            </div>
            <div class="col"></div>

        </section>


    </div>