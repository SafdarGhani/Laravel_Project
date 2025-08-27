<div class="foamcontainer">

   {{-- <a href="{{ route('products.index') }}">Back to Products</a> --}}

<div class="foammethod">
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" required>
    <br><br>
    <label for="slug">Slug</label>
    <input type="text" name="slug" required>
    <br><br>
    <label for="description">Description</label>
    <textarea name="description" rows="4" cols="40" placeholder="Enter product description"></textarea>
     <br><br>

     <label for="price">Price</label>
    <input type="number" name="price" step="0.01" required>
    <br><br>

    <label for="stock">Stock</label>
    <input type="number" name="stock" required>
    <br><br>

    <label>Image</label>
    <input class="image-input" type="file" id="imageInput" name="image" accept="image/*">
    <br><br>
     <!-- Image Preview Box -->
    <img id="output" width="150" style="display:none; border:2px solid #ccc; padding:10px;" />
    <br><br>

    {{-- Drop Down --}}
    <div class="category-wrapper">
     <select name="category_id[]" id="category_id">
         <option value="{{route('products.create')}}">None</option>
         @foreach ($categories as $category)
             <option value="{{ $category->id }}">{{ $category->name }}</option>
            @foreach ($category->children as $sub_category)
                <option value="{{ $sub_category->id }}"> ---- {{ $sub_category->name }}</option>
            @endforeach
         @endforeach
     </select>
    </div>
    <br>

    <button type="button" id="clone-btn">More Category</button>
     <br><br>

    <input type="hidden" name="parent_id" value="{{ request()->parent_id }}">
    <button type="submit">Save</button>

      {{-- its shows error message when user violates validation --}}
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li style="color: red">{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    </div>  
</form>

</div>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $("#imageInput").on("change", function(event){
        let reader = new FileReader();
        reader.onload = function(e){
            $("#output").attr("src", e.target.result).show();
        }
        reader.readAsDataURL(event.target.files[0]);
    });
});
</script>



{{-- CSS Style --}}
<style>
   body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    margin: 0;
    padding: 20px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 6px;
}

label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea,
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 8px 14px;
    border: none;
    border-radius: 4px;
    background: #007bff;
    color: #fff;
    cursor: pointer;
}

button:hover {
    background: #0056b3;
}

#clone-btn {
    background: #28a745;
    margin-bottom: 12px;
}

#clone-btn:hover {
    background: #1e7e34;
}

.image-input {
    margin-bottom: 12px;
}

.alert {
    margin-top: 10px;
    padding: 10px;
    background: #ffe0e0;
    border: 1px solid #ff5c5c;
    border-radius: 4px;
}

.alert ul {
    margin: 0;
    padding-left: 20px;
    color: #d8000c;
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $("#clone-btn").on("click", function () {
        var firstChild = $(".category-wrapper").children().first().clone();

        $(".category-wrapper").append(firstChild);
    });
});

</script>