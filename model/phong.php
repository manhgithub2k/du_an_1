<?php  
// function insert_phong($soPhong,$image,$idLP,$giaPhong,$moTa,$soLuong,$dienTich){
//     $sql = "INSERT INTO `phong`( `so_phong`,`anh_phong`, `id_lp`, `gia_phong`, `mota_phong`, `sl_nguoi`, `dien_tich`) VALUES ('$soPhong','$image',$idLP,$giaPhong,'$moTa',$soLuong,$dienTich)";           
//             pdo_execute($sql);
// }
function insert_phong($soPhong, $image, $idLP, $giaPhong, $moTa, $soLuong, $dienTich) {
    $sql = "INSERT INTO `phong`(`so_phong`, `anh_phong`, `id_lp`, `gia_phong`, `mota_phong`, `sl_nguoi`, `dien_tich`) VALUES (?,?,?,?,?,?,?)";           
    pdo_execute($sql, $soPhong, $image, $idLP, $giaPhong, $moTa, $soLuong, $dienTich);
}


function select_Allphong($keyw,$idLP){
    
    $sql = "SELECT * FROM phong p
    Join loai_phong as l ON p.id_lp = l.id_loaiphong
     ";
    if($keyw != " "){
        $sql .=  " AND p.so_phong LIKE '%".$keyw."%'";
    }
    if($idLP > 0){
        $sql.=" AND l.id_loaiphong=".$idLP;
    }
    $sql.= " AND p.trang_thai = 0 order by p.id_phong DESC";
    
    
            return pdo_query($sql);
}


function select_Onephong($id){
    $sql = "SELECT * FROM phong WHERE id_phong =?";
    $phong =pdo_query_one($sql,$id);
            return $phong;
}
function delete_phong($id){
    $sql = "DELETE FROM `phong` WHERE id_phong = ?";
            pdo_execute($sql,$id);
}
function delete_soft_phong($id){
    $sqlUpdate = "UPDATE phong SET trang_thai= 1  WHERE id_phong=".$id;
                pdo_execute($sqlUpdate);
}
function update_phong($id,$soPhong,$img,$idLP,$gia,$moTa,$soLN,$dienTich){

    $sqlUpdate = "UPDATE `phong` SET `so_phong`=?, `anh_phong`=?, `id_lp`=?, `gia_phong`=?, `mota_phong`=?, `sl_nguoi`=?, `dien_tich`=? WHERE id_phong=?";
                pdo_execute($sqlUpdate,$soPhong,$img,$idLP,$gia,$moTa,$soLN,$dienTich,$id);
}





function select_CungLoai($idPhong,$idLoaiPhong){
    // không cách ở AND là oẳng
    // $sql = "SELECT * FROM sanpham WHERE iddm = ".$iddm ."AND idsp <> ".$idsp ;   
    $sql = "SELECT * FROM phong WHERE id_lp = ".$idLoaiPhong ." AND id_phong <> ".$idPhong ;   
            $ds  = pdo_query($sql);
            return $ds;
}
function select_theoLoaiPhong($id){
    $sql = "SELECT * FROM loai_phong  WHERE id_loaiphong = ".$id  ;   
            $ds  = pdo_query($sql);
            return $ds;
} 







?>