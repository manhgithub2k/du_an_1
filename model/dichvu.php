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
    FROM dat_phong LEFT JOIN dichvu_datphong 
    ON  dat_phong.id_don = dichvu_datphong.id_dp 
    LEFT JOIN dich_vu ON dich_vu.id_dichvu = dichvu_datphong.id_dv  WHERE dat_phong.id_p = ?";
    return pdo_query($sql,$id);
}

function delete_dichvu_datphong($id){
    $sql = "DELETE FROM `dichvu_datphong`   WHERE id_dp = ?";
     pdo_execute($sql,$id);
}



function select_Onedichvu($id) {
    $sql = "SELECT * FROM `dich_vu` WHERE id_dichvu = ?";
    $dichvu = pdo_query_one($sql,$id);
    return $dichvu;
}

function insert_dichvu($ten_dichvu,$gia_dichvu,$mota_dv){
    $sql = "INSERT INTO `dich_vu`( `ten_dichvu`, `gia_dichvu`, `mota_dv`) VALUES ('$ten_dichvu', '$gia_dichvu', '$mota_dv')";           
            pdo_execute($sql);
}

function update_dichvu($id,$ten_dichvu, $gia_dichvu, $mota_dv){
    $sqlUpdate = "UPDATE `dich_vu` SET `ten_dichvu`='$ten_dichvu', `gia_dichvu`='$gia_dichvu', `mota_dv`='$mota_dv' WHERE id_dichvu= ?";
                pdo_execute($sqlUpdate,$id);
}

function delete_dichvu($id){
    $sql = "DELETE  FROM dich_vu WHERE id_dichvu = ".$id;
            pdo_execute($sql);
}






