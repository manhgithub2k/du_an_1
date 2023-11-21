<div class="congtainer">
    <h1>Đặt Phòng</h1>
    <form action="?act=datphong" method="post" enctype="multipart/form-data">
        
        <label for="name">Tên khách hàng: </label><br/>
        <input type="text" name="name"><br/><br/>
        <label for="phone">Số điện thoại: </label><br/>
        <input type="number" name="phone"><br/><br/>
        <label for="email">Email: </label><br/>
        <input type="text" name="name"><br/><br/>
        
        <label for="checkin_date">Ngày nhận phòng: </label><br/>
        <input type="datetime-local" id="checkin_date" name="checkin_date"><br/><br/>
        <label for="checkout_date">Ngày trả phòng: </label><br/>
        <input type="datetime-local" id="checkout_date" name="checkout_date"><br/><br/>
        <select name="roomtypeid">
            @foreach($roomtypes as $item)
            <option value="{{$item->id}}">{{$item->typename}} - {{$item->price}} VND/ngà
                ngày</option>
                @endforeach
                </select><br/><br/>
                <input type="submit" name="submit">
    </form>

</div>