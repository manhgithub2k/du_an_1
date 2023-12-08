<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Poly Hotel Luxury</h1>
                    <p>
                        Poly Hotel - Nơi sự tinh tế và đẳng cấp gặp gỡ
                    </p>
                    <a href="#" class="primary-btn">Khám phá ngay</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form">
                    <h3 class="text-center ">ĐẶT PHÒNG NGAY</h3>
                    <form action="?act=checkdate" method="post">
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="datetime-local" name="checkin" class="checkin-input">
                            <!-- <i class="icon_calendar"></i> -->
                            <p class="error text text-danger"></p>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="datetime-local" name="checkout" class="checkout-input">
                            <p class="error text text-danger"></p>

                            <!-- <i class="icon_calendar"></i> -->
                        </div>

                        <div class="select-option">
                            <label for="room">Loại phòng</label>
                            <select id="room" name="idLoaiPhong" class="room-select">
                                <option value="">--Chọn loại phòng--</option>
                                <?php foreach($tatCaLoaiPhong as $item) {
                                    ?>

                                    <option value="<?php echo $item["id_loaiphong"] ?>">
                                        <?php echo $item["ten_loai"] ?>
                                    </option>
                                    <?php
                                } ?>

                            </select>
                            <p class="error text text-danger"></p>
                        </div>
                        <button type="submit" disabled class="home-button">Check Availability</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="../assets/user/img/hero/hero-1.jpg"></div>
        <div class="hs-item set-bg" data-setbg="../assets/user/img/hero/hero-2.jpg"></div>
        <div class="hs-item set-bg" data-setbg="../assets/user/img/hero/hero-3.jpg"></div>
    </div>
</section>
<!-- Hero Section End -->
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