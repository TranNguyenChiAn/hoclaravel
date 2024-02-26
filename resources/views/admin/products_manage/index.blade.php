@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="width:80%; margin-left: 224px">
    <!-- LIST -->
    <h2> MANAGE CLOTHES </h2>
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
                    {{$product->category_name}}
                </td>
                <td>
                    {{$product->brand_name}}
                </td>
                <td>
                    {{$product->quantity}}
                </td>
                <td>
                    {{$product->price}}
                </td>
                <td>
                    <a href="#">
                        <i class="bi bi-magic"></i>
                    </a>
                </td>
                <td>
                    <a href="#">
                        <i class="bi bi-x link-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

        {{ $products -> links() }}



    <button class="btn btn-primary">
        <a class="nav-link" href="{{route('admin.addProduct')}}"> + Add a record </a>
    </button>


    <!--FOOTER-->
</section>
