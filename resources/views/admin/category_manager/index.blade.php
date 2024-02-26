@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="width:80%; margin-left: 210px">
    <h2> MANAGE CATEGORY </h2>
    <table class="table table-striped">
        <tr>
            <th class="col-2"> ID </th>
            <th class="col-8"> Name </th>
            <th> Edit </th>
            <th> Remove </th>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td>
                    {{$category->id}}
                </td>
                <td>
                    {{$category->name}}
                </td>
                <td>
                    <a href="#">
                        <i class="bi bi-magic"></i>
                    </a>
                </td>
                <td>
                    <form method="post" action="{{ route('admin.deleteCategory', $category) }}">
                        @csrf
                        @method('DELETE')
                        <button> Remove </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <button class="btn btn-primary" type="submit">
        <a class="nav-link" href="{{route('admin.addCategory')}}"> Add category </a>
    </button>
</section>
