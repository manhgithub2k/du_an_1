<p class="text text-success fs-3 fw-bold my-5 mx-5">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi</p>
<p class="text text-success fs-3 fw-bold my-5 mx-5 message">
    <?php echo $message ?>
</p>
<button id="generate-pdf-btn" type="submit" class="btn btn-primary my-5 mx-5">Nhận hóa đơn qua email</button>

<?php

$voucher = getVoucherById($_SESSION["checkoutInfo"]['id_voucher']);
?>

<div class="receipt my-3 mx-3" style="width:1080px;height:1527px;">
    <div class="d-flex justify-content-between align-items-center my-3 border-bottom border-2 w-100">
        <div class=" mx-0 d-flex justify-content-between w-100">
            <div class="">
                <img src="../assets/image/logp.jpg" alt="">
            </div>
            <div class=" d-flex flex-column align-items-center  ">
                <h4>Hóa đơn giá trị gia tăng</h4>
                <p>Bản thể hiện của hóa đơn điện tử</p>
                <p>
                    <?php $today = date('d-m-Y');
                    echo $today; ?>
                </p>
            </div>
            <div class="">
                <p>Mẫu số: 01/GTKT0/01</p>
                <p>Ký hiệu: MS/18E</p>
                <p>Số</p>
            </div>
        </div>

    </div>
    <div class="border-bottom border-2 my-3">
        <h4>Công ty cổ phần Poly Hotel</h4>
        <div class="d-flex justify-content-between">
            <div class="information">
                <p>Mã số thuế : xxxxxxx</p>
                <p>Địa chỉ: 10 - Trịnh Văn Bô - Nam Từ Liêm - Hà Nội</p>
                <p>Điện thoại: 09xxxxxx</p>
                <p>Số tài khoản:xxxxx</p>

            </div>
            <div id="qrcode"></div>
        </div>
    </div>

    <p>Họ tên người mua hàng:
        <?php echo $_SESSION["checkoutInfo"]["ten_khachhang"] ?>
    </p>
    <p>Địa chỉ:
        <?php echo $_SESSION["checkoutInfo"]["dia_chi"] ?>
    </p>
    <p>Số điện thoại:
        <?php echo $_SESSION["checkoutInfo"]["sdt"] ?>
    </p>
    <p>Email:
        <?php echo $_SESSION["checkoutInfo"]["email"] ?>
    </p>
    <p>Hình thức thanh toán :
        <?php echo $_SESSION["checkoutInfo"]["payment_method"] ?>
    </p>
    <p>Ngày đến:
        <?php echo $_SESSION["checkoutInfo"]["ngay_checkin"] ?>
    </p>
    <p>Ngày đi:
        <?php echo $_SESSION["checkoutInfo"]["ngay_checkout"] ?>
    </p>

    <div class="table-responsive">
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên hàng hóa, dịch vụ</th>
                    <th scope="col">Đơn vị tính</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td>1</td>
                    <td>
                        <?php echo $_SESSION['orderInfo']["loai_phong"]['ten_loai'] ?>
                    </td>
                    <td>Ngày</td>
                    <td>
                        <?php echo $_SESSION['orderInfo']["orderDays"] ?>
                    </td>
                    <td>
                        <?php echo $_SESSION['orderInfo']["loai_phong"]['gia'] ?>
                    </td>
                    <td>
                        <?php echo $_SESSION['orderInfo']["orderDays"] * $_SESSION['orderInfo']["loai_phong"]['gia'] ?>
                    </td>
                </tr>
                <tr class="">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="">
                    <td colspan="6">Voucher:
                        <?php echo !empty($voucher) ? $voucher['giam_gia'] . "%" : "" ?>
                    </td>
                </tr>
                <tr class="">
                    <td colspan="6">Cộng tiền hàng:</td>
                </tr>
                <tr class="">
                    <td colspan="6">Tiền phục vụ:</td>
                </tr>
                <tr class="">
                    <td colspan="6">Thuế suất GTGT:</td>
                </tr>
                <tr class="">
                    <td colspan="6">Tiền thuế GTGT:</td>
                </tr>
                <tr class="">
                    <td colspan="6">Tổng tiền thanh toán:
                        <?php echo convertNumberToWords($_SESSION["checkoutInfo"]["tong_tien"]) ?>
                    </td>
                </tr>
                <tr class="">
                    <td colspan="6">Số tiền viết bằng chữ:
                        <?php echo $_SESSION["checkoutInfo"]["tong_tien"] ?>
                    </td>
                </tr>
            </tbody>
        </table>


        <p>Tra cứu tại website : http://localhost/duanmau/view/tracuu <span class="ml-3">Mã tra cứu:
                <?php echo $uniqueId ?>
            </span></p>

    </div>



</div>

<form method="POST" id="myForm">
    <input type="text" hidden class="imgData" name="imgData">

</form>

<script>
    window.jsPDF = window.jspdf.jsPDF;


    document.getElementById('generate-pdf-btn').addEventListener('click', function () {
        const imgInputEle = document.querySelector('.imgData');
        const myForm = document.querySelector('#myForm');
        const receiptEle = document.querySelector('.receipt')
        const messageEle = document.querySelector('.message');

        receiptEle.style.display = "block";
        receiptEle.style.visibility = "visible";
        messageEle.innerText = "Dang xu ly vui long cho"

        // Sử dụng html2canvas để chụp nội dung HTML
        html2canvas(receiptEle)
            .then(function (canvas) {
                // Chuyển đổi canvas thành hình ảnh
                let imgData = canvas.toDataURL('image/png');
                imgInputEle.value = imgData
                receiptEle.style.visibility = "hidden";
            }).then(function () {
                myForm.submit()
            });
    });



    const qrcode = new QRCode(document.getElementById("qrcode"), {
        width: 100,
        height: 100
    });

    const paymentData = " http://localhost/duanmau/view/";
    qrcode.makeCode(paymentData);
</script>