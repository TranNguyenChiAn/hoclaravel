@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="width:80%; margin-left: 224px">
    <!-- LIST -->
    <figure align="center" style="font-weight: bold; font-size: 30px;color: #2f2ffe;"> MANAGE CLOTHES </figure>

    <table class="table table-hover">
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Image </th>
            <th> Material </th>
            <th> Color </th>
            <th> Category Name </th>
            <th> Brand Name </th>
            <th> Quantity </th>
            <th> Price </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
        @foreach($products as $product)
            <tr class="record">
                <td>
                    {{$product->id}}
                </td>
                <td>
                    {{$product->name}}
                </td>
                <td>
                    <img class="img-fluid" width="88px" src="/image/{{$product->image}}">
                </td>
                <td>
                    {{$product->material}}
                </td>
                <td>
                    {{$product->color}}
                </td>
                <td>
                    {{$product->category->name}}
                </td>
                <td>
                    {{$product->brand->name}}
                </td>
                <td>
                    {{$product->quantity}}
                </td>
                <td>
                    {{$product->price}}
                </td>
                <td>
                    <a href="{{ route('product.edit', $product) }}">
                        <i class="bi bi-magic"></i>
                    </a>
                </td>
                <td>
                    <form method="post" action="{{ route('product.delete', $product) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
        <br>
    </div>

    <button class="btn btn-primary end-0">
        <a class="nav-link" href="{{route('product.create')}}"> + Add a record </a>
    </button>


    <!--FOOTER-->
</section>
