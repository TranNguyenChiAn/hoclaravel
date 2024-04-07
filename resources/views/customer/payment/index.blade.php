@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')

    <title> Payment </title>
    <style>
        .payment {
            height: 100%;
            width: 32%;
            border: 1px solid #d7d2d2;
            border-radius: 6px;
            background-color: white;
            padding: 20px 40px;
            color: black;
            margin: 10px 0 0 0;
        }

         body {
             background-color: #F5F4F8;
         }
        .order_detail {
            margin: 10px 10px 0 3%;
            width: 630px;
            border: 1px solid #d7d2d2;
            border-radius: 6px;
            background-color: white;
            padding: 20px 40px;
            color: black;
        }
        .payment_button {
            width: 100%;
            height: 36px;
            background-color: black;
            color: white;
            border: none;
        }

        .payment_button:hover {
            cursor: pointer;
        }
        .link_in_button {
            text-decoration: none;
            color: white;
        }
    </style>

<h2 align="center" style="font-weight: bold;font-family: Inter; margin-top:18px"> Temporary Bill </h2>
<section id="main_content" style="width: 100%; display: flex; justify-content: space-evenly" >
    <div>
        <div class="order_detail">
                <div style="display: flex; justify-content: space-between">
                    <div>
                        <h3 style="margin: 0 0"> Delivery address </h3>
                        Receiver Name: {{$order->receiver_name}}<br>
                        Receiver Phone:{{ $order->receiver_phone}}<br>
                        Receiver Address: {{$order->receiver_address}}
                    </div>
                </div>

        </div>
        <div class="order_detail">
            <h3 style="margin: 0 0 18px 0"> Product </h3>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    @foreach ($order_details as $order_detail)
                    <tr style="margin-top: 20px;">
                        <td width="120px">
                            <img width="120px" src="{{ asset('./images/'.$order_detail->product->image)}}">
                        </td>
                        <td style="padding-left: 18px; width: 300px ">
                            <h3>{{$order->product->name ?? 'Product Not Found' }}</h3>
                            Amount: {{$order_detail->quantity}}<br>
                            Price: ${{$order_detail->price}}<br>
                        </td>
                        <td width="120px" >
                            <h6>Cost: $@php
                                //Tính thành tiền của từng sp có trong trong carts
                                $money = $order_detail['price'] * $order_detail['quantity'];
                                //Tính tổng tiền của các sp có trong trong carts
                                $count_money = 0;
                                $count_money += $money;
                                $totals = 0;
                                $totals += $count_money;
                                echo $money;
                                @endphp
                            </h6>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p></p>
                        </td>
                    </tr>
                @endforeach

                        <tr style="color: firebrick; font-weight: bold; font-size: 18px">
                            <td colspan="2">
                                <span> Total </span>

                            </td>
                            <td style="text-align: center">
                        <span>
                            @php
                                echo "$" . $count_money;
                            @endphp
                        </span>
                            </td>
                        </tr>
            </table>
        </div>
    </div>
    <div class="payment">
        <form class="d-block" id="paymentForm" method="POST" action="{{ route('payment.process') }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="payment_method" id="payment_method">
        <table cellpadding="6px" style="background-color: #ffffff" width="100%">
            <tr>
                <th class="d-flex justify-content-center"> Payment Method </th>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="payment_method" style="border-radius: 0; width:100%" class="btn btn-success px-4" value="1">
                        Pay with cash
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="payment_method" style="border-radius: 0; width:100%" class="btn btn-warning px-4" value="2">

                        Banking
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="payment_method" style="background-color: #f3209f" class="payment_button" value="3">
                        Pay with Momo
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="payment_method" style="border-radius: 0; width:100%" class="btn btn-primary px-4" value="4">
                        Pay with VnPay
                    </button>
                </td>
            </tr>
        </table>
        </form>
    <br>
    </div>
</section>

