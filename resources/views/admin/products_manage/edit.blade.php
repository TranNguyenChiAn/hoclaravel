@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<title> Edit product </title>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    function chooseFile() {
        let fileSelected = document.getElementById('imageFile').files;
        if (fileSelected.length > 0) {
            let fileToLoad = fileSelected[0];
            let fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
                let srcData = fileLoaderEvent.target.result;
                let newImage = document.createElement('img');
                newImage.src = srcData;

                document.getElementById('imageUpload').innerHTML = newImage.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }
</script>

<section style="width:80%; margin-left: 240px">
    <br>
    <h1 align="center" style="font-weight: bold;color: #2F2FFE;font-family: Inter">
        Edit product
    </h1>
    <div class="row g-3">
        <form class="row g-3 bg-white" style="padding: 18px 42px"
              method="POST" action="{{route('product.update', $product)}}"
              enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id">
            <div class="col-md-4">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name"
                       placeholder="Product name" value="{{ $product->name }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Size</label>
                <input type="text" class="form-control" name="size"
                       placeholder="Product size" value="{{ $product->size }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Pieces</label>
                <input type="number" class="form-control" name="pieces"
                       placeholder="Product size" value="{{ $product->pieces }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Insiders Points</label>
                <input type="number" class="form-control" name="insiders_points"
                       placeholder="Product size" value="{{ $product->insiders_points }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Item</label>
                <input type="number" class="form-control" name="items"
                       placeholder="Product size" value="{{ $product->items }}">
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="description"
                       placeholder="Product description" value="{{ $product->description }}">
            </div>
            <div class="col-md-3">
                <label for="inputCategory" class="form-label">Category</label>
                <select id="inputCategory" class="form-select" name="category_id">
                    <option disabled selected> -- Choose -- </option>
                    @foreach($categories as $category)
                        <option value="<?= $category->id ?>"
                            @if($product->category_id == $category->id)
                            {{ 'selected' }}
                            @endif>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Age</label>
                <select class="form-select" name="age_id">
                    <option disabled selected> -- Choose -- </option>
                    @foreach($ages as $age)
                        <option value="<?= $age->id ?>"
                        @if($product->age_id == $age->id)
                            {{ 'selected' }}
                            @endif>
                            {{$age->name}}+
                        </option>
                    @endforeach
                </select>
            </div>

            </select><br>
            <div class="col-md-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price"
                       placeholder="Product price" value="{{ $product->price }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" name="quantity"
                       placeholder="Product quantity" value="{{ $product->quantity }}">
            </div>
            <div class="col-md-6">
                <label class="form-label"> Image:</label>
                <input type="file" class="form-control" name="image" id="imageFile"
                       accept="image/*" onchange="chooseFile(this)">
                <style>
                    #imageUpload img {
                        height: 180px;
                    }
                </style>
                <div id="imageUpload">
                    <img src="{{ asset('./images/' . $product->image) }}">
                </div>
            </div>
            <div class="col-md-10">
                <button class="btn btn-primary float-end" type="submit"> Update </button>
            </div>
        </form>
    </div>
</section>

