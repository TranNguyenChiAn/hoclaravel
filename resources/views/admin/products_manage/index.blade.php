@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="width:80%; margin-left: 210px">
    <!-- LIST -->
    <h2> MANAGE CLOTHES </h2>
    <table class="table table-striped">
        <tr>
            <th class="t-heading" align="left"> ID </th>
            <th class="t-heading" align="left"> Name </th>
            <th class="t-heading" align="left"> Image </th>
            <th class="t-heading" align="center"> Material </th>
            <th class="t-heading" align="left"> Color </th>
            <th class="t-heading" align="left" width="118px"> Category Name </th>
            <th class="t-heading" align="left" width="118px"> Brand Name </th>
            <th class="t-heading" align="left"> Quantity </th>
            <th class="t-heading" align="left"> Price </th>
            <th class="t-heading" align="center"> Edit </th>
            <th class="t-heading" align="center"> Delete </th>
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
                    <img class="img-fluid" width="100px" src="/image/{{$product->image}}">
                </td>
                <td>
                    {{$product->material}}
                </td>
                <td>
                    {{$product->color}}
                </td>
                <td  width="70px" align="center">
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
                <td  width="90px">
                    <a href="#">
                        <i class="bi bi-magic"></i>
                    </a>
                </td>
                <td  width="90px">
                    <a href="#">
                        <i class="bi bi-x"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

    <button class="btn btn-primary">
        <a class="nav-link" href="{{route('admin.addProduct')}}"> + Add a record </a>
    </button>

    <!--FOOTER-->
</section>
