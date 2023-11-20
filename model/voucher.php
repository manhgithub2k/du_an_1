<?php
function select_Allvouchers(){
    $sql = "SELECT * FROM `vouchers`";
    return pdo_query($sql);
}

function select_Onevoucher($id){
    $sql = "SELECT * FROM vouchers WHERE id_voucher =?";
    $voucher =pdo_query_one($sql,$id);
            return $voucher;
}

function insert_voucher($ten_voucher,$anh_voucher,$ngay_batdau,$ngay_ketthuc,$giam_gia,$mota_voucher,$so_luong) {
    $sql = "INSERT INTO `vouchers`(`ten_voucher`, `anh_voucher`, `ngay_batdau`, `ngay_ketthuc`, `giam_gia`, `mota_voucher`, `so_luong`) VALUES (?,?,?,?,?,?,?)";           
    pdo_execute($sql, $ten_voucher, $anh_voucher, $ngay_batdau, $ngay_ketthuc, $giam_gia, $mota_voucher,$so_luong);
}

function update_voucher($id,$ten_voucher,$anh_voucher,$ngay_batdau,$ngay_ketthuc,$giam_gia,$mota_voucher,$so_luong){

    $sqlUpdate = "UPDATE `vouchers` SET `ten_voucher`=?, `anh_voucher`=?, `ngay_batdau`=?, `ngay_ketthuc`=?, `giam_gia`=?, `mota_voucher`=?, `so_luong`=? WHERE id_voucher=?";
                pdo_execute($sqlUpdate,$ten_voucher,$anh_voucher,$ngay_batdau,$ngay_ketthuc,$giam_gia,$mota_voucher,$so_luong,$id);
}
function delete_voucher($id){
    $sql = "DELETE  FROM vouchers WHERE id_voucher = ".$id;
            pdo_execute($sql);
}
?>