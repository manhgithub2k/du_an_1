
<!-- /.container-fluid -->
<div class="container-fluid " >
        <section class="row mx-0  ">
            <div class="col"></div>

            <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                Danh Sách Phòng
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
                        <th scope="col">Loại phòng</th>
                        <th scope="col">Mô Tả</th>
                        <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                            foreach ($listP as $phong) {
                            $stt++;
                            extract($phong);
                            
                        ?>
                        <tr>
                        <th scope="row"><?= $stt ?></th>
                        <td><?= $id_phong ?></td>
                        <td><?= $ten_phong ?></td>
                        <td><?= $ten_loai ?></td>
                        <td><?= $mota_phong ?></td>
                        

                        <td>
                            <button type="submit" class="btn btn-danger" > <a href="?act=deletep&id=<?= $id_phong?>" onclick="return confirm('Bạn muốn xóa ?' )">Xóa</a></button>
                            <button type="submit" class="btn btn-warning"><a href="?act=editp&id=<?= $id_phong?>">Sửa</a></button>
                        </td>
                        
                        </tr> 

                            <?php } ?>
                                                        
                    </tbody>
                </table>
                
            </div>
            <div class="col"></div>

        </section>


    </div>