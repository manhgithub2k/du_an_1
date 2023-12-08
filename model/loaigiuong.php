<?php
function select_Allloaigiuong(){
    $sql = "SELECT * FROM `loai_giuong` order by id_loai_giuong desc";
            $dsLoaiGiuong  = pdo_query($sql);
            return $dsLoaiGiuong;
            
}

function getLoaiGiuongById($id)
{
    $sql = "SELECT * FROM loai_giuong WHERE id_loai_giuong = ?";

    return pdo_query_one($sql, $id);
}
