<?php 
function select_Alldatphong(){
    $sql = "SELECT * FROM `dat_phong` dp LEFT JOIN phong p ON dp.id_p = p.id_phong order by id_don DESC";
    return pdo_query($sql);
}
function select_dathang_phong(){
    $sql = "SELECT * FROM `dat_phong` dp LEFT JOIN phong p ON dp.id_p = p.id_phong where dp.trang_thai_don = 1 order by id_don DESC";
    return pdo_query($sql);
}
function update_datphong_trangthaidon($idDon,$idPhong,$trangthaidon){
    $sql = "UPDATE dat_phong SET trang_thai_don=?,id_p = ? WHERE id_don =? ";
    pdo_execute($sql,$trangthaidon,$idDon,$idPhong);
}
function update_datphong($id_d,$id_p,$id_lp,$ngay_checkin,$ngay_checkout,$ngay_datphong,$ngay_hoanthanh,$trang_thai_don,$ten_khachhang,$dia_chi,$tong_tien){
    $sql = "UPDATE `dat_phong` SET `id_p`=?,`id_lp`=?,`ngay_checkin`=?,`ngay_checkout`=?,`ngay_datphong`=?,`ngay_hoanthanh`=?,`trang_thai_don`=?,`ten_khachhang`=?,`dia_chi`=?,`dia_chi`=?,`tong_tien`=? WHERE id_don= ?";
    pdo_execute($sql,$id_p,$id_lp,$ngay_checkin,$ngay_checkout,$ngay_datphong,$ngay_hoanthanh,$trang_thai_don,$ten_khachhang,$dia_chi,$dia_chi,$tong_tien,$id_d);
}

?>