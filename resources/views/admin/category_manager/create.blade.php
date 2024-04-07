@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<title> Create category</title>
<br>
<h1 align="center" style="font-weight: bold;font-family: Arial; color: #2f2ffe;"> Add a category </h1>

<section style="margin:60px 3% auto 20%">
    <div class="row-cols-auto form-control bg-white" >
        <form class="form-control border-0 bg-white p-4" method="post"
              action="{{route('category.store')}}">
            @method('POST')
            @csrf
            <input type="hidden" name="id">
            <label class="form-label" style="color: #2f2ffe; font-size: 24px"> Add category name</label>
            <br>
            <br>
            @if($errors -> has('name'))
                <div class="">
                    <span class="text-danger"> {{ $errors -> first('name') }} </span>
                </div>
            @endif
            <div class="col-md-5">
                <input type="text" class="form-control" style=" font-size: 20px" name="name"
                       placeholder="Category name" value="{{old('name')}}">
            </div>
            <br>
            <button class="btn float-end text-white" type="submit"
                    style=" font-size: 20px; background-color: #2f2ffe">
                Add
            </button>
        </form>
        <br>
    </div>
</section>


