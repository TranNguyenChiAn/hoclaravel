
<section class="main_content">
    <div class="form_change">
        <figure align="center" style="font-weight: bold; font-size: 30px;color: #4d4b4b;"> UPDATE </figure>
        <form>
        @foreach($categories as $category)
                <input type="hidden" name="id" value="{{'id'}}">
                Name: <input type="text" name="name" value=""><br>
        @endforeach
            <button class="btn update btn-primary">Update</button>
        </form>
    </div>
</section>
