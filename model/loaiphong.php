<?php  

function insert_loaiphong($tenLp,$img,$gia,$moTa,$soLN,$dienTich,$idGiuong){
    $sql = "INSERT INTO `loai_phong`( `ten_loai`, `gia`, `anh`, `mo_ta`, `sl_nguoi`, `dien_tich` , `id_lg`) VALUES (?,?,?,?,?,?,?)";           
            pdo_execute($sql,$tenLp,$gia,$img,$moTa,$soLN,$dienTich,$idGiuong);
}

function select_Allloaiphong($keyw) {
    $sql = "SELECT * FROM `loai_phong` p LEFT JOIN `loai_giuong` g ON p.id_lg = g.id_loai_giuong WHERE 1";
    
    if ($keyw != " ") {
        $sql .= " AND ten_loai LIKE '%".$keyw ."%'";
    }
    
    $sql .= " ORDER BY id_loaiphong DESC";
    
    $dsLoai = pdo_query($sql );
    return $dsLoai;
}

// function select_Alldanhmuc_sl(){
//     $sql = "SELECT *,sum(s.id_s) 'sl_sach' FROM `danhmuc` d LEFT JOIN `sach` s ON d.id_dm = s.id_dm group by s.id_s order by d.id_dm DESC";
//             $dsLoai  = pdo_query($sql);
//             return $dsLoai;           
// }

function select_Oneloaiphong($id) {
    $sql = "SELECT * FROM `loai_phong` WHERE id_loaiphong = ?";
    $loaiphong = pdo_query_one($sql,$id);
    return $loaiphong;
}

function delete_loaiphong($id){
    $sql = "DELETE  FROM loai_phong WHERE id_loaiphong = ".$id;
            pdo_execute($sql);
}

function update_loaiphong($id,$idnew,$name){
    $sqlUpdate = "UPDATE `loai_phong` SET `id_dm`= $idnew,`name_dm`='$name' WHERE id_dm=".$id;
                pdo_execute($sqlUpdate);
}

function update_loaiphong1($id,$tenLp,$img,$gia,$moTa,$soLN,$dienTich,$idGiuong){
    $sqlUpdate = "UPDATE `loai_phong` SET `ten_loai`=?,`gia`=?,`anh`=?,`mo_ta`=?,`sl_nguoi`=?,`dien_tich`=?,`id_lg`=? WHERE  id_loaiphong= ?";
                pdo_execute($sqlUpdate,$tenLp,$gia,$img,$moTa,$soLN,$dienTich,$idGiuong,$id);
}

function select_Top_4_Loai_Phong()
{
    $sql = "SELECT * FROM `loai_phong` LIMIT 4";
    return pdo_query($sql);
}

function select_All_Loai_Phong()
{
    $sql = "SELECT * FROM `loai_phong`";

    return pdo_query($sql);
}

function getLoaiPhongById($idLp)
{

    $sql = "SELECT * FROM `loai_phong` WHERE id_loaiphong = ?";
    return pdo_query_one($sql, $idLp);
}

?>