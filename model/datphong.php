<?php 
function select_Alldatphong(){
    $sql = "SELECT * FROM `dat_phong` dp LEFT JOIN phong p ON dp.id_p = p.id_phong order by id_don DESC";
    return pdo_query($sql);
}
function select_dathang_phong(){
    $sql = "SELECT * FROM `dat_phong` dp LEFT JOIN phong p ON dp.id_p = p.id_phong where dp.trang_thai_don = 1 order by id_don DESC";
    return pdo_query($sql);
}


?>