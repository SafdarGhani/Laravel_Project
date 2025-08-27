<div class="form-container">

   <div class="heading">
     <h2>Update Category</h2>
   </div>

   <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PUT')

       <label for="name">Category Name</label>
       <input type="text" name="name" value="{{ $category->name }}" required>

       <label for="slug">Category Slug</label>
       <input type="text" name="slug" value="{{ $category->slug }}" required>

       <label for="description">Category Description</label>
       <textarea name="description" rows="4" placeholder="Enter category description">{{ $category->description }}</textarea>

       <label for="imageInput">Category Image</label>
       <input type="file" id="imageInput" name="image" accept="image/*">
       
       <!-- Image Preview Box -->
       <img id="output" width="150" style="display:none;" />

       <button type="submit">Update</button>

       <!-- Validation Errors -->
       @if($errors->any())
       <div class="alert">
           <ul>
               @foreach($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
       @endif
   </form>

</div>

<!-- jQuery for image preview -->
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

<style>
/* General Body Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    color: #333;
}

h2 {
    text-align: center;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 25px;
}

/* Form Container */
.form-container {
    max-width: 500px;
    margin: 0 auto;
}

/* Form Styling */
form {
    background: linear-gradient(to right, #f0f0f0, #ffffff);
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
textarea:focus {
    border-color: #007bff;
    outline: none;
}

/* File Input */
#imageInput {
    display: block;
    padding: 8px;
    border: 2px solid #ddd;
    border-radius: 6px;
    background-color: #f9f9f9;
    cursor: pointer;
    width: 100%;
    max-width: 300px;
    transition: border-color 0.3s, background-color 0.3s;
}

#imageInput:hover {
    border-color: #007bff;
    background-color: #eef5ff;
}

/* Image Preview */
#output {
    margin-top: 10px;
    border: 2px solid #ccc;
    padding: 10px;
    border-radius: 6px;
    display: block;
}

/* Submit Button */
button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

/* Validation Errors */
.alert {
    margin-top: 15px;
    padding: 10px;
    background-color: #fdecea;
    border: 1px solid #f5c6cb;
    border-radius: 6px;
}

.alert ul {
    margin: 0;
    padding-left: 20px;
}

.alert li {
    color: #a94442;
}
</style>
