@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<h1 align="center" style="font-weight: bold;font-family: Arial; color: #2f2ffe;"> Add a category </h1>

<section style="margin:60px 3% auto 20%">
    <div class="row-cols-auto form-control bg-white" >
        <form class="form-control border-0 bg-white p-4" method="post"
              action="{{route('category.store')}}">
            @method('POST')
            @csrf
            <input type="hidden" name="id">
            <div class="col-md-6">
                <label class="form-label" style="color: #2f2ffe; font-size: 26px"> Add category name</label>
                <br>
                <br>
                <input type="text" class="form-control" style=" font-size: 22px" name="name"
                       placeholder="Category name">
            </div>
            <br>
            <button class="btn btn-primary float-end " type="submit"
                    style=" font-size: 22px">
                Add
            </button>
        </form>
        <br>
    </div>
</section>


