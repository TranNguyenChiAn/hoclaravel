@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<title>Manage orders</title>
<section style="width:80%; margin-left: 240px">
    <br>
    <h1 align="center" style="font-weight: bold;color: #2F2FFE;font-family: Arial;">
       MANAGE ORDERS
    </h1>
    <br>
    <table class="table table-striped">
        <tr>
            <th class="t-heading" align="center"> Order ID </th>
            <th class="t-heading" align="center"> Date buy</th>
            <th class="t-heading" align="center"> Customer Name </th>
            <th class="t-heading" align="center"> Payment Method </th>
            <th class="t-heading" align="center"> Status </th>
            <th class="t-heading" style="text-align: center"> Edit </th>
        </tr>

        @foreach ($orders as $order)
        <tr class="record">
            <td style="padding-left: 30px">
                {{$order->id}}
            </td>
            <td>
                {{$order->date_buy}}
            </td>
            <td>
                {{$order->customer_name}}
            </td>
            <td>
                @if( $order->method_id == 1)
                    <button class="btn btn-success"> COD </button>
                @elseif($order->method_id == 2)
                    <button class="btn btn-warning"> BANKING </button>
                @elseif($order->method_id == 3)
                    <button class="btn text-white" style="background-color: #f3209f"> MOMO </button>
                @elseif($order->method_id == 4)
                    <button class="btn btn-primary"> VNPAY </button>
                @endif
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
            <td align="center">
                <a href="{{ route('order.edit', $order->id) }}">
                    <i class="bi bi-magic link-dark"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center" style="margin-top: 30px;">
        {{ $orders -> links() }}
    </div>
</section>


