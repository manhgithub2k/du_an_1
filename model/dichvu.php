<?php 
function select_Alldichvu(){
    $sql = "SELECT * FROM `dich_vu`";
    return pdo_query($sql);
}
function insert_dichvu_phong($idPhong,$dv){
    $sql = "INSERT INTO `dichvu_phong`(`id_p`, `id_dv`) VALUES (?,?)";
     pdo_execute($sql,$idPhong,$dv);
}

function select_dichvu_phong($id){
    $sql = "SELECT * FROM dichvu_phong   WHERE id_p = ?";
    return pdo_query($sql,$id);
}

function delete_dichvu_phong($id){
    $sql = "DELETE FROM `dichvu_phong`   WHERE id_p = ?";
     pdo_execute($sql,$id);
}