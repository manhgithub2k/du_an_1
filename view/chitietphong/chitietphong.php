<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Our Rooms</h2>
                    <div class="bt-option">
                        <a href="./home.html">Home</a>
                        <span>Rooms</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Room Details Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <div class="slide">


                        <!-- Swiper -->

                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                            class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <?php foreach ($slideImgs as $img) {
                                    ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo $img['image'] ?>" />
                                    </div>

                                    <?php
                                } ?>

                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <!-- hihi -->


                        <!-- hihi -->

                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($slideImgs as $img) {
                                    ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo $img['image'] ?>" />
                                    </div>

                                    <?php
                                } ?>
                            </div>
                        </div>

                        <!-- Swiper JS -->



                    </div>
                    <img src="img/room/room-details.jpg" alt="">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>
                                <?php


                                echo $loaiPhong['ten_loai'];
                                ?>
                            </h3>
                            <div class="rdt-right">
                                <div class="rating">
                                    <?php
                                    $yellowStars1 = $roundStars;
                                    $whiteStars1 = 5 - $yellowStars1;
                                    for ($i = 0; $i < $yellowStars1; $i++) {
                                        ?>
                                        <i class="icon_star"></i>

                                        <?php
                                    }
                                    for ($i = 0; $i < $whiteStars1; $i++) {
                                        ?>
                                        <i class="icon_star text-secondary"></i>
                                        <?php
                                    } ?>
                                    <span class="text text-secondary ml-2">
                                        (
                                        <?php echo $averageStars ?>)
                                    </span>
                                </div>

                            </div>
                        </div>
                        <h2>
                            <?php echo $loaiPhong['gia'] ?>$<span>/Pernight</span>
                        </h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>
                                        <?php echo $loaiPhong['dien_tich'] ?> ft
                                    </td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion
                                        <?php echo $loaiPhong['sl_nguoi'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>
                                        <?php echo $loaiGiuong['ten_giuong'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>
                                        <?php for ($i = 0; $i < 2; $i++) {
                                            ?>
                                            <span>
                                                <?php echo $tien_ich[$i]['ten_tienich'] . ", " ?>
                                            </span>
                                            <?php
                                        } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>
                            <?php echo $loaiPhong['mo_ta'] ?>
                        </p>
                    </div>
                </div>
                <div class="rd-reviews">
                    <h4>Reviews</h4>
                    <?php
                    foreach ($allReviews as $review) {
                        ?>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="../assets/image/avatar_user.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>
                                    <?php echo $review['create_at'] ?>
                                </span>
                                <div class="rating">
                                    <?php
                                    $yellowStars = $review['star'];
                                    $whiteStars = 5 - $yellowStars;
                                    for ($i = 0; $i < $yellowStars; $i++) {
                                        ?>
                                        <i class="icon_star"></i>

                                        <?php
                                    }
                                    for ($i = 0; $i < $whiteStars; $i++) {
                                        ?>
                                        <i class="icon_star text-secondary"></i>
                                        <?php
                                    }
                                    ?>


                                </div>
                                <h5>
                                    <?php echo $review['name'] ?>
                                </h5>
                                <p>
                                    <?php echo $review['comment'] ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>


                </div>
                <div class="review-add">
                    <h4>Add Review</h4>
                    <form action="" class="ra-form" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Name*" name="name">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" placeholder="Email*" name="email">
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <h5>You Rating:</h5>
                                    <div class="rating1">
                                        <i class="icon_star icon_star_review text-secondary"></i>
                                        <i class="icon_star icon_star_review text-secondary"></i>
                                        <i class="icon_star icon_star_review text-secondary"></i>
                                        <i class="icon_star icon_star_review text-secondary"></i>
                                        <i class="icon_star icon_star_review text-secondary"></i>

                                    </div>
                                </div>
                                <input type="text" hidden name="star" id="star">
                                <input type="text" hidden value="<?php echo $idLoaiPhong ?>" name="id_lp">
                                <textarea placeholder="Your Review" name="comment"></textarea>
                                <p class="text text-danger">
                                    <?php echo $errMessage ?>
                                </p>
                                <button type="submit" name="addReview">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    <h3>Your Reservation</h3>
                    <form action="?act=checkdate" method="post">
                        <input type="text" value=<?php echo $loaiPhong['id_loaiphong'] ?> name="idLoaiPhong" hidden>
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="datetime-local" name="checkin" class="checkin-input">
                            <!-- <i class="icon_calendar"></i> -->
                            <p class="text text-danger my-3 error"></p>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="datetime-local" name="checkout" class="checkout-input">
                            <p class="text text-danger my-3 error"></p>

                            <!-- <i class="icon_calendar"></i> -->
                        </div>
                        <!-- <div class="select-option">
                            <label for="guest">Guests:</label>
                            <select id="guest">
                                <option value="">3 Adults</option>
                            </select>
                        </div> -->
                        <!-- <div class="select-option">
                            <label for="room">Room:</label>
                            <select id="room">
                                <option value="">1 Room</option>
                            </select>
                        </div> -->
                        <button type="submit" name="" class="home-button" disabled>Check Availability</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
    const starInput = document.querySelector('#star');
    const rating = document.querySelector('.rating1')

    let reviewStar = 0;
    const stars = document.querySelectorAll(".icon_star_review")
    stars.forEach((item, index) => {
        item.onclick = function (event) {
            reviewStar = index + 1
            starInput.value = reviewStar
            const yellowStars = reviewStar
            const whiteStars = 5 - reviewStar
            stars.forEach((star, index) => {
                stars[index].classList.remove("text-warning")
                stars[index].classList.remove("text-secondary")
                stars[index].classList.add("text-secondary")
            })
            for (let index = 0; index < yellowStars; index++) {
                stars[index].classList.remove("text-secondary")
                stars[index].classList.add("text-warning")

            }



            console.log(reviewStar)

        }
    })

    const checkinName = "checkin-input"
    const checkoutName = "checkout-input"
    const regex = /./;


    const errArr = {
        [checkinName]: "Trường này không được bỏ trống",
        [checkoutName]: "Trường này không được bỏ trống",

    }
    const checkinEle = document.querySelector(".checkin-input")
    const checkoutEle = document.querySelector(".checkout-input")
    const homeBtn = document.querySelector(".home-button")


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
</script>
<!-- Room Details Section End -->