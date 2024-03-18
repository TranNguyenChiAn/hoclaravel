@vite(["resources/sass/app.scss", "resources/js/app.js"])
<header class="d-flex justify-content-around py-1 px-0">
    <ul class="nav justify-content-around " style="width:100%;font-family: Arial; font-weight: bold">
        <li class="nav-item">
            <img src="{{asset('./icons/celement cat.png')}}" alt="brand"
                 height="36px" class="rounded">
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark dropdown-toggle" href="{{ route('customer.index') }}" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                PRODUCT
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-item">
                    <a class="nav-link link-dark"> Animal </a>
                </li>
                <li class="dropdown-item">
                    <a class="nav-link link-dark"> City </a>
                </li>
                <li class="dropdown-item">
                    <a class="nav-link link-dark"> Architecture</a>
                </li>
                <li class="dropdown-item">
                    <a class="nav-link link-dark"> Expert Creator </a>
                </li>
                <li class="dropdown-item">
                    <a class="nav-link link-dark"> Stars War </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark">
                BEST SELLER
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark">
                NEW
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark">
                CONTACT
            </a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="offcanvas" href="#offcanvas"
               class="nav-link text-black">
                <i class="bi bi-cart h3"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="">
                <img width="30px" src="{{asset('./icons/user.png')}}">
            </a>
        </li>
    </ul>
</header>

{{--------------------------------------------------------------------------------------------}}
{{--CART--}}
<div class="offcanvas offcanvas-end border shadow" id="offcanvas"
     tabindex="-1" aria-modal="true" aria-labelledby="offcanvasLabel"
     style="transition: all 0.4s ease-in-out">
    <div id="myCart" class="w-100 h-100 d-flex flex-column">
        {{--    UPPER --}}
        <div class="w-100">
            <!-- Close -->
            <div class="p-3 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-x" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Header-->
            <div class="p-3 d-flex justify-content-center">
                <strong class="fs-5">Your Cart</strong>
            </div>
        </div>
        @php
            //            kiem tra xem cart co ton tai ko
                            $cartCheck = \Illuminate\Support\Facades\Session::get('cart');
        @endphp
        {{--        BODY --}}
        {{--     neu ton tai CART--}}
        @if($cartCheck != null)
            <div class="w-100 h-40 flex-fill d-flex flex-column p-3">
                <!-- List group -->
                <ul class="p-0 m-0 scrollbar flex-fill overflow-y-auto overflow-x-hidden pe-1"
                    id="scroll-style">
                    @foreach(Session::get('cart') as $product_id => $product)
                        <li class="mb-3">
                            <form class="m-0" action="{{route('product.updateCartQuantity', $product_id)}}">
                                <div class="d-flex justify-content-between">
                                    <div class="w-20">
                                        <!-- Image -->
                                        <a href="/product/{{$product_id}}"
                                           class="overflow-hidden ratio ratio-1x1 border rounded d-flex align-items-center justify-content-center">
                                            <img src="{{asset($product['image'])}}" class="object-fit-cover">
                                        </a>
                                    </div>
                                    <div class="w-75">
                                        <div class="d-flex h-100 justify-content-between">
                                            <div class="d-flex flex-column justify-content-between w-80">
                                                <!-- Title -->
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <a class="text-dark text-decoration-none fw-bold text-break"
                                                           href="/product/{{$product_id}}">
                                                            {{$product['product_name']}}
                                                        </a>
                                                    </div>
                                                    <div>
{{--                                                        {{$product['category']['name']}}ml--}}
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center justify-content-between">
                                                    {{--select--}}
                                                    <div class="text-start text-success">
                                                        ${{$product['price']}}
                                                    </div>
                                                    <div>
                                                        <i class="bi bi-x"></i>
                                                    </div>
                                                    <!-- Quantity -->
                                                    <div class="text-end w-40">
                                                        <input type="number" name="buy_quantity" min="1"
                                                               value="{{$product['quantity']}}"
                                                               class="form-control"
                                                               onchange="this.form.submit()">
                                                    </div>
                                                    @php
                                                        $total_items[$product_id] = $product['quantity']
                                                    @endphp
                                                </div>
                                            </div>
                                            <div class="w-10 d-flex justify-content-center align-items-center">
                                                <!-- Remove -->
                                                <a class="h-25"
                                                   href="{{route('product.deleteFromCart', $product_id)}}">
                                                    <i class="bi bi-trash text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $amount[$product_id] = $product['price'] * $product['quantity']
                                    @endphp
                                </div>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{--        lower --}}
            <div class="w-100 p-3">
                <!-- Footer -->
                <div class="justify-between">
                    <div class="mb-3">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                Total items
                            </div>
                            <div>
                                {{array_sum($total_items)}}
                            </div>
                        </div>

                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                Amount
                            </div>
                            <div class="text-success">
                                ${{array_sum($amount)}}
                            </div>
                        </div>
                        <div class="p-2 px-3">
                            <a href="{{route('product.deleteAllFromCart')}}"
                               class="text-danger text-decoration-none d-flex align-items-center justify-content-center">
                                Delete cart
                                <i class="bi bi-trash ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <a class="btn w-45 btn-outline-dark" href="{{route('index')}}">Continue Shopping</a>
                    <a class="btn w-45 btn-dark" href="{{route('checkout')}}">Continue to Checkout</a>
                </div>
            </div>
            {{--            neu cart trong --}}
        @else
            <div class="d-flex align-items-center justify-content-center w-100 h-100">
                <div>
                    Your cart is empty for now 🥺
                </div>
            </div>
        @endif
    </div>
</div>

<script src="{{asset('frontend/js/home.js')}}"></script>
<script src="{{asset('frontend/js/cart.js')}}"></script>



