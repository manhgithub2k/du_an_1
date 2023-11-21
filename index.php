<?php
session_start();
include_once "model/pdo.php";


include_once "view/header.php";
if(isset($_GET['act']) && $_GET['act']){
    $act = $_GET['act'];
    switch ($act) {
        case 'datphong':
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $daTe = date('Y-m-d H:i:s');
            if(isset($_POST['submit']) && $_POST['submit']){

                $checkin_date = $_POST['checkin_date'];
                if($checkin_date < $daTe){
                    echo "<script>alert('Ngày đến phải lớn hơn ngày hiện tại')</script>";
                }
            }
            include_once "view/datphong.php";
            break;
        
        default:
        include_once "view/home.php";
            break;
    }
} else {
    include_once "view/home.php";
}
include_once "view/footer.php";
?>
    
