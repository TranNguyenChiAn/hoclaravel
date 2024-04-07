@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')

<title>History orders</title>
<section>
    <div style="position: relative; top: 24px">
        <h2 align="center" style="font-weight: bold;font-family: Inter"> HISTORY ORDERS </h2>
        <table style="margin-left: 6%; width: 93%; margin-top: 30px" class="table-admin"  border="0" cellspacing="0" cellpadding="5px">
            <tr>
                <th class="t-heading"> Order ID </th>
                <th class="t-heading"> Date buy</th>
                <th class="t-heading"> Receiver Name </th>
                <th class="t-heading"> Status </th>
                <th class="t-heading"> Payment Method </th>
                <th class="t-heading"> Detail </th>
            </tr>

            @foreach ($orders as $order)
                {{--            $money = $order['cost'] ;--}}
                {{--            $cost = round($money, 2);--}}

                <tr class="record">
                    <td> {{ $order->id}} </td>
                    <td> {{ $order->date_buy}} </td>
                    <td>
                            {{$order->receiver_name}}
                    </td>
                    <td>
                        @if( $order->status == 0)
                            <button class="btn btn-warning"> Pending </button>
                        @elseif($order->status == 1)
                            <button class="btn btn-primary"> Delivery </button>
                        @elseif($order->status == 2)
                            <button class="btn btn-success"> Completed </button>
                        @elseif($order->status == 3)
                            <button class="btn btn-danger"> Canceled </button>
                        @endif
                    </td>
                    <td>
                        @if( $order->payment_method == 1)
                            <button class="btn btn-success"> COD </button>
                        @elseif($order->payment_method  == 2)
                            <button class="btn btn-warning"> BANKING </button>
                        @elseif($order->payment_method  == 3)
                            <button class="btn text-white" style="background-color: #f3209f"> MOMO </button>
                        @elseif($order->payment_method  == 4)
                            <button class="btn btn-primary"> VNPAY </button>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('orderDetail', $order->id)}}">
                            <img width="32px" src="{{asset('./icons/add.png')}}">
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center" style="margin-top: 30px">
            {{ $orders -> links() }}
        </div>

        <div style="height: 60px"></div>
    </div>
</section>


