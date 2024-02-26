@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="margin-left: 224px">
    <div class="form-control" >
        <figure align="center" style="font-weight: bold; font-size: 30px;color: #4d4b4b;"> Add a category </figure>
        <form method="post" action="{{route('admin.storeCategory')}}">
            @method('POST')
            @csrf
            <input type="hidden" name="id">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="category_name" placeholder="Category name">
            </div>
            <br>
            <div class="col-md-6">
                <button class="btn btn-primary" type="submit"> Add </button>
            </div>
        </form>
    </div>
</section>


