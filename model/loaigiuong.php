<?php
function select_Allloaigiuong(){
    $sql = "SELECT * FROM `loai_giuong` order by id_loaigiuong desc";
            $dsLoaiGiuong  = pdo_query($sql);
            return $dsLoaiGiuong;
            
}
