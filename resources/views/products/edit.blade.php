<div class="foamcontainer">

    <div class="heading">
        <h2>Update Product</h2>
    </div>

    <div class="foammethod">
        <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
        
            <label for="name">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required placeholder="Enter product name">
            </div>

            
        <div class="form-group">
                <label for="slug">Product Slug</label>
                <input type="text" name="slug" value="{{ $product->slug }}" required placeholder="Enter slug">
            </div>

            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea name="description" rows="4" placeholder="Enter product description">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" name="price" value="{{ $product->price }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="stock">Product Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}" required>
            </div>

            <div class="form-group">
                <label>Product Image</label>
                <input type="file" id="imageInput" name="image" accept="image/*">
                <img id="output" width="150" style="display:none; margin-top:10px; border-radius:8px; border:1px solid #ccc; padding:5px;" />
            </div>

            <!-- Dropdown -->
            <div class="category-wrapper form-group">
                <div class="category-item">
                    <select name="category_id[]" class="category-select">
                        <option value="">None</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @foreach ($category->children as $sub_category)
                                <option value="{{ $sub_category->id }}">----$sub_category->name }}</option>
                            @endforeach
                        @endforeach
                    </select>
                    <button type="button" id="clone-btn" class="clone-btn">Add Category</button>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit">Update Product</button>

            <!-- Validation Errors -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </form>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Image preview
    $("#imageInput").on("change", function(event){
        let reader = new FileReader();
        reader.onload = function(e){
            $("#output").attr("src", e.target.result).fadeIn();
        }
        reader.readAsDataURL(event.target.files[0]);
    });

    // Clone category selector
    $("#clone-btn").on("click", function () {
        let clone = $(".category-item").first().clone();
        clone.find("select").val(""); // reset selection
        $(".category-wrapper").append(clone);
    });
});
</script>

<!-- CSS -->
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7f9;
    margin: 0;
    padding: 20px;
}

.heading h2 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
    font-size: 26px;
    font-weight: bold;
}

.foammethod form {
    max-width: 600px;
    margin: 0 auto;
    padding: 30px 25px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: 0.3s all;
}

.foammethod form:hover {
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #555;
}

input[type="text"],
input[type="number"],
textarea,
select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    transition: 0.2s all;
}

input[type="text"]:focus,
input[type="number"]:focus,
textarea:focus,
select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0,123,255,0.2);
}

button {
    padding: 12px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: 0.3s all;
    width: 100%;
    margin-top: 10px;
}

button:hover {
    background-color: #0056b3;
}

.clone-btn {
    width: auto;
    margin-top: 10px;
    margin-left: 0;
    padding: 6px 12px;
    background-color: #28a745;
}

.clone-btn:hover {
    background-color: #1e7e34;
}

.category-item {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-bottom: 10px;
}

#imageInput {
    display: block;
    padding: 8px;
    border: 2px solid #ddd;
    border-radius: 6px;
    background-color: #f9f9f9;
    cursor: pointer;
    max-width: 300px;
}

#imageInput:hover {
    border-color: #007bff;
    background-color: #eef5ff;
}

.alert {
    margin-top: 15px;
    padding: 12px;
    background-color: #ffe0e0;
    border-left: 4px solid #ff5c5c;
    border-radius: 5px;
}

.alert ul {
    margin: 0;
    padding-left: 20px;
    color: #d8000c;
}
</style>
