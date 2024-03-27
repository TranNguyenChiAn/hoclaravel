@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')

<style>
    body {
        background-color: #F5F4F8;
    }
    .edit_order {
        margin-top: 20px;
        width: 100%;
        border: 1px solid #d7d2d2;
        border-radius: 10px;
        background-color: white;
        padding: 20px 40px;
        color: black;
    }

    .edit_status {
        position: center;
        height: 30px;
        width: 200px;
        border-radius: 4px;
        padding-left: 20px;
    }
</style>
<title> Edit Order </title>

<section style="width:80%; margin-left: 240px">
    <h3 align="center" style="font-family: Inter; font-weight: bolder; color: #2f2ffe; margin-top:30px">
        EDIT ORDER
    </h3>
    <div class="edit_order">
        <div style="display: flex; justify-content: space-between">
            <div>
                <h3> Delivery address </h3>
                Receiver Name: {{ $order->receiver_name }}<br>
                Receiver Phone: {{ $order->receiver_phone}}<br>
                Receiver Address:{{ $order->receiver_address}}<br>
            </div>
            <div>
                <form method="post" action="process.php">
                    <input type="hidden" name="id" value="<= $order['id']; ?>">
                    <select class="edit_status" name="status">
                        <option name="status" value="0"> Pending </option>
                        <option name="status" value="1"> Delivery </option>
                        <option name="status" value="2"> Completed </option>
                        <option name="status" value="3"> Canceled </option>
                    </select>
                    <button type="submit" class="btn btn-primary">
                        OK
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="edit_order">
        <h3> Product </h3><br>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            @foreach ($order_details as $order_detail)
                <tr style="margin-top: 20px;">
                    <td width="280px">
                        @if ($order_detail->product)
                            <img style="height: 180px;" class="object-fit-cover"
                                 src="{{ asset('./images/'. $order_detail->product->image) }}">
                        @endif
                    </td>
                    <td>
                        <h3>{{ $order_detail->clothe_name }}</h3>
                        Amount: {{ $order_detail->quantity }}<br>
                        Price: ${{ $order_detail->price }}
                    </td>
                    <td>
                        <strong>Cost: $
                            @php
                                // Tính tổng chi phí của mỗi sản phẩm trong giỏ hàng
                                $money = $order_detail->price * $order_detail->quantity;
                                echo $money;
                            @endphp
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p></p>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="total_cost edit_order" style="display: flex; justify-content: space-between; color: firebrick">
        <h3> Total </h3>
        <h3>

        </h3>
    </div>
    <br>
</section>


