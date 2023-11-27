<?php 
function select_Alldichvu(){
    $sql = "SELECT * FROM `dich_vu`";
    return pdo_query($sql);
}
function insert_dichvu_datphong($idDon,$dv){
    $sql = "INSERT INTO `dichvu_datphong`( `id_dv`, `id_dp`) VALUES (?,?)";
     pdo_execute($sql,$dv,$idDon);
}

function select_dichvu_datphong($id){
    $sql = "SELECT * 
    FROM dichvu_datphong JOIN dat_phong 
    ON dichvu_datphong.id_dp = dat_phong.id_don 
    JOIN dich_vu ON dich_vu.id_dichvu = dichvu_datphong.id_dv    WHERE dat_phong.id_p = ?";
    return pdo_query($sql,$id);
}

function delete_dichvu_datphong($id){
    $sql = "DELETE FROM `dichvu_datphong`   WHERE id_dp = ?";
     pdo_execute($sql,$id);
}