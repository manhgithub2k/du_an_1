<div class="row mx-0 py-3 px-3">
    <div class="col">
        <form method="post"
            class="d-flex justify-content-evenly align-items-center px-3 py-3 shadow bg-body rounded my-3">


            <div class="mb-3 w-25">
                <label for="" class="form-label">Nhập mã đơn hàng</label>
                <input type="text" class="form-control" name="uniqueId" id="" aria-describedby="helpId" placeholder="">

            </div>
            <div class="">
                <button type="submit" class="btn home-button btn-dark" name="check">Check thông tin đơn
                    hàng</button>
            </div>
        </form>
        <div class="d-flex justify-content-evenly px-3 py-3 shadow bg-body rounded">
            <p class="text text-center fs-5 fw-bold">
                <?php echo $message ?>
            </p>


        </div>
        <?php


        echo !empty($order) ? ' <div class="d-flex flex-column  py-3 shadow bg-body rounded my-3">
            <p>Họ tên người mua hàng:' .
            $order["ten_khachhang"] . '
            </p>
            <p>Địa chỉ:' .
            $order["dia_chi"] . '
            </p>
            <p>Số điện thoại:' .
            $order["sdt"] . '
            </p>
            <p>Email:' .
            $order["email"] . '
            </p>
            <p>Hình thức thanh toán :' .
            $order["payment_method"] . '
            </p>
            <p>Ngày đến:' .
            $order["ngay_checkin"] . '
            </p>
            <p>Ngày đi:' .
            $order["ngay_checkout"] . '
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
                            <td>' .
            $currentLoaiPhong['ten_loai'] .
            '
                            </td>
                            <td>Ngày</td>
                            <td>' .
            $orderDays . '
                            </td>
                            <td>' .
            $currentLoaiPhong['gia'] .
            '
                            </td>
                            <td>' .
            $currentLoaiPhong['gia'] * $orderDays
            . '
                               
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
                               ' .
            $voucherDiscount
            . ' %
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
                            <td colspan="6">Tổng tiền thanh toán:' .
            number_format($order['tong_tien'], 0, ".", ".")
            . ' VND
                            </td>
                        </tr>
                        <tr class="">
                            <td colspan="6">Số tiền viết bằng chữ: ' .
            convertNumberToWords($order['tong_tien'])



            . '
                               
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>' : "" ?>

    </div>


</div>