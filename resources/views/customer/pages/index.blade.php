@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')

<section class="p-4">
    <!-------------------- PRODUCT LIST -------------------->
    <div>
        <div class="row g-3">
            @foreach($products as $product)
                <div class="col-sm-4 col-lg-3 col-xl-3 d-flex">
                    <div class="card shadow-sm p-4" >
                        <div class="position-relative">
                                <!-- Image -->
                            <img src="{{asset('./images/' . $product->image)}}"
                                     class="card-img-top object-fit-cover top-0" >
                        </div>

                        <div class="card-body">
                            <h5 class="float-start"> {{ $product -> name}} </h5>
                            <br>
                            <div class="d-flex justify-content-between">
                                <hr style="width:100%; ">
                                @if($product->quantity == 0 )
                                    <img class="position-absolute top-50 start-50 translate-middle"
                                         src="{{asset('./icons/sold_out.png')}}"
                                         style="width:150px">
                                @elseif($product->quantity > 0 && $product->quantity < 10)
                                    <img class="position-absolute top-0 start-100 translate-middle"
                                         style="width:60px; z-index:3;transform: rotate(45deg)"
                                         src="{{asset('./icons/out_of_stock.png')}}">
                                    <div class="card text-end">
                                        <a href="{{ route('product.addToCart',$product->id) }}"
                                           class="nav-link position-absolute rounded-1 p-1 "
                                           style="background-color: #D4D4FF">
                                            <i class="bi bi-cart h1"></i>
                                        </a>
                                    </div>
                                @else
                                    <a href="{{ route('product.addToCart',$product->id) }}"
                                       class="nav-link position-relative rounded-1 p-2"
                                       style="background-color: #D4D4FF">
                                        <i class="bi bi-cart h1"></i>
                                    </a>
                                @endif
                            </div>
                            <span class="card-text text-danger"> ${{ $product -> price}}</span>
                        </div>
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
