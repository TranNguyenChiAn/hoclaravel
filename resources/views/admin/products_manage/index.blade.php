@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<title> Manage products </title>
<section style="width:80%; margin-left: 224px">
    <!-- LIST -->
    <br>
    <h1 align="center" style="font-weight: bold;color: #2f2ffe;font-family: Arial">
        MANAGE PRODUCTS
    </h1>
    <br>

    <table class="table table-hover">
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Image </th>
            <th> Size</th>
            <th> Pieces </th>
            <th> Category Name </th>
            <th> Age Range </th>
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
                    <img class="img-fluid" width="88px"
                         src="{{ asset('./images/' . $product->image)}}">
                </td>
                <td>
                    {{$product->size}}
                </td>
                <td>
                    {{$product->pieces}}
                </td>
                <td>
                    {{$product->category->name}}
                </td>
                <td>
                    {{$product->age->name}}+
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
        {{ $products->links() }}
        <br>
    </div>

    <button class="btn btn-primary float-end translate-middle-y">
        <a class="nav-link" href="{{route('product.create')}}"> + Add a record </a>
    </button>


    <!--FOOTER-->
</section>
