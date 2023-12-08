<?php 
function select_Alldatphong(){
    $sql = "SELECT * FROM `dat_phong` dp LEFT JOIN phong p ON dp.id_p = p.id_phong order by id_don DESC";
    return pdo_query($sql);
}
function select_dathang_phong(){
    $sql = "SELECT * FROM `dat_phong` dp LEFT JOIN phong p ON dp.id_p = p.id_phong where dp.trang_thai_don = 1 order by id_don DESC";
    return pdo_query($sql);
}
function insert_datphong($idP,$idLP,$checkin,$ngayCheckOut,$thoiGianHienTai,$tenKH,$diaChi,$email,$soDT,$tong){
    $sql = "INSERT INTO dat_phong( id_p, id_lp, ngay_checkin, ngay_checkout, ngay_datphong,  ten_khachhang, dia_chi, email, sdt,  tong_tien,trang_thai_don ) VALUES (?,?,?,?,?,?,?,?,?,?,1) ";
    pdo_execute($sql,$idP,$idLP,$checkin,$ngayCheckOut,$thoiGianHienTai,$tenKH,$diaChi,$email,$soDT,$tong);
}
function update_datphong_trangthaidon($idDon,$idPhong,$trangthaidon,$ngayHT){
    $sql = "UPDATE dat_phong SET trang_thai_don= ? , id_p = ?,ngay_hoanthanh = ?,ngay_checkout = ? WHERE id_don =? ";
    pdo_execute($sql,$trangthaidon,$idPhong,$ngayHT,$ngayHT,$idDon);
}
function update_datphong_trangthai($idDon,$idPhong,$trangthaidon){
    $sql = "UPDATE dat_phong SET trang_thai_don= ? , id_p = ? WHERE id_don =? ";
    pdo_execute($sql,$trangthaidon,$idPhong,$idDon);
}
// function update_datphong($id_d, $id_p, $id_lp, $ngay_checkin, $ngay_checkout, $ngay_datphong, $ngay_hoanthanh, $trang_thai_don, $ten_khachhang, $dia_chi, $tong_tien) {
//     $sql = "UPDATE `dat_phong` SET `id_p` = ? , `id_lp` = ?, `ngay_checkin` = ?, `ngay_checkout` = ?, `ngay_datphong` = ?, `ngay_hoanthanh` = ?, `trang_thai_don` = ?, `ten_khachhang` = ?, `dia_chi` = ?, `tong_tien` = ? WHERE id_don = ?";
//     pdo_execute($sql, $id_p, $id_lp, $ngay_checkin, $ngay_checkout, $ngay_datphong, $ngay_hoanthanh, $trang_thai_don, $ten_khachhang, $dia_chi, $tong_tien, $id_d);
// }

function update_datphong_tongtien($id_d,  $tong_tien) {
    $sql = "UPDATE `dat_phong` SET  `tong_tien` = ? WHERE id_don = ?";
    pdo_execute($sql,  $tong_tien, $id_d);
}

function themMotDatPhong($data, $uniqueId)
{
    $id_lp = $data['id_lp'];
    $ngay_checkin = $data['ngay_checkin'];
    $ngay_checkout = $data['ngay_checkout'];
    $now = new DateTime();
    $ngay_datphong = $now->format('y-m-d H:i:s');
    $ten_khackhang = $data['ten_khachhang'];
    $dia_chi = $data['dia_chi'];
    $email = $data['email'];
    $sdt = $data['sdt'];
    $id_voucher = $data['id_voucher'];
    $tong_tien = $data['tong_tien'];
    $payment_method = $data['payment_method'];




    $sql = "INSERT INTO `dat_phong` (uniqueId,id_lp, ngay_checkin, ngay_checkout, ngay_datphong, ten_khachhang, dia_chi, email, sdt, id_voucher, tong_tien, payment_method) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $uniqueId, $id_lp, $ngay_checkin, $ngay_checkout, $ngay_datphong, $ten_khackhang, $dia_chi, $email, $sdt, $id_voucher, $tong_tien, $payment_method);

}

function getOneDatPhongByUniqueId($uniqueId)
{
    $sql = "SELECT * FROM `dat_phong` WHERE `uniqueId` = ?";
    return pdo_query_one($sql, $uniqueId);
}

function getAllDatPhong()
{
    $sql = "SELECT * FROM `dat_phong`";
    return pdo_query($sql);
}

?>