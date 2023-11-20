<?php 
function select_Alltienich(){
    $sql = "SELECT * FROM `tien_ich`";
    return pdo_query($sql);
}
function insert_tienich_phong($idP,$tienich){
    $sql = "INSERT INTO `tienich_phong`(`id_p`, `id_ti`) VALUES (?,?)";
     pdo_execute($sql,$idP,$tienich);
}

function select_tienich_phong($id){
    $sql = "SELECT * FROM tienich_phong   WHERE id_p = ?";
    return pdo_query($sql,$id);
}
function delete_tienich_phong($id){
    $sql = "DELETE FROM `tienich_phong`   WHERE id_p = ?";
     pdo_execute($sql,$id);
}



?>