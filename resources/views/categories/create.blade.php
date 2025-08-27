<div class="foamcontainer">

    <div class="heading">
        @if(request()->parent_id)
            <h2>Create Subcategory</h2>
        @else
            <h2>Create Category</h2>
        @endif
    </div>

    <div class="foammethod">
        <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" required placeholder="Enter category name">
            </div>

            <!-- Slug -->
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" required placeholder="Enter slug">
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" rows="4" placeholder="Enter category description"></textarea>
            </div>

            <!-- Image -->
            <div class="form-group">
                <label>Image</label>
                <input class="image-input" type="file" id="imageInput" name="image" accept="image/*">
                <img id="output" width="150" style="display:none; margin-top:10px; border-radius:8px; border:1px solid #ccc; padding:5px;" />
            </div>

            <!-- Hidden parent_id -->
            <input type="hidden" name="parent_id" value="{{ request()->parent_id }}">

            <!-- Submit -->
            <button type="submit">Save</button>

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

<!-- jQuery for Image Preview -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $("#imageInput").on("change", function(event){
        let reader = new FileReader();
        reader.onload = function(e){
            $("#output").attr("src", e.target.result).fadeIn();
        }
        reader.readAsDataURL(event.target.files[0]);
    });
});
</script>

<!-- Refined CSS -->
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
    max-width: 500px;
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
textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    transition: 0.2s all;
}

input[type="text"]:focus,
textarea:focus {
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
}

button:hover {
    background-color: #0056b3;
}

.image-input {
    display: block;
    padding: 8px 10px;
    border: 2px solid #ddd;
    border-radius: 6px;
    background-color: #f9f9f9;
    cursor: pointer;
    width: 100%;
    max-width: 300px;
    font-size: 14px;
}

.image-input:hover {
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
