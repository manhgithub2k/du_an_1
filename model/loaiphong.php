<?php  
function insert_loaiphong($tenLp){
    $sql = "INSERT INTO `loai_phong`( `ten_loai`) VALUES ('$tenLp')";           
            pdo_execute($sql);
}

function select_Allloaiphong(){
    $sql = "SELECT * FROM `loai_phong` order by id_loaiphong desc";
            $dsLoai  = pdo_query($sql);
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

function update_loaiphong1($id,$ten_Lp){
    $sqlUpdate = "UPDATE `loai_phong` SET `ten_loai`='$ten_Lp' WHERE id_loaiphong= ?";
                pdo_execute($sqlUpdate,$id);
}
?>