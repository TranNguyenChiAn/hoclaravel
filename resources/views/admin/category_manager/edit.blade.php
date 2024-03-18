{{--@vite(["resources/sass/app.scss", "resources/js/app.js"])--}}
{{--@include('admin/layout/nav')--}}

{{--<section style="margin-left: 224px">--}}
{{--    <div>--}}
{{--        <figure align="center" style="font-weight: bold; font-size: 30px;color: #4d4b4b;"> UPDATE </figure>--}}
{{--        <form method="post" class="row-cols-sm-3 form-control"
action="{{ route('category.update', $category)}}">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}
{{--            <input type="hidden" name="id" value="{{ $category->id}}">--}}
{{--            <div class="col-6">--}}
{{--                <label class="form-label">Name</label>--}}
{{--                <input class="form-control" type="text" name="name" value="{{ $category->name }}"><br>--}}
{{--            </div>--}}
{{--            <div class="w-75 d-flex justify-content-end">--}}
{{--                <button class="btn btn-primary col-2" type="submit">Update</button>--}}
{{--            </div>--}}

{{--        </form>--}}
{{--    </div>--}}
{{--</section>--}}

@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<h1 align="center" style="font-weight: bold;font-family: Arial; color: #2f2ffe;"> UPDATE </h1>

<section style="margin:60px 3% auto 20%">
    <div class="row-cols-auto form-control bg-white" >
        <form class="form-control border-0 bg-white p-4" method="post"
              action="{{route('category.update', $category)}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id">
            <div class="col-md-6">
                <label class="form-label" style="color: #2f2ffe; font-size: 26px"> Edit category name</label>
                <br>
                <br>
                <input type="hidden" name="id" value="{{ $category->id}}">
                <input type="text" class="form-control"
                       style=" font-size: 22px" name="name"
                       placeholder="Category name" value="{{ $category->name}}">
            </div>
            <br>
            <button class="btn btn-primary float-end " type="submit"
                    style=" font-size: 22px">
                Update
            </button>
        </form>
        <br>
    </div>
</section>



