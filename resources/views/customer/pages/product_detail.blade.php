@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')

<title> Product detail </title>

<section style="width:80%; margin-left: 150px; font-family: Inter">
    <h3 align="center" style="font-weight: bolder;margin-top:30px">
        PRODUCT DETAIL
    </h3>
    <table style="margin-top: 60px;" class="table table-borderless">
        <tr>
            <td width="480px" rowspan="4" align="center">
                @if($product->quantity < 9 and $product->quantity  > 0)
                    <img class="position-absolute" style="width: 90px; margin: -50px 0 0 -50px" src="{{ asset('./icons/out_of_stock.png')}}">
                @elseif($product->quantity == 0)
                    <img class="position-absolute m-lg-5 p-lg-5" style="z-index: 3" src="{{ asset('./icons/sold_out.png')}}">
                @endif
                <img src="{{ asset('./images/' . $product -> image ) }}" width="450px" height="auto">

            </td>
            <td style="vertical-align: top; color: black"  colspan="3">
                <h2 class="">
                    <b>{{ $product -> name }}</b>
                </h2>
                <h5 class="text-danger">
                    <b>${{$product -> price}}</b>
                </h5>
                <p>Category: {{$product -> category -> name}}</p>
                <p>Age: {{$product -> age ->name}}+</p>
                <p>Size: {{$product -> size}}</p>
            </td>
        </tr>
        <tr>
            <td style="margin-bottom: 0">
                <p>Pieces: {{$product -> pieces}}</p>
            </td>
            <td style="margin-bottom: 0">
                <p>Insiders points: {{$product -> insiders_points}}</p>
            </td>
            <td style="margin-bottom: 0">
                <p>Items: {{$product -> items}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>Description: {{$product -> description}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button class="btn float-start" style="background-color: #2f2ffe">
                    <a class="nav-link text-white" href="{{ route('index') }}">
                        Back
                    </a>
                </button>
            </td>
            <td style="vertical-align: middle">

                @if($product->quantity > 0 )

                <button class="btn float-end" style="background-color: #2f2ffe">
                    <a class="nav-link text-white" href="{{ route('product.addToCart', $product->id) }}">
                        Add to cart
                    </a>
                </button>
                @endif
            </td>
        </tr>
    </table>
    <br>
</section>


