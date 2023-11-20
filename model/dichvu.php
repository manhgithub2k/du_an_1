<?php 
function select_Alldichvu(){
    $sql = "SELECT * FROM `dich_vu`";
    return pdo_query($sql);
}
function insert_dichvu_phong($idPhong,$dv){
    $sql = "INSERT INTO `dichvu_phong`(`id_p`, `id_dv`) VALUES (?,?)";
     pdo_execute($sql,$idPhong,$dv);
}