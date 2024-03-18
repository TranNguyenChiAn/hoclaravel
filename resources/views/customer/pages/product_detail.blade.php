@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')
<title> Product's Detail</title>

<section style="font-family: Arial">
    <table style="margin-top: 90px;" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td width="90px" rowspan="4"></td>
            <td width="480px" rowspan="4">
                    <img src="{{ asset('./images/'.$product->image)}}" width="420px" height="auto">
            </td>
            <td style="color: black" colspan="4">
                <h2 class="font-weight-bold">{{ $product -> name}}</h2>
                <h4 class="text-danger"><b>${{ $product -> price}}</b></h4>
                <p>Category: {{ $product -> category -> name}}</p>
                <p>Age: {{ $product -> age -> name}}+</p>
            </td>
        <tr/>
        <tr>
            <td style="vertical-align: top">
                <p>Pieces: {{ $product -> pieces}}</p>
            </td>
            <td>
                <p>Items:  {{ $product -> items}}</p>
            </td>
            <td>
                <p>Insiders points: {{ $product -> insiders_points}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Description:</span> {{ $product -> description}}
            </td>
            <td width="90px" rowspan="4"></td>
        </tr>

    </table>
    @if($product -> quantity > 0 )
        <button class="btn px-3 float-end mx-lg-5" style="background-color: #231ec2">
            <a class="nav-link text-white" href="{{ route('product.addToCart', $product->id) }}">
                Add to cart
            </a>
        </button>
    @endif
</section>

