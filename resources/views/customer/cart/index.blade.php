@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')

<title> Cart </title>
<style>
        body {
            font-family:Arial;
        }
</style>

<section align="center" class="py-5">
    <h1 align="center" style="margin: 10px 0 50px 0; color: black"> My Shopping Cart</h1>
    @php
        //kiem tra xem cart co ton tai ko
        $cartCheck = \Illuminate\Support\Facades\Session::get('cart');
    @endphp

    {{--        BODY --}}
    {{--     neu ton tai CART--}}
    @if($cartCheck != null)
        <table class="table" style="width: 81%; margin-left: 10%" border="0">
            <tr style="text-align: center; height: 40px; border-bottom: 1px solid black">
                <th style="text-align: center; width: 130px"> Image</th>
                <th style="text-align: left;"> Description </th>
                <th > Each Price </th>
                <th > Quantity </th>
                <th style="text-align: center; width: 100px"> Count </th>
                <th style="text-align: center; width: 100px"> Remove </th>
            </tr>
            @foreach(Session::get('cart') as $product_id => $product)

            <form action="{{route('product.updateCart', $product_id)}}">
            <tr>
                {{--Image--}}
                <td align="center" style="vertical-align: center; height: 140px">
                    <a href="/product/{{$product_id}}" class="rounded d-flex align-items-center">
                        <img class="object-fit-cover" style="height: 100px"
                             src="{{asset('./images/' . $product['image'])}}" >
                    </a>
                </td>
                {{--Name--}}
                <td>
                            <span>
                                {{ $product['name'] }}
                            </span>
                        </td>
                {{--Price--}}
                <td align="center">
                            ${{$product['price']}}
                        </td>
                {{--Quantity--}}
                <td align="center">
                    <input style="width: 50px" type="number" id="productQuantity" name="buy_quantity" min="1" class="form-control"
                           value="{{$product['quantity']}}" onchange="this.form.submit()">

                </td>
                {{--Count--}}
                <td align="center">
                    $ {{ $product['price'] * $product['quantity'] }}
                </td>
                <!--REMOVE-->
                <td align="center">
                    <a style="padding-bottom: 0" href="{{route('product.deleteFromCart', $product_id)}}">
                                <img style="width: 24px" src="{{ asset('./icons/cancel.png') }}">
                            </a>
                    @php
                        $amount[$product_id] = $product['price'] * $product['quantity']
                    @endphp
                </td>
            </tr>
            @endforeach
            <tr>
                <td class="total_cost" colspan="6" align="end">
                    <p style="font-weight: bolder; color: #dc3545">
                        Total: ${{ array_sum($amount) }}
                    </p>
                </td>
            </tr>
        </table>
    </form>
    <div class="mx-lg-5 px-4">
        <div class="d-flex justify-content-between">
            <!--Link để quay về trang danh sách sản phẩm-->
            <button style="border-radius: 0; background-color: #2f2ffe" class="btn ">
                <a class="nav-link text-white" href="{{route('index')}}">Product List</a>
            </button>
            <button style="border-radius: 0" class="btn border-dark">
                <a class="nav-link text-danger" href="{{route('product.deleteAllFromCart')}}"> Delete cart </a>
            </button>

            <!-- Thanh toan-->
            <button style="border-radius: 0" class="btn btn-success">
                <a class="nav-link text-white" href="{{route('checkout')}}"> Checkout </a>
            </button>
        </div>
    </div>
    @else()
        <table class="table table-borderless" border="1">
            <tr>
                <td style="text-align: center;">
                    <h1><strong> Your cart is empty. </strong></h1>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">
                    <button style="background-color: #2f2ffe" class="btn px-3">
                        <a class="nav-link text-white" href="{{route('index')}}">Product List</a>
                    </button>
                </td>

            </tr>
        </table>
    @endif
</section>
<script src="{{asset('frontend/js/cart.js')}}"></script>



