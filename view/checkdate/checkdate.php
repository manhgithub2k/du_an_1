<div class="row mx-0 py-3 px-3">

    <div class="col">
        <form method="post">
            <div class="d-flex justify-content-evenly align-items-start px-3 py-3 shadow bg-body rounded my-3">
                <div class="check-date d-flex align-items-center justify-content-center flex-column">
                    <label for="date-in" class="my-0 mx-3">Check In:</label>
                    <input type="datetime-local" name="checkin" class="checkin-input p-1">
                    <!-- <i class="icon_calendar"></i> -->
                    <p class="text text-danger my-3 error"></p>
                </div>
                <div class="check-date d-flex align-items-center flex-column justify-content-center">

                    <label for="date-out" class="my-0 mx-3">Check Out:</label>
                    <input type="datetime-local" name="checkout" class="checkout-input p-1">

                    <p class="text text-danger my-3 error"></p>

                    <!-- <i class="icon_calendar"></i> -->
                </div>
                <div class="check-date d-flex align-items-center flex-column justify-content-center">
                    <label for="date-out" class="my-0 mx-3">Loại phòng:</label>
                    <select name="idLoaiPhong" id="" class="room-select">
                        <option value="">-- Chọn loại phòng --</option>
                        <?php foreach($tatCaLoaiPhong as $item) {
                            ?>
                            <option value="<?php echo $item['id_loaiphong'] ?>">
                                <?php echo $item['ten_loai'] ?>
                            </option>
                            <?php
                        } ?>
                    </select>
                    <p class="text text-danger my-3 error"></p>
                </div>
                <div class="">
                    <button type="submit" class="btn home-button btn-dark" name="check" disabled>Check phòng</button>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-evenly px-3 py-3 shadow bg-body rounded">
            <p class="text text-center fs-5 fw-bold">Hiện tại có
                <?php
                echo $availableRooms;
                ?>
                phòng khả dụng. Vui lòng đặt phòng.
            </p>


        </div>
        <?php
        echo $availableRooms > 0 ? ' <div class="row mx-0">
            <div class="col-lg-12 d-flex flex-sm-column flex-column flex-md-column col-sm-12 col-md-12 my-3 mx-0 px-0">
                <div
                    class="py-3 px3 shadow bg-body rounded mb-3 d-flex flex-sm-column flex-lg-row flex-column flex-md-column">
                    <div class="img px-3 rounded" style="max-width:300px;">
                        <img src="../assets/image/1.jpeg" alt="">
                    </div>
                    <div class="detail d-flex flex-column justify-content-between w-100">
                        <p class="text text-primary fs-4">
                        '.$loaiPhong["ten_loai"].'
                        </p>
                        <div class="d-flex gap-2">
                            <div class="d-flex align-items-center"><i class="fa-solid fa-bed mr-2"></i>
                                <p class="text text-secondary my-0">
                                '.$loaiGiuong["ten_giuong"].'
                                </p>
                            </div>
                            <div class="d-flex align-items-center"><i class="fa-regular fa-square mr-2"></i>
                                <p class="text text-secondary my-0">
                                '.$loaiPhong["dien_tich"].'
                                </p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class=" my-0">Giá chỉ từ</p>
                                <p class="my-0  "><span class="text-warning fs-4 fw-bold my-0">
                                '.number_format($loaiPhong["gia"], 0, '.', ".").' VND
                                    </span>/ 1 đêm
                                </p>
                            </div>
                            <form method="post" action="?act=checkout" class="flex align-items-center mr-3">
                                <input type="text" name="act" hidden value="checkout">
                                <input hidden type="text" value="'.$idLoaiPhong.'" name="id_lp">
                                <input hidden type="text" value="'.$checkin.'" name="ngay_checkin">
        
                                <input hidden type="text" value="'.$checkout.'" name="ngay_checkout">
                                <button class="btn btn-success" name="order">Đặt ngay</button>
        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-1"></div>
            <div class="col-3 d-none d-sm-none d-md-none d-lg-block my-3 px-3 py-3 shadow bg-body rounded">
                <p class="text text-center fs-5 py-3 border-bottom border-2">Thông tin đặt phòng</p>
                <p class="text fw-bold">Thông tin phòng</p>
                <p>Phòng: 1 Phòng Deluxe Twin</p>
                <p>LAST MINUTE 2023</p>
        
                <p>1 Người lớn - 3 Trẻ em - 2 Em bé</p>
        
                <p>Phụ thu trẻ em: 330,000 VNĐ /đêm</p>
                <div class="d-flex justify-content-between align-items-center border-bottom border-2 pb-3">
                    <p class="my-0 fw-bold">1,242,000 VNĐ /đêm</p>
                    <button class="btn btn-danger">Huy</button>
                </div>
                <div class="d-flex justify-content-between align-items-center border-bottom border-2 pb-3">
                    <p class="my-0 fw-bold">Tổng cộng</p>
                    <p class="my-0 fw-bold text-warning">4,968,000 VNĐ</p>
        
                </div>
                <button class="btn btn-warning w-100">dat ngay</button>
        

            </div> -->
        </div>' : ""
            ?>
    </div>


</div>
<script>

    const checkinName = "checkin-input"
    const checkoutName = "checkout-input"
    const selectName = "room-select"
    const errArr = {
        [checkinName]: "Trường này không được bỏ trống",
        [checkoutName]: "Trường này không được bỏ trống",
        [selectName]: "Trường này không được bỏ trống"
    }
    const checkinEle = document.querySelector(".checkin-input")
    const checkoutEle = document.querySelector(".checkout-input")
    const homeBtn = document.querySelector(".home-button")
    const roomSelect = document.querySelector(".room-select")


    const regex = /./;




    checkinEle.addEventListener("change", function (event) {

        checkErr(checkinName, regex, "", errArr)
        checkCheckinTime(checkinName)
        checkCheckoutTime(checkinName, checkoutName)
        const check = checkVerify(errArr)
        console.log(event.target.value)

        homeBtn.disabled = !check



    })
    checkoutEle.addEventListener("change", function (event) {
        checkErr(checkoutName, regex, "", errArr)
        checkCheckinTime(checkinName)
        checkCheckoutTime(checkinName, checkoutName)
        const check = checkVerify(errArr)
        homeBtn.disabled = !check

    })
    roomSelect.onchange = function (event) {
        checkErr(selectName, regex, "", errArr)
        checkVerify()
        const check = checkVerify(errArr)
        console.log(errArr)
        homeBtn.disabled = !check

    }







</script>