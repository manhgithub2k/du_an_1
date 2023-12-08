<?php

function getAllVouchers() {
    $sql = "SELECT * FROM vouchers";
    return pdo_query($sql);
}

function select_Allvouchers() {
    $sql = "SELECT * FROM `vouchers`";
    return pdo_query($sql);
}

function select_Onevoucher($id) {
    $sql = "SELECT * FROM vouchers WHERE id_voucher =?";
    $voucher = pdo_query_one($sql, $id);
    return $voucher;
}
function insert_voucher($ma_voucher, $ten_voucher, $anh_voucher, $ngay_batdau, $ngay_ketthuc, $giam_gia, $mota_voucher, $so_luong) {
    $sql = "INSERT INTO `vouchers`( `ma_voucher`,`ten_voucher`, `anh_voucher`, `ngay_batdau`, `ngay_ketthuc`, `giam_gia`, `mota_voucher`, `so_luong`) VALUES ('$ma_voucher', '$ten_voucher','$anh_voucher','$ngay_batdau','$ngay_ketthuc','$giam_gia','$mota_voucher','$so_luong')";
    pdo_execute($sql);
}

function update_voucher($id, $ma_voucher, $ten_voucher, $anh_voucher, $ngay_batdau, $ngay_ketthuc, $giam_gia, $mota_voucher, $so_luong) {

    $sqlUpdate = "UPDATE `vouchers` SET `ma_voucher`=?,`ten_voucher`=?, `anh_voucher`=?, `ngay_batdau`=?, `ngay_ketthuc`=?, `giam_gia`=?, `mota_voucher`=?, `so_luong`=? WHERE id_voucher=?";
    pdo_execute($sqlUpdate, $ma_voucher, $ten_voucher, $anh_voucher, $ngay_batdau, $ngay_ketthuc, $giam_gia, $mota_voucher, $so_luong, $id);
}
function delete_voucher($id) {
    $sql = "DELETE  FROM vouchers WHERE id_voucher = ".$id;
    pdo_execute($sql);
}
function getVoucherById($id) {
    $sql = "SELECT * FROM vouchers where id_voucher = ?";
    return pdo_query_one($sql, $id);
}