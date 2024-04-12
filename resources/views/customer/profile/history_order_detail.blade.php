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

    .confirm_cancel {
        z-index: 3;
        position: absolute;
        border: 1px solid #e1e1e1;
        width: 500px;
        height: 300px;
        padding-top: 60px;
        background-color: white;
        margin: -180px 0 0 30%;
        display: none;
    }
</style>
<title> Edit Order </title>

<section style="width:80%; margin-left: 12%" class="my-lg-3">
        <h3 align="center" style="font-family: Inter; font-weight: bolder; color: #2f2ffe; margin-top:30px">
            DETAIL HISTORY ORDER
        </h3>
        <div class="edit_order" >
            <div style="display: flex; justify-content: space-between">
                <div>
                    <h3> Delivery address </h3>
                    Receiver Name: {{ $order->receiver_name }}<br>
                    Receiver Phone: {{ $order->receiver_phone}}<br>
                    Receiver Address:{{ $order->receiver_address}}<br>
                </div>
                <div class="d-flex">
                    <div class="mx-3">
                        @if( $order->status = 1)
                            <button class="btn btn-warning"> Pending </button>
                        @elseif($order->status = 2)
                            <button class="btn btn-primary"> Delivery </button>
                        @elseif($order->status = 3)
                            <button class="btn btn-success"> Completed </button>
                        @elseif($order->status = 4)
                            <button class="btn btn-danger"> Canceled </button>
                        @endif
                    </div>
                    <div>
                        @if( $order->payment_method == 1)
                            <button class="btn btn-success"> COD </button>
                        @elseif($order->payment_method  == 2)
                            <button class="btn btn-warning"> BANKING </button>
                        @elseif($order->payment_method  == 3)
                            <button class="btn text-white" style="background-color: #f3209f"> MOMO </button>
                        @elseif($order->payment_method  == 4)
                            <button class="btn btn-primary"> VNPAY </button>
                        @endif
                    </div>
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
                                    $total = 0;
                                    $total += $money;
                                    echo $money;
                                @endphp
                            </strong>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="total_cost edit_order" style="display: flex; justify-content: space-between; color: firebrick">
            <h3><b></b> Total </h3></h3>
            <h3><b>
                ${{$total}}
            </b></h3>
        </div>
        <br>
    <div>
        @if($order->status = 1)
            <button class="btn btn-danger w-100">
                <a class="nav-link">
                    Cancel
                </a>
            </button>
        @endif
        <div id="confirm_cancel" class="confirm_cancel">
            <span style="margin: 60px 0 0 48px;font-size: 24px; font-weight: bold"> Are you sure you want to cancel?</span><br>
            <br>
            <button id="no" style="margin:60px 0 0 90px;" class="btn btn-success">
                <a style="color: white" class="link">
                    No
                </a>
            </button>

            @if($order->status = 1)
                <button style="margin:60px 0 0 160px;" id="cancel" class="btn btn-danger">
                    <a style="color: white" class="link" href="cancel.php?id=<?= $order['id']; ?>">
                    Sure
                </a>
                </button>
            @endif
        </div>

        <script>
            document.getElementById("cancel").onclick = function() {
                document.getElementById("confirm_cancel").style.display = "block"
                document.body.style.filter = 'blur'

            };
            document.getElementById("no").onclick = function() {
                document.getElementById("confirm_cancel").style.display = "none"
            };
        </script>
    </div>
</section>


