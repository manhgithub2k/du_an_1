<?php ob_start();
session_start();
?>

<?php include "../model/pdo.php" ?>
<?php include "../model/dichvu.php" ?>
<?php include "../model/loaiphong.php" ?>
<?php include "../model/phong.php" ?>
<?php include "../model/taikhoan.php" ?>

<?php include "../model/tienich.php" ?>
<?php include "../model/img_slide.php" ?>
<?php include "../model/datphong.php" ?>
<?php include "../model/loaigiuong.php" ?>
<?php include "../model/voucher.php" ?>
<?php include "../model/momo.php" ?>
<?php include "../model/vnpay.php" ?>
<?php include "../model/review.php" ?>










<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Sona Template" />
  <meta name="keywords" content="Sona, unica, creative, html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="../assets/js/qrcode.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <title>Sona | Template</title>

  <!-- Google Font -->
  <?php include "../assets/user/components/css.php" ?>
</head>
<style>
  .receipt {
    display: none;
  }

  @media print {
    .receipt {
      display: block;
    }

    .header-section {
      display: none;
    }

    .message-thank {
      display: none;
    }

    .text-thank {
      display: none;
    }

    .nhan-hoa-don {
      display: none;
    }

    .in-hoa-don {
      display: none;
    }

    .footer-section {
      display: none;
    }


  }
</style>

<body>

  <!-- Offcanvas Menu Section End -->
  <?php
  // include "../assets/user/components/preload.php";
  include "../assets/user/components/header.php";
  ?>
  <?php
  $top4 = select_Top_4_Loai_Phong();
  $tatCaLoaiPhong = select_All_Loai_Phong();
  $tien_ich = select_Alltienich();
  function convertNumberToWords($number) {
    $ones = array(
      0 => 'không',
      1 => 'một',
      2 => 'hai',
      3 => 'ba',
      4 => 'bốn',
      5 => 'năm',
      6 => 'sáu',
      7 => 'bảy',
      8 => 'tám',
      9 => 'chín',
      10 => 'mười',
      11 => 'mười một',
      12 => 'mười hai',
      13 => 'mười ba',
      14 => 'mười bốn',
      15 => 'mười năm',
      16 => 'mười sáu',
      17 => 'mười bảy',
      18 => 'mười tám',
      19 => 'mười chín'
    );

    $tens = array(
      2 => 'hai mươi',
      3 => 'ba mươi',
      4 => 'bốn mươi',
      5 => 'năm mươi',
      6 => 'sáu mươi',
      7 => 'bảy mươi',
      8 => 'tám mươi',
      9 => 'chín mươi'
    );

    $words = array();

    if($number < 20) {
      $words[] = $ones[$number];
    } elseif($number < 100) {
      $words[] = $tens[floor($number / 10)];
      $remainder = $number % 10;

      if($remainder) {
        $words[] = $ones[$remainder];
      }
    } elseif($number < 1000) {
      $words[] = $ones[floor($number / 100)].' trăm';
      $remainder = $number % 100;

      if($remainder) {
        $words[] = convertNumberToWords($remainder);
      }
    } elseif($number < 1000000) {
      $words[] = convertNumberToWords(floor($number / 1000)).' nghìn';
      $remainder = $number % 1000;

      if($remainder) {
        $words[] = convertNumberToWords($remainder);
      }
    } else {
      $words[] = convertNumberToWords(floor($number / 1000000)).' triệu';
      $remainder = $number % 1000000;

      if($remainder) {
        $words[] = convertNumberToWords($remainder);
      }
    }

    return implode(' ', $words);
  }

  if(isset($_GET["act"]) && $_GET["act"] != "") {
    $act = $_GET["act"];

    switch($act) {
      case "home":

        include "../assets/user/components/slider.php";
        include "./trangchu/trangchu.php";
        break;
      case 'rooms':
        // $allRooms = allRooms();
        include "./phong/phong.php";
        break;
      case 'checkout':
        $checkin = $_SESSION['searchInfo']['checkin'];
        $checkout = $_SESSION['searchInfo']['checkout'];
        $idLoaiPhong = $_SESSION['searchInfo']['idLoaiPhong'];
        // print_r($_SESSION['searchInfo']);
        $allVouchers = getAllVouchers();
        $voucherCodes = [];
        foreach($allVouchers as $item) {
          $voucherCodes[] = ["id" => $item['id_voucher'], "maVoucher" => $item['ma_voucher'], "giamGia" => $item['giam_gia']];
        }
        ;

        $jsonVoucherCode = json_encode($voucherCodes);




        $loaiPhong = getLoaiPhongById($idLoaiPhong);

        $jsonAllLoaiPhong = json_encode($tatCaLoaiPhong);


        $timestamp = strtotime($checkout) - strtotime($checkin);

        $orderDays = ceil($timestamp / 60 / 60 / 24);


        $_SESSION['orderInfo']['loai_phong'] = $loaiPhong;
        $_SESSION['orderInfo']['orderDays'] = $orderDays;

        // $allRooms = allRooms();
  

        include "./checkout/checkout.php";
        break;

      case "online-checkout":
        function execPostRequest($url, $data) {
          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
              'Content-Type: application/json',
              'Content-Length: '.strlen($data)
            )
          );
          curl_setopt($ch, CURLOPT_TIMEOUT, 5);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
          //execute post
          $result = curl_exec($ch);
          //close connection
          curl_close($ch);
          return $result;
        }
        if(isset($_POST["payUrl"])) {
          $_SESSION['checkoutInfo'] = $_POST;

          $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


          $partnerCode = 'MOMOBKUN20180529';
          $accessKey = 'klm05TvNBzhg7h7j';
          $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
          $orderInfo = "Thanh toán qua MoMo";
          $amount = $_POST['tong_tien'];
          $orderId = time()."";
          $redirectUrl = "http://localhost/a/DU_AN_1_NHOM_4/view/?act=thankyou";
          $ipnUrl = "http://localhost/duanmot/view/?act=thankyou";
          $extraData = "";




          $serectkey = $secretKey;


          $requestId = time()."";
          $requestType = "payWithATM";
          // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
          //before sign HMAC SHA256 signature
          $rawHash = "accessKey=".$accessKey."&amount=".$amount."&extraData=".$extraData."&ipnUrl=".$ipnUrl.
            "&orderId=".$orderId."&orderInfo=".$orderInfo."&partnerCode=".$partnerCode."&redirectUrl=".$redirectUrl
            ."&requestId=".$requestId."&requestType=".$requestType;
          $signature = hash_hmac("sha256", $rawHash, $serectkey);
          $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
          );
          $result = execPostRequest($endpoint, json_encode($data));
          $jsonResult = json_decode($result, true); // decode json
  
          //Just a example, please check more in there
  
          header('Location: '.$jsonResult['payUrl']);

          // header("localtion: ?act=home");
        } elseif(isset($_POST['redirect'])) {
          $_SESSION['checkoutInfo'] = $_POST;
          error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
          date_default_timezone_set('Asia/Ho_Chi_Minh');

          $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
          $vnp_Returnurl = "http://localhost/a/DU_AN_1_NHOM_4/view/?act=thankyou";
          $vnp_TmnCode = "P6DTVGDE"; //Mã website tại VNPAY
          $vnp_HashSecret = "YZFBLUDVITONHJBUZJEQFNDBNJENCYFQ"; //Chuỗi bí mật
  
          $vnp_TxnRef = time().""; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
          $vnp_OrderInfo = "noi dung thanh toan";
          $vnp_OrderType = "billpayment";
          $vnp_Amount = $_POST['tong_tien'] * 100;
          $vnp_Locale = "vn";
          // $vnp_BankCode = "NCB";
          $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
          //Add Params of 2.0.1 Version
          // $vnp_ExpireDate = $_POST['txtexpire'];
          //Billing
          // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
          // $vnp_Bill_Email = $_POST['txt_billing_email'];
          // $fullName = trim($_POST['txt_billing_fullname']);
          // if (isset($fullName) && trim($fullName) != '') {
          // $name = explode(' ', $fullName);
          // $vnp_Bill_FirstName = array_shift($name);
          // $vnp_Bill_LastName = array_pop($name);
          // }
          // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
          // $vnp_Bill_City = $_POST['txt_bill_city'];
          // $vnp_Bill_Country = $_POST['txt_bill_country'];
          // $vnp_Bill_State = $_POST['txt_bill_state'];
          // // Invoice
          // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
          // $vnp_Inv_Email = $_POST['txt_inv_email'];
          // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
          // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
          // $vnp_Inv_Company = $_POST['txt_inv_company'];
          // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
          // $vnp_Inv_Type = $_POST['cbo_inv_type'];
          $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

            // "vnp_ExpireDate" => $vnp_ExpireDate,
            // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            // "vnp_Bill_Email" => $vnp_Bill_Email,
            // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            // "vnp_Bill_LastName" => $vnp_Bill_LastName,
            // "vnp_Bill_Address" => $vnp_Bill_Address,
            // "vnp_Bill_City" => $vnp_Bill_City,
            // "vnp_Bill_Country" => $vnp_Bill_Country,
            // "vnp_Inv_Phone" => $vnp_Inv_Phone,
            // "vnp_Inv_Email" => $vnp_Inv_Email,
            // "vnp_Inv_Customer" => $vnp_Inv_Customer,
            // "vnp_Inv_Address" => $vnp_Inv_Address,
            // "vnp_Inv_Company" => $vnp_Inv_Company,
            // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            // "vnp_Inv_Type" => $vnp_Inv_Type
          );

          if(isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
          }
          // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
          // $inputData['vnp_Bill_State'] = $vnp_Bill_State;
          // }
  
          //var_dump($inputData);
          ksort($inputData);
          $query = "";
          $i = 0;
          $hashdata = "";
          foreach($inputData as $key => $value) {
            if($i == 1) {
              $hashdata .= '&'.urlencode($key)."=".urlencode($value);
            } else {
              $hashdata .= urlencode($key)."=".urlencode($value);
              $i = 1;
            }
            $query .= urlencode($key)."=".urlencode($value).'&';
          }

          $vnp_Url = $vnp_Url."?".$query;
          if(isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash='.$vnpSecureHash;
          }
          $returnData = array(
            'code' => '00'
            ,
            'message' => 'success'
            ,
            'data' => $vnp_Url
          );
          if(isset($_POST['redirect'])) {
            header('Location: '.$vnp_Url);
            die();
          } else {
            echo json_encode($returnData);
          }
        } elseif(isset($_POST["direct"])) {
          $_SESSION['checkoutInfo'] = $_POST;
          header('Location: ?act=thankyou');
        }
        include "./online-checkout/onlinecheckout.php";
        break;
      case 'checkdate':
        // $allRooms = allRooms();
        $idLoaiPhong = $_POST['idLoaiPhong'];
        $loaiGiuong = getLoaiGiuongById($idLoaiPhong);

        $loaiPhong = getLoaiPhongById($idLoaiPhong);



        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];

        $_SESSION['searchInfo'] = $_POST;


        $availableRooms = getAvailableRooms($_POST['checkin'], $_POST['checkout'], $idLoaiPhong);
        // echo $availableRooms;
        // print_r($_POST);
  


        if(isset($_POST['check'])) {
          $idLoaiPhong = $_POST['idLoaiPhong'];
          $loaiGiuong = getLoaiGiuongById($idLoaiPhong);

          $loaiPhong = getLoaiPhongById($idLoaiPhong);
          $checkin = date("Y-m-d h:m:s", strtotime($_POST['checkin']));
          $checkout = date("Y-m-d h:m:s", strtotime($_POST['checkout']));
          $availableRooms = getAvailableRooms($checkin, $checkout, $idLoaiPhong);
          $_SESSION['searchInfo'] = $_POST;

        }

        // print_r($availableRooms);
        include "./checkdate/checkdate.php";
        break;
      case 'room-detail':
        $idLoaiPhong = $_GET['id'];
        $errMessage = "";
        $allReviews = getAllReviewsByIdLoaiPhong($idLoaiPhong);
        $totalStars = 0;
        $averageStars = 0;
        $count = 0;
        foreach($allReviews as $item) {
          $totalStars += $item['star'];
          $count += 1;
        }
        if($count == 0) {
          $count = 1;
        }
        $averageStars = number_format($totalStars / $count, 1);
        $roundStars = round($averageStars);

        // $currentRoom = select_Onephong($roomId);
        $loaiPhong = getLoaiPhongById($idLoaiPhong);
        $id_loai_giuong = $loaiPhong['id_lg'];
        $loaiGiuong = getLoaiGiuongById($id_loai_giuong);
        $slideImgs = getImgSlideByRoomId($idLoaiPhong);

        if(isset($_POST['addReview'])) {
          $isOrdered = true;
          $tatCaDatPhong = getAllDatPhong();
          $allUniqueId = [];
          foreach($tatCaDatPhong as $item) {
            $allUniqueId[] = $item['uniqueId'];
          }
          foreach($allUniqueId as $item) {
            if(isset($_COOKIE[$item])) {
              if(json_decode($_COOKIE[$item], true)['id_lp'] == $idLoaiPhong) {
                addOneReview($_POST);
                header('Refresh:0');
                $isOrdered = true;
                return;

              } else {
                $isOrdered = false;
              }

            } else {
              $isOrdered = false;
            }
          }
          if(!$isOrdered) {
            $errMessage = "Ban can trai nghiem phong de thuc hien chuc nang nay";
          } else {
            $errMessage = "";
          }


        }

        // $allRooms = allRooms();
        include "./chitietphong/chitietphong.php";
        break;

      case "thankyou":
        include "./sendmail/sendmail.php";
        $uniqueId = uniqid();
        if(isset($_GET['resultCode']) && $_GET['resultCode'] == 0 && !isset($_POST['imgData'])) {


          themMotDatPhong($_SESSION['checkoutInfo'], $uniqueId);
          addMomoTransaction($_GET, $uniqueId);
          $transaction = getOneDatPhongByUniqueId($uniqueId);
          setcookie($uniqueId, json_encode($transaction));

        } elseif(isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == "00" && !isset($_POST['imgData'])) {
          themMotDatPhong($_SESSION['checkoutInfo'], $uniqueId);
          addVnpayTransaction($_GET, $uniqueId);
          $transaction = getOneDatPhongByUniqueId($uniqueId);
          setcookie($uniqueId, json_encode($transaction));

        } elseif(isset($_SESSION["checkoutInfo"]['direct']) && !isset($_POST['imgData'])) {
          themMotDatPhong($_SESSION['checkoutInfo'], $uniqueId);
        } elseif(isset($_POST['imgData'])) {

          $imageData = $_POST['imgData'];
          $filePath = "";



          // Chuyển đổi dữ liệu ảnh từ base64 thành định dạng hình ảnh
          $imageData = str_replace('data:image/png;base64,', '', $imageData);
          $imageData = str_replace(' ', '+', $imageData);
          $imageData = base64_decode($imageData);

          // Thư mục đích để lưu ảnh
          $outputDirectory = '../assets/image/';

          // Tạo tên tệp duy nhất cho ảnh
          $filename = uniqid().'.png';

          // Đường dẫn đầy đủ đến tệp ảnh
          $filePath = $outputDirectory.'/'.$filename;

          // Lưu ảnh vào thư mục chỉ định
          file_put_contents($filePath, $imageData);

          sendMail($_SESSION['checkoutInfo']['email'], "asdasd", $uniqueId, $filePath);



        } else {
          include "./thankyou/error.php";
        }


        $message = "";
        include "./thankyou/thankyou.php";

        break;



      case "tracuu":
        $voucherDiscount = "";
        $message = "Nhập mã đơn hàng để tra cứu";
        if(isset($_POST['check'])) {
          $order = getOneDatPhongByUniqueId($_POST['uniqueId']);


          if(empty($order)) {
            $message = "Mã đơn hàng không tồn tại.Vui lòng kiểm tra lại";
          } else {
            $idPhong = $order['id_lp'];
            $idVoucher = $order['id_voucher'];
            $currentLoaiPhong = getLoaiPhongById($idPhong);
            $currentVoucher = getVoucherById($idVoucher);
            if(!empty($currentVoucher)) {
              $voucherDiscount = $currentVoucher['giam_gia'];
            } else {
              $voucherDiscount = "";
            }



            $checkin = $order['ngay_checkin'];
            $checkout = $order['ngay_checkout'];



            $timestamp = strtotime($checkout) - strtotime($checkin);

            $orderDays = ceil($timestamp / 60 / 60 / 24);
            $message = "Thông tin đơn hàng";
          }

        }
        include "./tracuu/tracuu.php";

        break;


      case "contact":
        $message = "";
        include "./sendmail/sendmail.php";
        ;
        if(isset($_POST['contact'])) {
          contactMail($_POST);
          $message = "Cảm ơn bạn đã phản hồi cho chúng tôi !";
        }
        include "./contact/contact.php";

        break;
      case "aboutus":

        include "./aboutus/aboutus.php";

        break;




      default:
        include "../assets/user/components/slider.php";
        include "./trangchu/trangchu.php";
    }
  } else {
    include "../assets/user/components/slider.php";
    include "./trangchu/trangchu.php";
  }
  ?>
</body>


<!-- 
footer -->

<?php include "../assets/user/components/footer.php" ?>
<?php include "../assets/user/components/searchModel.php" ?>

<!-- script -->
<?php include "../assets/user/components/script.php" ?>
<script>
  const checkVerify = (errArr) => {
    let isVerify = true
    for (let key in errArr) {
      (document.querySelector(`.${key}`).parentElement.querySelector('.error')).innerText = errArr[key]
      if (errArr[key] != "") {
        isVerify = false

      }
    }
    return isVerify

  }
  const checkCheckinTime = (checkinName) => {
    const checkinEle = document.querySelector(`.${checkinName}`)
    const time = new Date(checkinEle.value)
    const currentTime = new Date()
    // const timeNumber = time.getTime()
    const checkinTimeNumber = time.getTime()
    const currentTimeNumber = currentTime.getTime()
    console.log(checkinTimeNumber, currentTimeNumber)
    if (checkinTimeNumber < currentTimeNumber) {
      errArr[checkinName] = "Thời gian check in không thể nhỏ hơn thời gian hiện tại"
      console.log(errArr[checkinName])
    }
  }

  const checkCheckoutTime = (checkinName, checkoutName) => {
    const checkinEle = document.querySelector(`.${checkinName}`)
    const checkoutEle = document.querySelector(`.${checkoutName}`)
    console.log(checkinEle.value)
    const checkinTime = new Date(checkinEle.value.trim() !== "" ? checkinEle.value : "")
    const checkoutTime = new Date(checkoutEle.value)
    const checkinTimeNumber = checkinTime.getTime()
    const checkoutTimeNumber = checkoutTime.getTime()



    if (checkinTimeNumber > checkoutTimeNumber) {
      errArr[checkoutName] = "Thời gian check out không thể nhỏ hơn thời gian checkin"

    }


  }
  const checkErr = (elementName, regex, message, errArr) => {
    let isVerify = true
    let errMessage = ""
    const element = document.querySelector(`.${elementName}`)
    if (element.value.trim() == "") {
      errMessage = "Trường này không được bỏ trống"
      errArr[elementName] = errMessage


    } else if (!regex.test(element.value.trim())) {
      errMessage = message
      errArr[elementName] = message

    } else {
      errArr[elementName] = ""
    }
  }

</script>

</html>

<?php ob_end_flush(); ?>