<?php

ob_start();
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location:http://localhost/A/DU_AN_1_NHOM_4/admin/dangnhap/dangnhap.php");

    exit;

} else {
    if($_SESSION['admin']['xac_thuc'] == 0) {
        header('refresh:1;url=http://localhost/A/DU_AN_1_NHOM_4/admin/dangnhap/doimatkhau.php');
        echo '<script>alert("Bạn mới đăng nhập lần đầu ! Hãy đổi mật khẩu !");</script>';

        exit;

    }
}
// print_r($_SESSION['admin']);
// print_r($_SESSION['admin']);
include_once "../model/pdo.php";
include_once "../global.php";
include_once "../model/loaiphong.php";
include_once "../model/phong.php";
include_once "../model/loaigiuong.php";
include_once "../model/tienich.php";
include_once "../model/dichvu.php";
include_once "../model/taikhoan.php";
include_once "../model/datphong.php";
include_once "../model/voucher.php";
include_once "../model/thongke.php";
// $checkName = "/^[0-99\p{L}\s]+$/u";
// $checkName = "/^([a-zA-Z ]+[0-9]*)+$/";
$checkName = "/^[a-zA-Z\sáàảãạắằẳẵặấầẩẫậéèẻẽẹếềểễệíìỉĩịóòỏõọốồổỗộớờởỡợúùủũụứừửữựýỳỷỹỵđÁÀẢÃẠẮẰẲẴẶẤẦẨẪẬÉÈẺẼẸẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌỐỒỔỖỘỚỜỞỠỢÚÙỦŨỤỨỪỬỮỰÝỲỶỸỴĐ ]+[0-9]*$/";
$checkTen = "/^[a-zA-Z\sáàảãạắằẳẵặấầẩẫậéèẻẽẹếềểễệíìỉĩịóòỏõọốồổỗộớờởỡợúùủũụứừửữựýỳỷỹỵđÁÀẢÃẠẮẰẲẴẶẤẦẨẪẬÉÈẺẼẸẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌỐỒỔỖỘỚỜỞỠỢÚÙỦŨỤỨỪỬỮỰÝỲỶỸỴĐ ]+$/";
$checkEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$checkSDT = "/^(0|\+84)\d{9}$/";
// $AllLoaiPhong = select_Allloaiphong();
// $listLoaiPhong = select_Allloaiphong("");
trangthai_auto();
$thoiGianHienTai = date('Y-m-d H:i:s');
$ngayHienTai = date('Y-m-d');

include "header.php";
$alltong = tongtien_All();


$tongtien_ngay = tongtien_ngay();
$tongtien_thang = tongtien_thang();
$tongdon_ngay = tongdon_ngay();
$tile_phongduocdat = tile_phongduocdat();

$tongtien_thang1 = tongtien_thang('1');
$tongtien_thang2 = tongtien_thang('2');
$tongtien_thang3 = tongtien_thang('3');
$tongtien_thang4 = tongtien_thang('4');
$tongtien_thang5 = tongtien_thang('5');
$tongtien_thang6 = tongtien_thang('6');
$tongtien_thang7 = tongtien_thang('7');
$tongtien_thang8 = tongtien_thang('8');
$tongtien_thang9 = tongtien_thang('9');
$tongtien_thang10 = tongtien_thang('10');
$tongtien_thang11 = tongtien_thang('11');
$tongtien_thang12 = tongtien_thang('12');

$sl_phongdon = bieudo_loaiphong('1');
$sl_phongdoi = bieudo_loaiphong('2');
$sl_canho = bieudo_loaiphong('3');
$sl_villa = bieudo_loaiphong('4');



if(isset($_GET['act']) && $_GET['act']) {
    switch($_GET['act']) {
        case 'logout':
            unset($_SESSION['admin']);
            header("Location:http://localhost/A/DU_AN_1_NHOM_4/admin/dangnhap/dangnhap.php");

            break;
        case 'search':
            if(isset($_POST['submit']) && $_POST['submit']) {
                if(isset($_GET['a']) && $_GET['a']) {
                    if($_GET['a'] == 'listlp') {
                        if(isset($_POST['submit']) && $_POST['submit']) {
                            $listLoaiPhong = select_Allloaiphong($_POST['keyw']);
                        }
                        include "loaiphong/list.php";

                    } else if($_GET['a'] == 'adddichvudatphong') {
                        if(isset($_POST['submit']) && $_POST['submit']) {


                            $idDon = $_POST['keyw'];
                        }
                        // header('location:index.php?act=adddichvudatphong&&a=adddichvudatphong');                        
                    } else if($_GET['a'] == 'listp') {
                        if(isset($_POST['submit']) && $_POST['submit']) {
                            $listP = search_phong($_POST['keyw']);
                            // print_r($listP);
                        }
                        include "phong/list.php";
                    }

                }


            }
            break;

        case 'sodophong':

            $listDichVu = select_Alldichvu();
            if(isset($_GET['trangthai']) && $_GET['trangthai']) {
                $trang_thai = $_GET['trangthai'];
                $listPhong = count_phong($trang_thai);

            } else {
                $listPhong = count_phong(' ');

            }
            // echo"<pre>";
            // print_r($listPhong);
            include_once "sodophong/sodophong.php";

            break;

        case 'quanlyloaiphong':
            $thoiGianHienTai = date('Y-m-d H:i:s');
            $listLoaiPhong = select_Allloaiphong('');
            $listDichVu = select_Alldichvu();

            if(isset($_GET['idlp']) && isset($_GET['idlp'])) {
                $idLP = $_GET['idlp'];
                $soPhongConKhaDung = getAvailableRooms($thoiGianHienTai, '', $idLP);
                print_r($soPhongConKhaDung);
            }
            // if(isset($_GET['submit']) && isset($_GET['submit'])){
            //     $hi = getRooms($thoiGianHienTai, $_POST['ngaycheckout'], $_POST['idloaiphong']);
            // print_r($hi);
            // }
            if(isset($_POST['submit']) && isset($_POST['submit'])) {
                $checkOut = $_POST['ngaycheckout'];
                $idLoaiPhong = $_POST['idloaiphong'];
                $ngayCheckOut = date('Y-m-d H:i:s', strtotime($_POST['ngaycheckout']));
                $soLuongPhongTrong = getAvailableRooms($thoiGianHienTai, $ngayCheckOut, $_POST['idloaiphong']);
                $loaiPhong = select_Oneloaiphong($_POST['idloaiphong']);
                $listPhong = select_Allphong_trong($_POST['idloaiphong']);
                $ngay = ceil((strtotime($_POST['ngaycheckout']) - strtotime($thoiGianHienTai)) / (24 * 60 * 60));
                $tongTien = $ngay * $loaiPhong['gia'];
            }
            if(isset($_POST['submitok']) && isset($_POST['submitok'])) {
                $checkOut = $_POST['ngaycheckout'];
                $idLoaiPhong = $_POST['idloaiphong'];
                $ngayCheckOut = date('Y-m-d H:i:s', strtotime($_POST['ngaycheckout']));
                $soLuongPhongTrong = getAvailableRooms($thoiGianHienTai, $ngayCheckOut, $_POST['idloaiphong']);
                $loaiPhong = select_Oneloaiphong($_POST['idloaiphong']);
                $listPhong = select_Allphong_trong($_POST['idloaiphong']);
                $ngay = ceil((strtotime($_POST['ngaycheckout']) - strtotime($thoiGianHienTai)) / (24 * 60 * 60));
                $tongTien = $ngay * $loaiPhong['gia'];
            }

            include_once "quanlyloaiphong/quanlyloaiphong.php";

            break;

        case 'datphong':
            if(isset($_POST['submit'])) {
                $idP = $_POST['idphong'];
                $idLP = $_POST['idloaiphong'];
                $diaChi = $_POST['diachi'];
                $tong = $_POST['tong'];
                $tenKH = $_POST['tenkhachhang'];
                $email = $_POST['email'];
                $soDT = $_POST['sodienthoai'];
                $ngayCheckOut = $_POST['ngaycheckout'];

                if(isset($_POST['dichvu']) && $_POST['dichvu']) {
                    // Lấy dữ liệu từ checkbox
                    $dichvu = $_POST['dichvu'];

                    // delete_dichvu_datphong($idDon);
                    // foreach ($dichvu as $dv) {
                    //     insert_dichvu_datphong($idDon,$dv);

                    // }

                    // $thongbao="Thêm thành công!"; 
                    // header('refresh:2;url=index.php?act=adddichvudatphong&a=adddichvudatphong&idphong='.$idPhong.'&iddon='.$idDon);

                }

                update_phong_trangthai($idP, 1);

                insert_datphong($idP, $idLP, $thoiGianHienTai, $ngayCheckOut, $thoiGianHienTai, $tenKH, $diaChi, $email, $soDT, $tong);
                // print_r($_POST);
                header("Location: index.php?act=listdatphong");


            }

            break;

        case 'checkin':
            if(isset($_POST['submit']) && $_POST['submit']){
                if(isset($_GET['iddon']) && $_GET['iddon']) {
                    if($_POST['tenphong']==''){
                        $error['tenphong']='Hãy chọn';
                        $list_DH = select_Alldatphong();
                        include_once "datphong/list.php";
                    } else {
                        // echo 'eheheh'.$_POST['tenphong'].'|';
                        // echo $_GET['iddon'];
                        update_phong_trangthai($_POST['tenphong'], 1);
                        update_datphong_trangthai($_GET['iddon'], $_POST['tenphong'], 1);
                            }

                
                }
            }

            if(isset($_GET['idphong']) && $_GET['idphong']) {
                update_phong_trangthai($_GET['idphong'], 1);
                $idPhongNew = $_GET['idphong'];
                update_datphong_trangthaidon($_GET['iddon'], $idPhongNew, 1, '');
                echo "alert('Đã Check In Thành Công')";
            }
            header("Location: index.php?act=sodophong");
            // include "./checkout.php";
            break;

        case 'checkout':
            if(isset($_GET['idphong']) && $_GET['idphong']) {
                update_phong_trangthai($_GET['idphong'], 5);
                $idPhongNew = $_GET['idphong'] + 1000;

                update_datphong_trangthaidon($_GET['iddon'], $idPhongNew, 2, $thoiGianHienTai);
            }
            // include "./checkout.php";
            header("Location: index.php?act=sodophong");
            break;
        case "phonghu":

            update_phong_trangthai($_GET['id'], 6);
            header("Location: index.php?act=sodophong");
            break;

        case 'huyphong':
            if(isset($_GET['idphong']) && $_GET['idphong']) {
                update_phong_trangthai($_GET['idphong'], 0);
                $idPhongNew = $_GET['idphong'] + 1000;

                update_datphong_trangthaidon($_GET['iddon'], $idPhongNew, 3, '');
                // echo "alert('Đã Check Out Thành Công')";
            }
            header("Location: index.php?act=sodophong");
            break;
        case 'dasach':
            if(isset($_GET['idphong']) && $_GET['idphong']) {
                update_phong_trangthai($_GET['idphong'], 0);

                echo "alert('Nhân viên đã dọn sạch sẽ')";
            }
            header("Location: index.php?act=sodophong");
            break;
        case 'dasua':
            if(isset($_GET['idphong']) && $_GET['idphong']) {
                update_phong_trangthai($_GET['idphong'], 0);

                echo "alert('Nhân viên đã sửa chữa hoàn thành')";
            }
            header("Location: index.php?act=sodophong");
            break;


        case 'addlp':
            $AllLoaiGiuong = select_Allloaigiuong();
            if(isset($_GET['tenphong']) && $_GET['tenphong']) {
                $TenLP = $_GET['tenphong'];
                $data = kiemtra_trungdata($TenLP);
                if($data != []) {
                    // print_r($data);
                    $error['tenloai'] = 'Tên loại phòng đã tồn tại';

                }
            }


            if(isset($_POST['submit']) && $_POST['submit']) {
                if(preg_match($checkName, $_POST['tenlp'])) {
                    $tenLp = $_POST['tenlp'];

                } else {
                    $thongbao = "Tên loại phòng sai định dạng ";
                }

                if(!empty($_FILES['img']['name'])) {
                    $img = '../image/'.$_FILES['img']['name'];
                    if(move_uploaded_file($_FILES['img']['tmp_name'], $img)) {
                        $imgTC = "Upload ảnh thành công";
                    } else {
                        $error['img'] = "Upload ảnh không thành công ! ";

                    }
                } else {
                    $error['img'] = "Hãy chọn ảnh cho phòng";
                }

                if(isset($_POST['gia']) && $_POST['gia']) {
                    if(is_int((int)$_POST['gia'])) {
                        $gia = $_POST['gia'];
                    } else {
                        $error['gia'] = "Giá phòng không hợp lệ!";
                    }
                } else {
                    $error['gia'] = "Không được bỏ trống !";
                }

                if(isset($_POST['mota']) && $_POST['mota']) {
                    $moTa = $_POST['mota'];

                } else {
                    $error['mota'] = "Không được bỏ trống !";
                }

                if(isset($_POST['soluongnguoi']) && $_POST['soluongnguoi']) {
                    if(is_int((int)$_POST['soluongnguoi']) && (int)$_POST['soluongnguoi'] < 10) {
                        $soLN = $_POST['soluongnguoi'];
                    } else {
                        $error['soluongnguoi'] = "Số lượng người  không hợp lệ!";
                    }
                } else {
                    $error['soluongnguoi'] = "Không được bỏ trống !";
                }

                if(isset($_POST['dientich']) && $_POST['dientich']) {
                    if(is_int((int)$_POST['dientich']) && (int)$_POST['dientich'] < 200) {
                        $dienTich = $_POST['dientich'];
                    } else {
                        $error['dientich'] = "Diện tích phòng không hợp lệ!";
                    }
                } else {
                    $error['dientich'] = "Không được bỏ trống !";
                }


                if(isset($_POST['idgiuong']) && $_POST['idgiuong']) {
                    $idGiuong = $_POST['idgiuong'];
                } else {
                    $error['loaigiuong'] = "Không được bỏ trống !";

                }


                if(empty($error)) {
                    // echo "haha";
                    // Cập nhật vào csdl
                    insert_loaiphong($tenLp, $img, $gia, $moTa, $soLN, $dienTich, $idGiuong);
                    $thongbaoTC = "Đã thêm phòng thành công !";
                    header('refresh:2;url=index.php?act=listlp');
                }
            }
            include "loaiphong/add.php";

            break;

        case 'listlp':
            $listLoaiPhong = select_Allloaiphong("");
            // echo "<pre>";
            // print_r($listDM);
            include "loaiphong/list.php";
            break;

        case 'deletelp':
            if(isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                delete_loaiphong($id);
                $thongbao = "Đã Xóa Thành Công !";
            }

            $listLoaiPhong = select_Allloaiphong("");
            include "loaiphong/list.php";
            break;

        case "addp":
            $AllLoaiPhong = select_Allloaiphong(" ");
            $error = [];
            if(isset($_GET['tenphong']) && $_GET['tenphong']) {
                $tenPhong = $_GET['tenphong'];
                $data = kiemtra_trungtenphong($tenPhong);

                if($data != []) {
                    // print_r($data);
                    $error['ten_phong'] = 'Tên phòng đã tồn tại';

                }
            }
            if(isset($_POST['submit']) && $_POST['submit']) {
                if(isset($_POST['ten_phong']) && $_POST['ten_phong']) {
                    if(preg_match($checkName, $_POST['ten_phong'])) {
                        $tenPhong = $_POST['ten_phong'];

                    } else {
                        $error['ten_phong'] = "Tên phòng không hợp lệ!";
                    }
                } else {
                    $error['ten_phong'] = "Không được bỏ trống !";
                }

                if(isset($_POST['mota_phong']) && $_POST['mota_phong']) {
                    $mota_phong = $_POST['mota_phong'];

                } else {
                    $error['mota_phong'] = "Không được bỏ trống !";
                }

                if(isset($_POST['id_lp']) && $_POST['id_lp']) {
                    $id_lp = $_POST['id_lp'];
                } else {
                    $error['loai_phong'] = "Không được bỏ trống !";

                }
                if(empty($error)) {
                    insert_phong($tenPhong, $id_lp, $mota_phong);
                    $thongbaoTC = "Đã thêm phòng thành công !";
                    header('refresh:2;url=index.php?act=listp');

                }
            }
            include_once "phong/add.php";
            break;

        case 'editlp':
            $AllLoaiGiuong = select_Allloaigiuong();
            if(isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                $dm = select_Oneloaiphong($id);
                // print_r($dm);
                extract($dm);
                if(isset($_POST['submit']) && $_POST['submit']) {
                    if(preg_match($checkName, $_POST['tenlp'])) {
                        $tenLp = $_POST['tenlp'];

                    } else {
                        $thongbao = "Tên danh mục sai định dạng";
                    }

                    if(!empty($_FILES['img']['name'])) {
                        $img = '../image/'.$_FILES['img']['name'];

                        if(move_uploaded_file($_FILES['img']['tmp_name'], $img)) {
                            $imgTC = "Upload ảnh thành công";

                        } else {
                            $error['img'] = "Upload ảnh không thành công ! ";

                        }
                    } else {
                        $img = $anh;
                    }

                    if(isset($_POST['gia']) && $_POST['gia']) {
                        if(is_int((int)$_POST['gia'])) {
                            $gia = $_POST['gia'];
                        } else {
                            $error['gia'] = "Giá phòng không hợp lệ!";
                        }
                    } else {
                        $error['gia'] = "Không được bỏ trống !";
                    }

                    if(isset($_POST['mota']) && $_POST['mota']) {
                        $moTa = $_POST['mota'];

                    } else {
                        $error['mota'] = "Không được bỏ trống !";
                    }

                    if(isset($_POST['soluongnguoi']) && $_POST['soluongnguoi']) {
                        if(is_int((int)$_POST['soluongnguoi']) && (int)$_POST['soluongnguoi'] < 10) {
                            $soLN = $_POST['soluongnguoi'];
                        } else {
                            $error['soluongnguoi'] = "Số lượng người  không hợp lệ!";
                        }
                    } else {
                        $error['soluongnguoi'] = "Không được bỏ trống !";
                    }

                    if(isset($_POST['dientich']) && $_POST['dientich']) {
                        if(is_int((int)$_POST['dientich']) && (int)$_POST['dientich'] < 200) {
                            $dienTich = $_POST['dientich'];
                        } else {
                            $error['dientich'] = "Diện tích phòng không hợp lệ!";
                        }
                    } else {
                        $error['dientich'] = "Không được bỏ trống !";
                    }


                    if(isset($_POST['idgiuong']) && $_POST['idgiuong']) {
                        $idGiuong = $_POST['idgiuong'];
                    } else {
                        $error['loaigiuong'] = "Không được bỏ trống !";

                    }


                    if(empty($error)) {
                        update_loaiphong1($id, $tenLp, $img, $gia, $moTa, $soLN, $dienTich, $idGiuong);

                        $thongbaoTC = " Đã Sửa Thành Công";
                        header('refresh:2;url=index.php?act=editlp&id='.$id_loaiphong);
                    }


                }
                include "loaiphong/edit.php";

            }

            break;

        case "listp":

            $listP = select_Allphong();

            include "phong/list.php";
            break;



        case 'editp':
            $AllLoaiPhong = select_Allloaiphong(" ");
            $error = [];

            if(isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                $phong = select_Onephong($id);
                extract($phong);
                if(isset($_POST['submit']) && $_POST['submit']) {
                    if(isset($_POST['ten_phong']) && $_POST['ten_phong']) {
                        if(preg_match($checkName, $_POST['ten_phong'])) {
                            $ten_phong = $_POST['ten_phong'];
                        } else {
                            $error['ten_phong'] = "Tên phòng không hợp lệ!";
                        }
                    } else {
                        $error['ten_phong'] = "Không được bỏ trống !";
                    }

                    if(isset($_POST['mota_phong']) && $_POST['mota_phong']) {
                        $mota_phong = $_POST['mota_phong'];

                    } else {
                        $error['mota_phong'] = "Không được bỏ trống !";
                    }

                    if(isset($_POST['id_lp']) && $_POST['id_lp']) {
                        $id_lp = $_POST['id_lp'];
                    } else {
                        $error['loai_phong'] = "Không được bỏ trống !";

                    }
                    if(empty($error)) {

                        // Cập nhật vào csdl
                        update_phong($id, $ten_phong, $id_lp, $mota_phong);
                        $thongbaoTC = "Đã sửa Phòng thành công !";
                        header('refresh:2;url=index.php?act=listp');

                    }

                }
            }
            include "phong/edit.php";

            break;

        case 'deletep':
            if(isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                delete_phong($id);
                $thongbao = "Đã Xóa Thành Công !";
            }

            $listP = select_Allphong();
            include "phong/list.php";
            break;

        case 'addtienichloaiphong':
            $listLoaiPhong = select_Allloaiphong(" ");

            $listTienich = select_Alltienich();

            if(isset($_GET['idloaiphong']) && $_GET['idloaiphong']) {
                $idLP = $_GET['idloaiphong'];
            }

            $listTI_LP = select_tienich_loaiphong(isset($_GET['idloaiphong']) ? $_GET['idloaiphong'] : '');
            if(isset($_POST['submit']) && $_POST['submit']) {
                if(!empty($_POST['idloaiphong']) && $_POST['idloaiphong']) {
                    if(isset($_GET['idloaiphong']) && $_GET['idloaiphong']) {
                        $idLP = $_GET['idloaiphong'];
                        if(isset($_POST['tienich']) && $_POST['tienich']) {
                            // Lấy dữ liệu từ checkbox
                            $tienIch = $_POST['tienich'];
                            delete_tienich_loaiphong($idLP);
                            foreach($tienIch as $ti) {
                                insert_tienich_loaiphong($idLP, $ti);


                            }
                            // echo '<script> alert("Đã thêm thành công !"); </script>';
                            $thongbao = "Thêm thành công!";

                            // header("Refresh: 2; url=index.php?act=addtienichphong&idphong=$idP");   
                        } else {
                            $error['tienich'] = "Không được bỏ trống!";


                        }

                    }
                }



            }

            include_once 'loaiphong/addtienichloaiphong.php';
            break;

        case "addti":
            if(isset($_POST['submit']) && $_POST['submit']) {
                if(!empty($_POST['ten_tienich'])) {
                    $ten_tienich = $_POST['ten_tienich'];
                    $mota_tienich = $_POST['mota_tienich'];
                    insert_tienich($ten_tienich, $mota_tienich);
                    $thongbaoTC = " Đã Thêm Thành Công";


                } else {
                    $thongbao = "Tên Tiện ích không được để trống";
                }
            }
            include "tienich/add.php";
            break;

        case "listti":
            $listTI = select_Alltienich();
            include_once 'tienich/list.php';
            break;

        case 'editti':
            if(isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                $ti = select_Onetienich($id);

                extract($ti);
                if(isset($_POST['submit']) && $_POST['submit']) {
                    if(!empty($_POST['ten_tienich'])) {
                        $ten_tienich = $_POST['ten_tienich'];
                        $mota_tienich = $_POST['mota_tienich'];
                        update_tienich($id, $ten_tienich, $mota_tienich);

                        $thongbaoTC = " Đã Sửa Thành Công";
                        header('refresh:2;url=index.php?act=editti&id='.$id_tienich);

                    } else {
                        $thongbao = " Tên Tiện ích không được bỏ trống";
                    }
                }
                include "tienich/edit.php";

            }

            break;

        case 'deleteti':
            if(isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                delete_tienich($id);
                $thongbao = "Đã Xóa Thành Công !";
            }

            $listTI = select_Alltienich();
            include "tienich/list.php";
            break;

        case "adddv":
            if(isset($_POST['submit']) && $_POST['submit']) {
                if(!empty($_POST['ten_dichvu']) && !empty($_POST['gia_dichvu'])) {
                    $ten_dichvu = $_POST['ten_dichvu'];
                    $gia_dichvu = $_POST['gia_dichvu'];
                    $mota_dv = $_POST['mota_dv'];
                    insert_dichvu($ten_dichvu, $gia_dichvu, $mota_dv);
                    $thongbaoTC = " Đã Thêm Thành Công";


                } else {
                    $thongbao = "Tên Dịch Vụ và Giá Dịch Vụ không được để trống";
                }
            }
            include "dichvu/add.php";
            break;

        case "listdv":
            $listDV = select_Alldichvu();
            include_once 'dichvu/list.php';
            break;

        case 'editdv':
            if(isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                $dv = select_Onedichvu($id);

                extract($dv);
                if(isset($_POST['submit']) && $_POST['submit']) {
                    if(!empty($_POST['ten_dichvu']) && !empty($_POST['gia_dichvu'])) {
                        $ten_dichvu = $_POST['ten_dichvu'];
                        $gia_dichvu = $_POST['gia_dichvu'];
                        $mota_dv = $_POST['mota_dv'];
                        update_dichvu($id, $ten_dichvu, $gia_dichvu, $mota_dv);

                        $thongbaoTC = " Đã Sửa Thành Công";
                        header('refresh:2;url=index.php?act=editdv&id='.$id_dichvu);

                    } else {
                        $thongbao = "Tên Dịch Vụ và Giá Dịch Vụ không được bỏ trống";
                    }
                }
                include "dichvu/edit.php";

            }

            break;

        case 'deletedv':
            if(isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                delete_dichvu($id);
                $thongbao = "Đã Xóa Thành Công !";
            }

            $listDV = select_Alldichvu();
            include "dichvu/list.php";
            break;



        case "addu":
            $error = [];
            if(isset($_POST['submit']) && $_POST['submit']) {
                if(empty($_POST['tennhanvien'])) {
                    $error['tennhanvien'] = "Không được bỏ trống !";
                } else {
                    if(!preg_match($checkTen, $_POST['tennhanvien'])) {
                        $error['tennhanvien'] = "Họ và tên không đúng định dạng !";
                    } else {
                        $tenNV = $_POST['tennhanvien'];
                    }
                }


                if(empty($_POST['ngaysinh'])) {
                    $error['ngaysinh'] = "Không được bỏ trống !";
                } else {
                    if($_POST['ngaysinh'] >= $ngayHienTai) {
                        $error['ngaysinh'] = "Ngày sinh phải nhỏ hơn ngày hôm nay !";
                    } else {
                        $ngaysinh = $_POST['ngaysinh'];
                    }
                }

                if(empty($_FILES['anh']['name'])) {
                    $error['anh'] = "Không được bỏ trống !";
                } else {
                    $img = '../image/'.$_FILES['anh']['name'];
                    move_uploaded_file($_FILES['anh']['tmp_name'], $img);
                }

                if(empty($_POST['email'])) {
                    $error['email'] = "Không được bỏ trống !";
                } else {
                    if(!preg_match($checkEmail, $_POST['email'])) {
                        $error['email'] = "Email không đúng định dạng !";
                    } else {
                        $email = $_POST['email'];
                    }
                }

                if(empty($_POST['sodienthoai'])) {
                    $error['sodienthoai'] = "Không được bỏ trống !";
                } else {
                    if(!preg_match($checkSDT, $_POST['sodienthoai'])) {
                        $error['sodienthoai'] = "Số Điện Thoại không đúng định dạng !";
                    } else {
                        $sodienthoai = $_POST['sodienthoai'];
                    }
                }

                if(empty($error)) {
                    insert_dangky($tenNV, $ngaysinh, $img, $email, $sodienthoai, '1234', 1, 0);
                    $thongbao = 'Đăng ký thành công !';
                    header('refresh:2;url=index.php?act=listu');

                }
            }

            include 'user/add.php';
            break;

        case "listu":
            if(isset($_SESSION['admin']) && $_SESSION['admin']['vai_tro'] == 0) {
                $listU = select_alluser();

            } else {
                header("Location: index.php");

            }
            // echo "<pre>";
            // print_r($listU);

            include_once "user/list.php";

            break;

        case "editu":
            if(isset($_GET['id']) && $_GET['id']) {
                $taiKhoan = select_oneuser($_GET['id']);
                // print_r($taiKhoan);
                extract($taiKhoan);

            }


            $error = [];
            if(isset($_POST['submit']) && $_POST['submit']) {
                if(empty($_POST['tennhanvien'])) {
                    $error['tennhanvien'] = "Không được bỏ trống !";
                } else {
                    if(!preg_match($checkTen, $_POST['tennhanvien'])) {
                        $error['tennhanvien'] = "Họ và tên không đúng định dạng !";
                    } else {
                        $ho_ten = $_POST['tennhanvien'];
                    }
                }


                if(empty($_POST['ngaysinh'])) {
                    $error['ngaysinh'] = "Không được bỏ trống !";
                } else {
                    if($_POST['ngaysinh'] >= $ngayHienTai) {
                        $error['ngaysinh'] = "Ngày sinh phải nhỏ hơn ngày hôm nay !";
                    } else {
                        $ngay_sinh = $_POST['ngaysinh'];
                    }
                }

                if(empty($_FILES['anh']['name'])) {
                    $img = $anh;
                } else {
                    $img = '../image/'.$_FILES['anh']['name'];
                    move_uploaded_file($_FILES['anh']['tmp_name'], $img);
                }

                if(empty($_POST['email'])) {
                    $error['email'] = "Không được bỏ trống !";
                } else {
                    if(!preg_match($checkEmail, $_POST['email'])) {
                        $error['email'] = "Email không đúng định dạng !";
                    } else {
                        $email = $_POST['email'];
                    }
                }

                if(empty($_POST['sodienthoai'])) {
                    $error['sodienthoai'] = "Không được bỏ trống !";
                } else {
                    if(!preg_match($checkSDT, $_POST['sodienthoai'])) {
                        $error['sodienthoai'] = "Số Điện Thoại không đúng định dạng !";
                    } else {
                        $sdt = $_POST['sodienthoai'];
                    }
                }

                if(empty($error)) {
                    $thongbao = 'Sửa thành công !';
                    update_taikhoan1($ho_ten, $ngay_sinh, $img, $email, $sdt, $_GET['id']);
                    header('refresh:2;url=index.php?act=listu');

                }
            }
            // if(isset($_SESSION['admin'])  && $_SESSION['admin']['vai_tro'] == 0){
            //     if(isset($_GET['id']) && $_GET['id']){
            //         $id = $_GET['id'];
            //         $User = select_oneuser($id);
            //         extract($User);
            //         $roLe = [
            //             'admin' => ['name'=>'Admin','value'=>0],
            //             'member' => ['name'=>'Member','value'=>1]
            //         ];
            //         if(isset($_POST['submit']) && $_POST['submit']){
            //         $vaiTro = $_POST['vaitro'];
            //         update_taikhoan($id,$vaiTro);
            //         $thongbaoTC = "Đã sửa thành công !";
            //         }

            //        }

            //     } else {
            //     header("Location: index.php");

            //     }


            include_once "user/edit1.php";


            break;

        case "deleteu":
            if(isset($_SESSION['admin']) && $_SESSION['admin']['vai_tro'] == 0) {
                if(isset($_GET['id']) && $_GET['id']) {
                    $id = $_GET['id'];
                    delete_user($id);

                    $thongbao = "Đã Xóa Thành Công !";
                    $listU = select_alluser();
                }

            } else {
                header("Location: index.php");

            }



            include_once "user/list.php";


            break;

        case 'addvoucher':
            $error = [];
            if(isset($_POST['submit']) && $_POST['submit']) {
                if(isset($_POST['ma_voucher']) && $_POST['ma_voucher']) {
                    if(preg_match($checkName, $_POST['ma_voucher'])) {
                        $ma_voucher = $_POST['ma_voucher'];
                    } else {
                        $error['ma_voucher'] = "Mã Voucher không hợp lệ!";
                    }
                } else {
                    $error['ma_voucher'] = "Không được bỏ trống !";
                }

                if(isset($_POST['ten_voucher']) && $_POST['ten_voucher']) {
                    if(preg_match($checkName, $_POST['ten_voucher'])) {
                        $ten_voucher = $_POST['ten_voucher'];
                    } else {
                        $error['ten_voucher'] = "Tên Voucher không hợp lệ!";
                    }
                } else {
                    $error['ten_voucher'] = "Không được bỏ trống !";
                }

                if(!empty($_FILES['anh_voucher']['name'])) {
                    $anh_voucher = '../image/'.$_FILES['anh_voucher']['name'];

                    if(move_uploaded_file($_FILES['anh_voucher']['tmp_name'], $anh_voucher)) {
                        $imgTC = "Upload ảnh thành công";

                    } else {
                        $error['anh_voucher'] = "Upload ảnh không thành công ";

                    }
                } else {
                    $error['anh_voucher'] = "Hãy chọn ảnh cho phòng";
                }

                if(!empty($_POST['ngay_batdau'])) {
                    $ngay_batdau = $_POST['ngay_batdau'];
                } else {

                    $error['ngay_batdau'] = "Không được bỏ trống !";
                }

                if(!empty($_POST['ngay_ketthuc'])) {
                    $ngay_ketthuc = $_POST['ngay_ketthuc'];
                } else {
                    $error['ngay_ketthuc'] = "Không được bỏ trống !";
                }

                if(isset($_POST['giam_gia']) && $_POST['giam_gia']) {
                    if(is_int((int)$_POST['giam_gia'])) {
                        $giam_gia = $_POST['giam_gia'];
                    } else {
                        $error['giam_gia'] = "Giá giảm không hợp lệ!";
                    }
                } else {
                    $error['giam_gia'] = "Không được bỏ trống !";
                }

                if(isset($_POST['mota_voucher']) && $_POST['mota_voucher']) {
                    $mota_voucher = $_POST['mota_voucher'];

                } else {
                    $error['mota_voucher'] = "Không được bỏ trống !";
                }

                if(isset($_POST['so_luong']) && $_POST['so_luong']) {
                    if(is_int((int)$_POST['so_luong']) && (int)$_POST['so_luong'] < 1000) {
                        $so_luong = $_POST['so_luong'];
                    } else {
                        $error['so_luong'] = "Số lượng không hợp lệ!";
                    }
                } else {
                    $error['so_luong'] = "Không được bỏ trống !";
                }


                if(empty($error)) {
                    insert_voucher($ma_voucher, $ten_voucher, $anh_voucher, $ngay_batdau, $ngay_ketthuc, $giam_gia, $mota_voucher, $so_luong);
                    $thongbaoTC = "Đã thêm Voucher thành công !";
                }
            }
            include_once "voucher/add.php";
            break;

        case "listvoucher":
            $listVouchers = select_Allvouchers();
            include_once 'voucher/list.php';
            break;

        case 'editvoucher':
            $error = [];

            if(isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                $voucher = select_Onevoucher($id);
                extract($voucher);
                if(isset($_POST['submit']) && $_POST['submit']) {

                    if(!empty($_POST['ma_voucher'])) {
                        $ma_voucher = $_POST['ma_voucher'];
                    } else {
                        $error['ma_voucher'] = "Không được bỏ trống !";
                    }

                    if(!empty($_POST['ten_voucher'])) {
                        $ten_voucher = $_POST['ten_voucher'];
                    } else {
                        $error['ten_voucher'] = "Không được bỏ trống !";
                    }


                    if(!empty($_FILES['anh_voucher']['name'])) {
                        $anh_voucher = '../image/'.$_FILES['anh_voucher']['name'];

                        if(move_uploaded_file($_FILES['anh_voucher']['tmp_name'], $anh_voucher)) {
                            $imgTC = "Upload ảnh thành công";

                        } else {
                            $error['anh_voucher'] = "Upload ảnh không thành công ";

                        }
                    } else {
                        $anh_voucher = $anh_voucher;
                    }

                    if(!empty($_POST['ngay_batdau'])) {
                        $ngay_batdau = $_POST['ngay_batdau'];
                    } else {
                        $error['ngay_batdau'] = "Không được bỏ trống!";
                    }

                    if(!empty($_POST['ngay_ketthuc'])) {
                        $ngay_ketthuc = $_POST['ngay_ketthuc'];
                    } else {
                        $error['ngay_ketthuc'] = "Không được bỏ trống!";
                    }

                    if(isset($_POST['giam_gia']) && $_POST['giam_gia']) {
                        if(is_int((int)$_POST['giam_gia'])) {
                            $giam_gia = $_POST['giam_gia'];
                        } else {
                            $error['giam_gia'] = "Giảm giá không hợp lệ!";
                        }
                    } else {
                        $error['giam_gia'] = "Không được bỏ trống !";
                    }

                    if(isset($_POST['mota_voucher']) && $_POST['mota_voucher']) {
                        $mota_voucher = $_POST['mota_voucher'];

                    } else {
                        $error['mota_voucher'] = "Không được bỏ trống !";
                    }

                    if(isset($_POST['so_luong']) && $_POST['so_luong']) {
                        if(is_int((int)$_POST['so_luong'])) {
                            $so_luong = $_POST['so_luong'];
                        } else {
                            $error['so_luong'] = "Số Lượng sản phẩm không hợp lệ!";
                        }
                    } else {
                        $error['so_luong'] = "Không được bỏ trống !";
                    }



                    if(empty($error)) {
                        update_voucher($id, $ma_voucher, $ten_voucher, $anh_voucher, $ngay_batdau, $ngay_ketthuc, $giam_gia, $mota_voucher, $so_luong);
                        $thongbaoTC = "Đã sửa Voucher thành công !";
                    }




                }
            }
            include_once "voucher/edit.php";
            break;

        case 'deletevoucher':
            if(isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                delete_voucher($id);
                $thongbao = "Đã Xóa Thành Công !";
            }

            $listVouchers = select_Allvouchers();
            include "voucher/list.php";
            break;


        case "listdatphong":
            $list_DH = select_Alldatphong();

            include_once "datphong/list.php";
            break;

        case 'adddichvudatphong':
            $listDon = select_Alldatphong();
            $listDichVu = select_Alldichvu();
            $listP = select_dathang_phong();
            $error = [];
            if(isset($_GET['idphong']) && $_GET['idphong']) {
                $idPhong = $_GET['idphong'];
                $idDon = $_GET['iddon'];
                $dv_DH = select_dichvu_datphong($idPhong);
                // print_r($dv_DH);
                if($dv_DH != []) {
                    $tongTien = $dv_DH['0']['tong_tien'];
                    foreach($dv_DH as $dh) {
                        $tongTien += $dh['gia_dichvu'];
                        //     echo "<pre>";
                        // print_r($dh);
                    }
                }
            }



            // $listDV_P = select_dichvu_phong(isset($_GET['idphong'])? $_GET['idphong'] : '');
            if(isset($_POST['submit']) && $_POST['submit']) {
                if(!empty($_POST['idphong']) && $_POST['idphong']) {
                    // $idPhong = $_POST['idphong'];

                } else {
                    $error['idphong'] = "Không được bỏ trống!";
                }
                if(isset($_GET['idphong']) && $_GET['idphong']) {
                    if(isset($_POST['dichvu']) && $_POST['dichvu']) {
                        // Lấy dữ liệu từ checkbox
                        $dichvu = $_POST['dichvu'];
                        delete_dichvu_datphong($idDon);
                        foreach($dichvu as $dv) {
                            insert_dichvu_datphong($idDon, $dv);

                        }
                        update_datphong_tongtien($idDon, $tongTien);

                        $thongbao = "Thêm thành công!";
                        header('refresh:2;url=index.php?act=adddichvudatphong&a=adddichvudatphong&idphong='.$idPhong.'&iddon='.$idDon);


                    } else {
                        $error['dichvu'] = "Không có lựa chọn nào được chọn.";
                    }


                }

            }

            include_once 'datphong/adddichvudatphong.php';
            break;


        default:
            include "home.php";
            break;


    }
} else {
    include "home.php";


}




include "footer.php";



ob_flush();

?>