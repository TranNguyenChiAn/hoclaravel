@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="width:80%; margin-left: 240px">
    <div class="row g-3">
        <figure align="center" style="font-weight: bold; font-size: 30px;color: #4d4b4b;"> Add a category </figure>
        <form class="row g-3 bg-white" method="POST" action="{{route('admin.storeProduct')}}">
            @method('POST')
            @csrf
            <input type="hidden" name="id">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="product_name" placeholder="Product name">
            </div>
            <div class="col-md-6">
                <label class="form-label">Material</label>
                <input type="text" class="form-control" name="product_material" placeholder="Product material">
            </div>
            <div class="col-md-6">
                <label class="form-label">Size</label>
                <input type="text" class="form-control" name="product_size" placeholder="Product size">
            </div>
            <div class="col-md-6">
                <label class="form-label">Color</label>
                <input type="text" class="form-control" name="product_color" placeholder="Product color">
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="product_description" placeholder="Product description">
            </div>
            <div class="col-md-6">
                <label for="inputCategory" class="form-label">Category</label>
                <select id="inputCategory" class="form-select">
                    <option selected>Choose...</option>
                    @foreach($categories as $category)
                        <option value="<?= $category->id ?>">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputBrand" class="form-label">Brand</label>
                <select id="inputBrand" class="form-select">
                    <option selected>Choose...</option>
                    @foreach($brands as $brand)
                        <option value="<?= $brand->id ?>">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>

            </select><br>
            <div class="col-md-6">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="product_price" placeholder="Product price">
            </div>
            <div class="col-md-6">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" name="product_quantity" placeholder="Product quantity">
            </div>
            <div class="col-md-6">
                Image: <input type="file" class="form-control" name="product_image" id="imageFile"
                              onchange="chooseFile(this)"
                              accept="image/gif, image/png, image/jpeg">
                <img src="" alt="" id="image" width="100px" >
            </div>
            <div class="col-md-8">
                <button class="btn btn-primary" type="submit"> Add </button>
            </div>
        </form>
    </div>
</section>

<script>
    function chooseFile(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>
