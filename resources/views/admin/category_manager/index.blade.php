@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="width:80%; margin-left: 210px">
    <h1 align="center" style="font-weight: bold;color: #2f2ffe;font-family: Arial">
        MANAGE CATEGORIES
    </h1>
    <br>
    <table class="table">
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
                    <a href="{{route('category.edit', $category)}}">
                        <i class="bi bi-magic text-black"></i>
                    </a>
                </td>
                <td>
                    <form method="post" action="{{ route('category.destroy', $category) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <button class="btn btn-primary float-end m-3" type="submit">
        <a class="nav-link" href="{{route('category.create')}}"> + Add category </a>
    </button>
</section>
