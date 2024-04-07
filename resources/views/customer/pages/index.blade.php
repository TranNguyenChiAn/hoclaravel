@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')

<title>Product List </title>
<section class="p-4" style="font-family: Inter">
    <!-------------------- PRODUCT LIST -------------------->
    <div>
        <div class="row g-3">
            @foreach($products as $product)
                <div class="col-sm-4 col-lg-3 col-xl-3 d-flex">
                    <div class="card shadow-sm p-3 rounded-0">
                        <table class="table table-borderless" >
                            <tr>
                                <td colspan="2" style="height: 286px">
                                    <div class="position-relative d-flex">
                                        <!-- Image -->
                                        <a href="{{ route('product.detail',$product->id) }}">
                                            <img src="{{asset('./images/' . $product->image)}}"
                                                 class="card-img-top object-fit-cover top-0">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="height: 66px; align-content: center">
                                    <h5 class="float-start"> {{ $product -> name}} </h5>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr style="width:80%; margin-top: 0">
                                </td>
                            </tr>
                            <tr>
                                <td width="80%"  >
                                    <span class="card-text text-danger">
                                        <b>${{ $product -> price}}</b>
                                    </span>
                                </td>
                                <td>
                                    @if($product->quantity == 0 )
                                        <img class="position-absolute top-50 start-50 translate-middle"
                                             src="{{asset('./icons/sold_out.png')}}"
                                             style="width:150px">
                                    @elseif($product->quantity > 0 && $product->quantity < 10)
                                        <img class="position-absolute top-0 end-0 translate-middle"
                                             style="width:80px; z-index:3;"
                                             src="{{asset('./icons/out_of_stock.png')}}">

                                        <a href="{{ route('product.addToCart',$product->id) }}"
                                           class="nav-link rounded-1 p-2"
                                           style="background-color: #D4D4FF;">
                                            <i class="bi bi-cart h1"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('product.addToCart',$product->id) }}"
                                           class="nav-link rounded-1 p-2"
                                           style="background-color: #D4D4FF;">
                                            <i class="bi bi-cart h1"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-------------------- PAGINATION -------------------->
    <div class="d-flex justify-content-center py-5">
        {!! $products->links() !!}
        <br>
    </div>
</section>
