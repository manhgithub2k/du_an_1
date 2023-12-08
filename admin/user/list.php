<!-- /.container-fluid -->
<div class="container-fluid " >
<section class="row mx-0  ">
            <div class="col"></div>

            <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." style="margin-bottom: 30px;">
                Danh Sách Người Dùng
                </button>
            <div class="col"></div>                        
        </section>
        <section class="row mx-0  ">
            <!-- <div class="col"></div> -->

            <span style="color: green;text-align: center;  width: 100%; "><?php  echo isset($thongbao)? $thongbao : "";?></span>

            <!-- <div class="col-0.5"></div>                         -->
        </section>
        <section class="row mx-0 mt">
            
            <!-- <div class="col"></div> -->
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">ID User</th>
                        <th scope="col">Họ và Tên </th>
                        <th scope="col">Ngày Sinh</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số Điện Thoại</th>
                        <th scope="col">Vai Trò</th>
                        <th scope="col">Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                            foreach ($listU as $user) {
                            $stt++;
                            extract($user);
                            
                        ?>
                        <tr>
                        <th scope="row"><?= $stt ?></th>
                        <td><?= $id_khachhang ?></td>
                        <td><?= $ho_ten ?></td>
                        <td><?= $ngay_sinh ?></td>
                        <td><img src="<?= $anh ?>" alt="" style="height: 100px;"></td>
                        <td><?= $email ?></td>
                        <td><?= $sdt ?></td>
                        <td><?php echo $vai_tro == 0 ? 'Administrator':( $vai_tro == 1 ? 'Nhân Viên' : '')  ?></td>

                        <td>
                            <?php if($_SESSION['admin']['id_khachhang'] != $id_khachhang){ ?>
                                <button type="submit" class="btn btn-danger" > <a href="?act=deleteu&id=<?= $id_khachhang?>" onclick="return confirm('Bạn muốn xóa ?' )">Xóa</a></button>
                                <button type="submit" class="btn btn-warning"><a href="?act=editu&id=<?= $id_khachhang?>">Sửa Vai Trò</a></button>
                            <?php } ?>
                            
                        </td>
                        
                        </tr> 

                            <?php } ?>
                                                        
                    </tbody>
                </table>
                
            </div>
            <!-- <div class="col"></div> -->

        </section>


    </div>

