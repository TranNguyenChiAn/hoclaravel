@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="width:80%; margin-left: 210px">
    <h2> MANAGE CATEGORY </h2>
    <table class="table table-striped">
        <tr>
            <th class="t-heading" align="left"> ID </th>
            <th class="t-heading" align="left"> Name </th>
            <th class="t-heading" width="100px"> Action </th>
        </tr>

        @foreach($categories as $category)
            <tr class="record">
                <td class="record">
                    {{$category->id}}
                </td>
                <td>
                    {{$category->name}}
                </td>
                <td style="display: flex; justify-content: space-around">
                    <a href="#">
                        <i class="bi bi-magic"></i>
                    </a><br>
                    <a href="#">
                        <i class="bi bi-x"></i>
                    </a><br>
                </td>
            </tr>
        @endforeach
</section>
