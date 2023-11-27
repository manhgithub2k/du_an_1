<?php  
function select_Allphong(){
    $sql = "SELECT * FROM phong AS p JOIN loai_phong AS l ON p.id_lp = l.id_loaiphong";
    return pdo_query($sql);
}
function select_Allphong_dango(){
    $sql = "SELECT * FROM phong Where trang_thai = 1";
    return pdo_query($sql);
}

function select_Onephong($id){
    $sql = "SELECT * FROM phong WHERE id_phong =?";
    $phong =pdo_query_one($sql,$id);
            return $phong;
}

function insert_phong($ten_phong, $id_lp, $mota_phong) {
    $sql = "INSERT INTO `phong`(`ten_phong`, `id_lp`, `mota_phong`) VALUES ('$ten_phong', '$id_lp', '$mota_phong')";           
    pdo_execute($sql);
}


function update_phong($id,$ten_phong,$id_lp,$mota_phong){
    $sqlUpdate = "UPDATE `phong` SET `ten_phong`='$ten_phong', `id_lp`='$id_lp', `mota_phong`='$mota_phong' WHERE id_phong= ?";
                pdo_execute($sqlUpdate,$id);
}


function delete_phong($id){
    $sql = "DELETE FROM `phong` WHERE id_phong = ?";
            pdo_execute($sql,$id);
}
function count_phong($trang_thai){

    $sql = "SELECT * FROM phong p ";
    $sql .= " LEFT JOIN dat_phong  dp ON  p.id_phong = dp.id_p LEFT Join loai_phong  lp ON lp.id_loaiphong = p.id_lp Where 1";

    if($trang_thai == 'trong'){
        $sql .= " AND p.trang_thai = 0";
    } else if($trang_thai == 'danhan'){
        $sql .= " AND p.trang_thai = 1";
    
    }else if($trang_thai == 'qua'){
        $sql .= " AND p.trang_thai = 3";
    
    }else if($trang_thai == 'dadat'){
        $sql .= " AND p.trang_thai = 4";
    
    } else if($trang_thai == 'ban'){
        $sql .= " AND p.trang_thai = 6";
    
    } else if($trang_thai == 'dangsua'){
        $sql .= " AND p.trang_thai = 7";
    }
    
    return pdo_query($sql);
}
function trang_thai(){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentTime = new DateTime();
    $vietnamTime = $currentTime->format('Y-m-d H:i:s');
    $sql = "SELECT * FROM dat_phong dp LEFT JOIN phong p ON dp.id_p = p.id_phong  order by dp.id_don DESC";
    $listPhong = pdo_query($sql);
    foreach ($listPhong as $p) {
        extract($p);
        // print_r($p);
        if($ngay_checkin < $vietnamTime && $trang_thai == 0 && $trang_thai_don == 0){
            
            echo ("Phòng ...........".$ten_khachhang."quá hạn");
        } 
         if($ngay_checkout < $vietnamTime && $trang_thai == 1 && $trang_thai_don == 1){
            
            echo ("Phòng ...........".$ten_khachhang."quá hạn check out");
        }
    }
}

// function delete_soft_phong($id){
//     $sqlUpdate = "UPDATE phong SET trang_thai= 1  WHERE id_phong=".$id;
//                 pdo_execute($sqlUpdate);
// }






// function select_CungLoai($idPhong,$idLoaiPhong){
//     // không cách ở AND là oẳng
//     // $sql = "SELECT * FROM sanpham WHERE iddm = ".$iddm ."AND idsp <> ".$idsp ;   
//     $sql = "SELECT * FROM phong WHERE id_lp = ".$idLoaiPhong ." AND id_phong <> ".$idPhong ;   
//             $ds  = pdo_query($sql);
//             return $ds;
// }
// function select_theoLoaiPhong($id){
//     $sql = "SELECT * FROM loai_phong  WHERE id_loaiphong = ".$id  ;   
//             $ds  = pdo_query($sql);
//             return $ds;
// } 







?>