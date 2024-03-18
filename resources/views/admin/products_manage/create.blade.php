@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')


<section style="width:80%; margin-left: 240px">
    <div class="row g-3">
        <h1 align="center" style="font-weight: bold;color: #2f2ffe;"> Add a product </h1>
        <form class="row g-3 bg-white needs-validation"  style="padding: 24px 42px;font-size: 18px"
              method="POST" action="{{route('product.store')}}"
              enctype='multipart/form-data' novalidate>
            @method('POST')
            @csrf
            <input type="hidden" name="id">
            <div class="col-md-4">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name"
                       placeholder="Product name" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Size</label>
                <input type="text" class="form-control" name="size"
                       placeholder="Product size" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Pieces</label>
                <input type="number" class="form-control" name="pieces"
                       placeholder="Number of pieces" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Insiders points </label>
                <input type="number" class="form-control" name="insiders_points"
                       placeholder="Number of insiders points" required>
            </div>
            <div class="col-md-4">
                <label class="form-label"> Items </label>
                <input type="number" class="form-control" name="items"
                       placeholder="Number of items" required>
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="description"
                       placeholder="Product description" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id" required>
                    <option selected>Choose...</option>
                    @foreach($categories as $category)
                        <option value="<?= $category->id ?>">
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label  class="form-label">Age</label>
                <select class="form-select" name="age_id" required>
                    <option selected>Choose...</option>
                    @foreach($ages as $age)
                        <option value="<?= $age->id ?>">{{$age->name}}</option>
                    @endforeach
                </select>
            </div>

            </select><br>
            <div class="col-md-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price"
                       placeholder="Product price" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" name="quantity"
                       placeholder="Product quantity" required>
            </div>
            <div class="col-md-6">
                <br>
                <label class="form-label"> Image:</label>
                <input type="file" name="image" id="imageFile"
                       accept="image/*" onchange="chooseFile(this)" required>
                <div id="image" height="150px">
                </div><br>
            </div>
            <div class="col-md-8">
                <button class="btn btn-primary" type="submit"> Add </button>
            </div>
        </form>
    </div>
</section>

<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity() || ) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<script>
    let msg = '{{Session::get('alert')}}';
    let exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>


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

                document.getElementById('image').innerHTML = newImage.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }
</script>


