<form class="row mx-5" method="post" action="?act=online-checkout" onsubmit="handleSubmit()">
    <div class="col-4">
        <div class="d-none d-sm-none d-md-none d-lg-block my-3 px-3 py-3 shadow bg-body rounded">
            <div class="row">
                <div class="col-12">

                    <div class="mb-3 w-100">
                        <label for="" class="form-label">Ho va ten</label>
                        <input type="text" class="form-control name" name="ten_khachhang" id="name"
                            aria-describedby="helpId" placeholder="">
                        <p class="text text-danger my-3 error"></p>
                    </div>


                    <div class="mb-3 w-100">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control email" name="email" id="email" aria-describedby="helpId"
                            placeholder="" title="email khong dung dinh dang">
                        <p class="text text-danger my-3 error"></p>

                    </div>


                    <div class="mb-3 w-100">
                        <label for="" class="form-label">So dien thoai</label>
                        <input type="text" class="form-control sdt" name="sdt" id="sdt" aria-describedby="helpId"
                            placeholder="" title="So dien thoai ban nhap chua dung">
                        <p class="text text-danger my-3 error"></p>

                    </div>


                    <div class="mb-3 w-100">
                        <label for="" class="form-label">Dia chi</label>
                        <input type="text" class="form-control address" name="dia_chi" id="address"
                            aria-describedby="helpId" placeholder="">
                        <p class="text text-danger my-3 error"></p>

                    </div>


                    <div class="mb-3 w-100">
                        <label for="" class="form-label">Checkin</label>
                        <input type="datetime-local" class="form-control checkin" name="ngay_checkin" id="checkin"
                            aria-describedby="helpId" placeholder="" value="<?php echo $checkin ?>" readonly>
                        <p class="text text-danger my-3 error"></p>

                    </div>



                    <div class="mb-3 w-100">
                        <label for="" class="form-label">Checkout</label>
                        <input type="datetime-local" class="form-control checkout" name="ngay_checkout" id="checkout"
                            aria-describedby="helpId" placeholder="" value="<?php echo $checkout ?>" readonly>
                        <p class="text text-danger my-3 error"></p>

                    </div>

                </div>
                <input type="text" hidden name="id_lp" value="<?php echo $idLoaiPhong ?>">

            </div>

        </div>
    </div>
    <div class="col-4">
        <div class="d-none d-sm-none d-md-none d-lg-block my-3 px-3 py-3 shadow bg-body rounded">


            <div class="d-flex justify-content-between flex-column my-3">
                <p class=" text fs-5 fw-bold text-center">Phương thức thanh toán</p>
                <select name="payment_method" class="w-100 payment-method">
                    <option value="">--Chọn phương thức thanh toán--</option>

                    <option value="direct">Thanh toán trực tiếp</option>
                    <option value="payUrl">Momo</option>

                    <option value="redirect">VN Pay</option>

                </select>
                <p class="text text-danger my-3 error"></p>

            </div>


        </div>
    </div>
    <div class="col-4">
        <div class="d-none d-sm-none d-md-none d-lg-block my-3 px-3 py-3 shadow bg-body rounded">
            <p class="text text-center fs-5 py-3 border-bottom border-2">Thông tin đặt phòng</p>
            <p class="text fw-bold">Thông tin phòng</p>
            <p>Phòng:
                <?php echo $loaiPhong['ten_loai'] ?>
            </p>


            <p>So luong nguoi:
                <?php echo $loaiPhong['sl_nguoi'] ?>
            </p>


            <div class="d-flex justify-content-between align-items-center border-bottom border-2 pb-3">
                <p class="my-0 fw-bold">
                    <?php echo $loaiPhong['gia'] ?> /đêm
                </p>

            </div>
            <div class="my-3">
                <p class=" text fs-5 fw-bold">Voucher</p>
                <div class="d-flex justify-content-between">
                    <input type="text" class="form-control" name="voucher" id="voucher" aria-describedby="helpId"
                        placeholder="">

                </div>
                <p class="voucher-message text  my-3"></p>
                <input type="text" name="id_voucher" hidden id="id-voucher" value>
            </div>


            <div class="d-flex justify-content-between align-items-center border-bottom border-2 pb-3">
                <p class="my-0 fw-bold">Tổng cộng</p>
                <p class="my-0 fw-bold text-warning sub-price">

                </p>
                <input type="text" hidden name="tong_tien" id="total-price" value="">

            </div>
            <button class="btn btn-warning w-100 submit-btn" type="submit" name="" disabled>Thanh toan
                ngay</button>


        </div>
    </div>
</form>

<script>
    const NAME = "name"
    const EMAIL = "email"
    const SDT = "sdt"
    const ADDRESS = "address"
    const CHECKIN = "checkin"
    const CHECKOUT = "checkout"
    const PAYMENT_METHOD = "payment-method"
    const DEFAULTMESSAGE = "Vui lòng nhập trường này"


    const errArr = {
        [NAME]: DEFAULTMESSAGE,
        [EMAIL]: DEFAULTMESSAGE,
        [SDT]: DEFAULTMESSAGE,
        [ADDRESS]: DEFAULTMESSAGE,

        [PAYMENT_METHOD]: DEFAULTMESSAGE,

    }
    const regex = {
        [NAME]: /./,
        [EMAIL]: /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
        [SDT]: /^(?:\+?84|0)(?:\d{9}|\d{10})$/,
        [ADDRESS]: /./,

        [PAYMENT_METHOD]: /./,
    }

    const voucherCodes = JSON.parse('<?php echo $jsonVoucherCode ?>')
    const submitBtn = document.querySelector('.submit-btn');

    const allLoaiPhong = JSON.parse('<?php echo $jsonAllLoaiPhong ?>')




    const voucherInput = document.getElementById("voucher")
    const subPriceEle = document.querySelector(".sub-price")
    const idVoucherEle = document.querySelector("#id-voucher")
    const totalPriceEle = document.querySelector("#total-price")
    const messageEle = document.querySelector(".voucher-message")

    const nameEle = document.querySelector(`.${NAME}`)
    const emailEle = document.querySelector(`.${EMAIL}`)
    const sdtEle = document.querySelector(`.${SDT}`)
    const addressEle = document.querySelector(`.${ADDRESS}`)
    const checkinEle = document.querySelector(`.${CHECKIN}`)
    const checkoutEle = document.querySelector(`.${CHECKOUT}`)
    const paymentMethodEle = document.querySelector(`.${PAYMENT_METHOD}`)



    idVoucherEle.value = "";
    let message = ""
    let errorMessage = { checkin: "", payment: "haha" }

    subPriceEle.innerText = "<?php echo $loaiPhong['gia'] * $orderDays ?>"

    totalPriceEle.value = <?php echo $loaiPhong['gia'] * $orderDays ?>

    nameEle.onblur = function () {
        checkErr(NAME, regex[NAME], "", errArr)
        submitBtn.disabled = !checkVerify(errArr)
    }
    emailEle.onblur = function () {
        checkErr(EMAIL, regex[EMAIL], "Vui lòng nhập đúng định dạng email", errArr)
        submitBtn.disabled = !checkVerify(errArr)
    }
    addressEle.onblur = function () {
        checkErr(ADDRESS, regex[ADDRESS], "", errArr)
        submitBtn.disabled = !checkVerify(errArr)
    }
    sdtEle.onblur = function () {
        checkErr(SDT, regex[SDT], "Vui lòng nhập đúng số điện thoại", errArr)
        submitBtn.disabled = !checkVerify(errArr)
    }
    paymentMethodEle.onchange = function (event) {

        submitBtn.setAttribute('name', event.target.value)
        checkErr(PAYMENT_METHOD, regex[PAYMENT_METHOD], "", errArr)
        submitBtn.disabled = !checkVerify(errArr)
        console.log(event.target.value)
    }










    voucherInput.addEventListener("keyup", (e) => {

        const voucherCode = e.target.value

        if (voucherCodes.findIndex((item) => {
            return item.maVoucher == voucherCode
        }) != -1) {
            const giamGia = voucherCodes.find((item) => {
                return item.maVoucher == voucherCode
            }).giamGia / 100
            isCheck = true
            messageEle.innerText = `Giam ${giamGia * 100}% `
            messageEle.classList.remove("text-danger")
            messageEle.classList.add("text-success")


            const idVoucher = voucherCodes.find((item) => {
                return item.maVoucher == voucherCode
            }).id

            idVoucherEle.value = idVoucher


            subPriceEle.innerText = <?php echo $loaiPhong['gia'] * $orderDays ?> - <?php echo $loaiPhong['gia'] * $orderDays ?> * giamGia
            totalPriceEle.value = <?php echo $loaiPhong['gia'] * $orderDays ?> - <?php echo $loaiPhong['gia'] * $orderDays ?> * giamGia
        } else {
            isCheck = false
            message = "Mã voucher không hợp lệ"
            messageEle.innerText = message
            messageEle.classList.remove("text-success")
            messageEle.classList.add("text-danger")
            subPriceEle.innerText = "<?php echo $loaiPhong['gia'] * $orderDays ?>"
            totalPriceEle.value = <?php echo $loaiPhong['gia'] * $orderDays ?>;

            idVoucherEle.value = "";
        }
        if (voucherCode == "") {
            messageEle.innerText = ""
            subPriceEle.innerText = "<?php echo $loaiPhong['gia'] * $orderDays ?>"
            totalPriceEle.value = <?php echo $loaiPhong['gia'] * $orderDays ?>;
            idVoucherEle.value = "";
        }

    })



</script>