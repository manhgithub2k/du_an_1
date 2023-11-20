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
                    <select name="idphong" id="sophong" class="form-control" id="exampleInputPassword1"   onchange="id_phong()">
                        <option value="" >-- Chọn --</option>
                        <?php foreach ($listPhong as $phong){ 
                            extract($phong);
                        ?>
                        
                        <option value="<?= $id_phong ?>" <?= isset($idP)? $id_phong == $idP ? 'selected' : '': '' ?>    ><?= $so_phong ?></option>
                        <?php }?>
                    </select>
                    <span style="color: red;"><?php echo isset($error['idphong']) ? $error['idphong'] : ''; ?></span>               
                </div>
                
               
                
                <?php if(isset($_GET['idphong'])){ ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tiện Ích</label> <br>
                    <table >
                        <tr class="table_checkbox">
                            <?php 
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
    function id_phong() {
        var x;
        
    x = document.getElementById("sophong").value;
    var form = document.getElementById('formtienich');

    if (x !== '') {
        form.action = "index.php?act=addtienichphong&idphong=" + x;
        window.location.href = "index.php?act=addtienichphong&idphong=" + x;
    
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
        foreach ($listTI_P as $ti_P) {
         extract($ti_P);
     ?>
    document.getElementById('tienich<?= $id_ti ?>').checked= true ;
        <?php } ?>
    // document.getElementById('tienich1').checked= true ;

</script>