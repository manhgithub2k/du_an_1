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



?>