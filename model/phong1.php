<?php
function select_Allphong() {
    $sql = "SELECT * FROM phong AS p LEFT JOIN loai_phong AS l ON p.id_lp = l.id_loaiphong";
    return pdo_query($sql);
}
function select_Allphong_dango() {
    $sql = "SELECT * FROM phong Where trang_thai = 1";
    return pdo_query($sql);
}
function select_Allphong_trong($idLP) {
    $sql = "SELECT * FROM phong p JOIN loai_phong lp ON p.id_lp = lp.id_loaiphong Where p.trang_thai = 0 AND p.id_lp = ?";
    return pdo_query($sql, $idLP);
}

function select_Onephong($id) {
    $sql = "SELECT * FROM phong WHERE id_phong =?";
    $phong = pdo_query_one($sql, $id);
    return $phong;
}
function search_phong($tenPhong) {
    $sql = "SELECT * FROM `phong` AS p LEFT JOIN loai_phong AS l ON p.id_lp = l.id_loaiphong WHERE p.ten_phong LIKE '%".$tenPhong."%' ";
    return pdo_query($sql);

}
function insert_phong($ten_phong, $id_lp, $mota_phong) {
    $sql = "INSERT INTO `phong`(`ten_phong`, `id_lp`, `mota_phong`) VALUES ('$ten_phong', '$id_lp', '$mota_phong')";
    pdo_execute($sql);
}

function update_phong($id, $ten_phong, $id_lp, $mota_phong) {
    $sqlUpdate = "UPDATE `phong` SET `ten_phong`='$ten_phong', `id_lp`='$id_lp', `mota_phong`='$mota_phong' WHERE id_phong= ?";
    pdo_execute($sqlUpdate, $id);
}

function delete_phong($id) {
    $sql = "DELETE FROM `phong` WHERE id_phong = ?";
    pdo_execute($sql, $id);
}
function count_phong($trang_thai) {

    // $sql = "SELECT *  FROM phong  p ";
    // $sql .= " LEFT JOIN dat_phong  dp ON  p.id_phong = dp.id_p LEFT Join loai_phong  lp ON lp.id_loaiphong = p.id_lp Where 1";
    $sql = "SELECT *
    FROM phong p
    LEFT JOIN dat_phong dp ON p.id_phong = dp.id_p
     JOIN loai_phong lp ON lp.id_loaiphong = p.id_lp
    WHERE ( dp.id_don NOT IN (SELECT dp.id_don FROM dat_phong dp WHERE dp.trang_thai_don = 2)
       OR dp.trang_thai_don IS NULL) ";
    if($trang_thai == 'trong') {
        $sql .= " AND p.trang_thai = 0";
    } else if($trang_thai == 'danhan') {
        $sql .= " AND p.trang_thai = 1";

    } else if($trang_thai == 'quahan') {
        $sql .= " AND p.trang_thai = 2";

    } else if($trang_thai == 'dadat') {
        $sql .= " AND p.trang_thai = 3";

    } else if($trang_thai == 'khongden') {
        $sql .= " AND p.trang_thai = 4";

    } else if($trang_thai == 'ban') {
        $sql .= " AND p.trang_thai = 5";

    } else if($trang_thai == 'dangsua') {
        $sql .= " AND p.trang_thai = 6";
    }
    // $sql .= " GROUP BY  p.id_lp";
    return pdo_query($sql);
}

function count_phong1($trang_thai) {
    $sql = "SELECT *,COUNT(p.id_phong) AS so_phong FROM phong p where 1 ";
    if($trang_thai == 'trong') {
        $sql .= " AND p.trang_thai = 0";
    } else if($trang_thai == 'danhan') {
        $sql .= " AND p.trang_thai = 1";

    } else if($trang_thai == 'quahan') {
        $sql .= " AND p.trang_thai = 2";

    } else if($trang_thai == 'dadat') {
        $sql .= " AND p.trang_thai = 3";

    } else if($trang_thai == 'khongden') {
        $sql .= " AND p.trang_thai = 4";

    } else if($trang_thai == 'ban') {
        $sql .= " AND p.trang_thai = 5";

    } else if($trang_thai == 'dangsua') {
        $sql .= " AND p.trang_thai = 6";
    }
    return pdo_query($sql);

}
function update_phong_trangthai($idPhong, $trangthai) {
    $sql = "UPDATE phong SET trang_thai=? WHERE id_phong =? ";
    pdo_execute($sql, $trangthai, $idPhong);
}
function trangthai_auto() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentTime = new DateTime();
    $vietnamTime = $currentTime->format('Y-m-d H:i:s');
    $sql = "SELECT * FROM dat_phong dp LEFT JOIN phong p ON dp.id_p = p.id_phong  order by dp.id_don DESC";
    $listPhong = pdo_query($sql);
    foreach($listPhong as $p) {
        extract($p);
        // print_r($p);
        if($ngay_checkin < $vietnamTime && $trang_thai_don == 0) {

            // echo ("Phòng ...........".$id_don.$id_phong."quá hạn nhận phòng");
            if(isset($id_phong)) {
                $sqlU = "UPDATE phong SET trang_thai= 4 WHERE id_phong = $id_phong";
                pdo_execute($sqlU);
            }
        }
        if($ngay_checkout < $vietnamTime && $trang_thai == 1 && $trang_thai_don == 1) {

            // echo ("Phòng ".$id_phong."Đơn".$id_don."quá hạn check out");
            $sqlUpdate = "UPDATE phong SET trang_thai= 2 WHERE id_phong = $id_phong";
            pdo_execute($sqlUpdate);
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

function getAvailableRooms($checkinTime, $checkoutTime, $idLoaiPhong) {

    $sql = "SELECT * FROM dat_phong WHERE id_lp = ?";
    $activeRooms = pdo_query($sql, $idLoaiPhong);
    $count = 0;
    $lan = 0;



    foreach($activeRooms as $row) {
        $checkinTimeNumber = strtotime($row['ngay_checkin']);
        $checkoutTimeNumber = strtotime($row['ngay_checkout']);
        $checkinTimeNumberInput = strtotime($checkinTime);
        $checkoutTimeNumberInput = strtotime($checkoutTime);
        $lan++;



        // echo "lan ".$lan."</br>";
        // echo "checkin time database : ".$row['ngay_checkin']."</br>";
        // echo "checkin out database : ".$row['ngay_checkout']."</br>";
        // echo "checkin time input : ".$checkinTime."</br>";
        // echo "checkout time input : ".$checkoutTime."</br>";


        if(

            ($checkinTimeNumberInput > $checkinTimeNumber && $checkinTimeNumberInput < $checkoutTimeNumber) ||
            ($checkoutTimeNumberInput > $checkinTimeNumber && $checkoutTimeNumberInput < $checkoutTimeNumber) ||
            ($checkinTimeNumberInput < $checkinTimeNumber && $checkoutTimeNumberInput > $checkoutTimeNumber)

        ) {
            // echo "count tang"."</br>";
            $count++;
        }
    }

    $sql1 = "SELECT * FROM phong WHERE id_lp = ?";

    $roomByIdLoaiPhong = pdo_query($sql1, $idLoaiPhong);
    $tongSoPhong = count($roomByIdLoaiPhong);
    $soPhongConKhaDung = $tongSoPhong - $count;

    return $soPhongConKhaDung;




}
function getRooms($checkinTime, $checkoutTime, $idLoaiPhong) {
    $sql = "SELECT *,COUNT(id_p) FROM dat_phong WHERE id_lp = $idLoaiPhong AND  ngay_checkin <= $checkinTime AND $checkinTime <= ngay_checkout OR ngay_checkin <= $checkoutTime AND $checkoutTime <= ngay_checkout ";
    // $sql = "SELECT * FROM dat_phong
    // WHERE id_lp = 4
    // AND ngay_checkin <= '2023-12-09 03:11:00'
    // AND '2023-12-09 03:11:00' <= ngay_checkout
    // OR ngay_checkin <= '2023-12-23 03:11:00'
    // AND '2023-12-23 03:11:00' <= ngay_checkout; ";
    return pdo_query($sql);
}
