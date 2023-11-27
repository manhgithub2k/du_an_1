<script>
  function id_Phong(){
    var id_phong = document.getElementById("idphong").value;
    console.log(id_phong);
    var form = document.getElementById('formdichvu');
    if(id_phong != ' '){
         form.action = "index.php?act=adddichvudatphong&a=adddichvudatphong&idphong=" + id_phong;
        window.location.href = "index.php?act=adddichvudatphong&a=adddichvudatphong&idphong=" + id_phong;
    }
  }
   


  </script>  

<!-- /.container-fluid -->
<div class="container-fluid " >
    <section class="row mx-0  " style="margin-bottom: 20px;">
        <div class="col"></div>

        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Thêm Dịch Vụ cho Phòng
        </button>
        <div class="col"></div>



        </section>
    <section class="row mx-0 mt">

        <div class="col"></div>
        <div class="col-10">
            <form action="" method="post" enctype="multipart/form-data" id="formdichvu">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Đơn - Dịch Vụ</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" disabled placeholder="Tăng tự động" >

                </div>
                <div class="form-group ">
                    <label for="exampleInputPassword1"> Số Phòng</label>
                    <div class="form-group " style="display: flex; ">
                        
                        
                        <select name="idphong" id="idphong" class="form-control col-12" onchange="id_Phong()" >
                            <option value="" >-- Phòng Đang Có Khách --</option>
                            <?php foreach ($listP as $p){ 
                                extract($p);
                            ?>
                            
                            <option value="<?= $id_p.'&iddon='.$id_don ?>" <?= isset($idPhong)? $idPhong == $id_p ? 'selected' : '': '' ?>   ><?=  $ten_phong ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <span style="color: red;"><?php echo isset($error['ten_phong']) ? $error['ten_phong'] : ''; ?></span>  
                                
                </div>
                
                
               
                
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Dịch Vụ</label> <br>
                    <table >
                        <tr class="table_checkbox">
                            
                            <?php 
                                foreach ($listDichVu as $dichVu) {
                                extract($dichVu);
                            ?>

                            <td >
                                <input type="checkbox" id="dichvu<?= $id_dichvu ?>" name="dichvu[]" value="<?= $id_dichvu ?>">
                                <label for="dichvu<?= $id_dichvu ?>"> <?= $ten_dichvu ?></label><br>
                            </td>
                            <?php } ?>                           
                        </tr>

                        
                        
                    </table>
                    <span style="color: red;"><?php echo isset($error['dichvu']) ? $error['dichvu'] : ''; ?></span>
                    <span style="color: green;"><?php echo isset($thongbao) ? $thongbao : ''; ?></span>

                    
                    <p style="font-size: 20px;">Tổng tiền : <strong style="color: red;"> <?=  isset($tongTien) ? $tongTien : "0" ?> VND  </strong></p> 
                </div>
                
                
                
                
                
                <span style="color: green;"><?php echo isset($thongbaoTC) ? $thongbaoTC : ''; ?></span> <br>

                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <div class="col"></div>

    </section>
  

</div>
<script>
    function kiemtra_don(){
        console.log('hddhh');
        // var don;        
        // don = document.getElementById("search_query").value;
        // // var form = document.getElementById('formdichvu');
        // console.log(don);

        // if (don !== '') {
        // form.action = "index.php?act=adddichvudatphong&a=adddichvudatphong&iddon=" + don;
        // window.location.href = "index.php?act=adddichvudatphong&a=adddichvudatphong&iddon=" + don;                                
        // }

    } 
    // function id_Phong() {
    // var x;        
    // x = document.getElementById("sophong").value;
    // var form = document.getElementById('formdichvu');

    // if (x !== '') {
    //     form.action = "index.php?act=adddichvuphong&idphong=" + x;
    //     window.location.href = "index.php?act=adddichvuphong&idphong=" + x;                                
    // }
    // }

    

    <?php 
        foreach ($dv_DH as $dichVu) {
         extract($dichVu);
     ?>
    document.getElementById('dichvu<?= $id_dv ?>').checked= true ;
        <?php } ?>
</script>
