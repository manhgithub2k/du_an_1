<?php 
function select_Alltienich(){
    $sql = "SELECT * FROM `tien_ich`";
    return pdo_query($sql);
}
function insert_tienich_loaiphong($idLP,$tienich){
    $sql = "INSERT INTO `tienich_loai`(`id_lp`, `id_ti`) VALUES (?,?)";
     pdo_execute($sql,$idLP,$tienich);
}

function select_tienich_loaiphong($id){
    $sql = "SELECT * FROM tienich_loai   WHERE id_lp = ?";
    return pdo_query($sql,$id);
}
function delete_tienich_loaiphong($id){
    $sql = "DELETE FROM `tienich_loai`   WHERE id_lp = ?";
     pdo_execute($sql,$id);
}




function select_Onetienich($id) {
    $sql = "SELECT * FROM `tien_ich` WHERE id_tienich = ?";
    $tienich = pdo_query_one($sql,$id);
    return $tienich;
}

function insert_tienich($ten_tienich, $mota_tienich){
    $sql = "INSERT INTO `tien_ich`( `ten_tienich`, `mota_tienich`) VALUES ('$ten_tienich', '$mota_tienich')";           
            pdo_execute($sql);
}

function update_tienich($id,$ten_tienich, $mota_tienich){
    $sqlUpdate = "UPDATE `tien_ich` SET `ten_tienich`='$ten_tienich', `mota_tienich`='$mota_tienich' WHERE id_tienich= ?";
                pdo_execute($sqlUpdate,$id);
}

function delete_tienich($id){
    $sql = "DELETE  FROM tien_ich WHERE id_tienich = ".$id;
            pdo_execute($sql);
}


?>