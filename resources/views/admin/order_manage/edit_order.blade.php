@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

    <style>
        body {
            margin-top:-30px;
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
            height: 36px;
            width: 200px;
            border-radius: 4px;
            padding-left: 20px;
        }
    </style>
    <title> Edit Order </title>

<section style="width:80%; margin-left: 240px">
    <h3 align="center" style="font-family: Inter; font-weight: bolder; color: #2f2ffe; margin-top:30px">
        EDIT ORDER #{{$order->id}}
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
                    <form method="post" action="{{route('order.update', $order)}}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{$order->id}}">
                        <select class="edit_status" name="status">

                            @if($order->status == 0)
                                <option value="0"> Pending</option>
                                <option value="1"> Delivery</option>
                                <option value="2"> Completed</option>
                                <option value="3"> Canceled</option>

                            @elseif($order->status == 1)
                                <option value="1"> Delivery </option>
                                <option value="0"> Pending</option>
                                <option value="2"> Completed</option>
                                <option value="3"> Canceled</option>

                            @elseif($order->status == 2)
                                <option value="2"> Completed</option>
                                <option value="0"> Pending</option>
                                <option value="1"> Delivery</option>
                                <option value="3"> Canceled</option>
                            @elseif($order->status == 3)
                                <option value="3"> Canceled</option>
                                <option value="0"> Pending</option>
                                <option value="1"> Delivery</option>
                                <option value="2"> Completed</option>
                            @endif
                        </select>
                        <button type="submit" class="btn" style="background-color: #2F2FFE; color: white">
                            OK
                        </button>
                    </form>
                </div>
            </div>
    </div>
    <div class="edit_order">
        <h3> Product </h3><br>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            @php
                $total = 0;
            @endphp
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
                                    $total += $money;
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
        <h3> {{ $total}} </h3>
    </div>
    <br>
</section>


