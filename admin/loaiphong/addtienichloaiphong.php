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
            <form action="" method="post" enctype="multipart/form-data" id="formtienich">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Phòng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" disabled placeholder="Tăng tự động" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số Phòng</label>
                    <select name="idloaiphong" id="loaiphong" class="form-control" id="exampleInputPassword1"   onchange="loai_phong()">
                        <option value="" >-- Chọn --</option>
                        <?php foreach ($listLoaiPhong as $loaiPhong){ 
                            extract($loaiPhong);
                        ?>
                        
                        <option value="<?= $id_loaiphong ?>" <?= isset($idLP)? $id_loaiphong == $idLP ? 'selected' : '': '' ?>    ><?= $ten_loai ?></option>
                        <?php }?>
                    </select>
                    <span style="color: red;"><?php echo isset($error['idloaiphong']) ? $error['idloaiphong'] : ''; ?></span>               
                </div>
                
               
                
                <?php if(isset($_GET['idloaiphong'])){ ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tiện Ích</label> <br>
                    <table >
                        <tr class="table_checkbox">
                            <?php 
                            // echo "<pre>";
                            // print_r($listTienich);
                                foreach ($listTienich as $TienIch) {
                                extract($TienIch);
                                
                            ?>

                            <td >
                                <input type="checkbox" id="tienich<?= $id_tienich ?>" name="tienich[]" value="<?= $id_tienich ?>">
                                <label for="tienich<?= $id_tienich ?>"> <?= $ten_tienich ?></label><br>
                            </td>
                            <?php } ?>                           
                        </tr>

                        
                        
                    </table>
                    <span style="color: red;"><?php echo isset($error['tienich']) ? $error['tienich'] : ''; ?></span>
                    <span style="color: green;"><?php echo isset($thongbao) ? $thongbao : ''; ?></span>

                    <!-- <br><textarea name="" id="" cols="30" rows="10">
                        <?php  print_r($tienIch);
                         foreach ($tienIch as $ti) {
                            echo $ti;
                            // insert_tienich_phong($idPhong,$ti);
    
                        }
                        ?>
                    </textarea> -->
                    
                </div>
                
                <?php } ?>
                
                
                
                <span style="color: green;"><?php echo isset($thongbaoTC) ? $thongbaoTC : ''; ?></span> <br>

                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <div class="col"></div>

    </section>


</div>
<script>
    function loai_phong() {
        var x;
        
    x = document.getElementById("loaiphong").value;
    var form = document.getElementById('formtienich');

    if (x !== '') {
        form.action = "index.php?act=addtienichloaiphong&idloaiphong=" + x;
        window.location.href = "index.php?act=addtienichloaiphong&idloaiphong=" + x;
    
}
}
    // function id_phong(){
    //     var x = document.getElementById("sophong").value;
    //     document.getElementById('formtienich').action = "index.php?act=addtienichphong&idphong="+x;
    //     var form = document.getElementById('formtienich');
    // if(document.getElementById("sophong").value != ''){
    //     form.submit();
    // }
        

    //     // Gửi form
    //     // form.submit();
    //     // Tải lại trang
    //     // location.reload();
    // }
    
    
    
    <?php 
        foreach ($listTI_LP as $ti_LP) {
         extract($ti_LP);
     ?>
    document.getElementById('tienich<?= $id_ti ?>').checked= true ;
        <?php } ?>
    // document.getElementById('tienich1').checked= true ;

</script>