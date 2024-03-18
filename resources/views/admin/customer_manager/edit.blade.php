@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="margin-left: 224px">
    <div>
        <figure align="center" style="font-weight: bold; font-size: 30px;color: #4d4b4b;"> UPDATE </figure>
        <form method="post" class="row-cols-sm-3 form-control" action="{{ route('category.update', $category)}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $category->id}}">
            <div class="col-6">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="name" value="{{ $category->name }}"><br>
            </div>
            <div class="w-75 d-flex justify-content-end">
                <button class="btn btn-primary col-2" type="submit">Update</button>
            </div>

        </form>
    </div>
</section>
