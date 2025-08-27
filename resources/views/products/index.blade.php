<h2>All Added Products</h2>

<div class="table-container">
    <div class="button-wrap">
        <a href="{{ route('products.create') }}" class="btn-add">Add New Product</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Categories</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th colspan="2" style="text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    @foreach ($product->categories as $category)
                        {{ $category->name }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image"></td>

                <td class="actions-cell">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn-action">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>

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

.table-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.button-wrap {
    text-align: right;
    margin-bottom: 15px;
}

.btn-add {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    transition: background 0.3s ease;
}

.btn-add:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    vertical-align: middle;
}

th {
    background-color: #f9f9f9;
    font-weight: 600;
}

tr:hover {
    background-color: #f1f1f1;
}

.product-image {
    width: 100px;
    border-radius: 6px;
    object-fit: cover;
}

.actions-cell {
    display: flex;
    gap: 10px;
    justify-content: center;
    align-items: center;
    border-left: none;
    border-right: none;
    border-bottom: none;
}

.btn-action {
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    background-color: #f1f1f1;
    border: 1px solid #ccc;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.3s ease;
}

.btn-action:hover {
    background-color: #e2e2e2;
}

.btn-delete {
    background-color: #e74c3c;
    color: #fff;
    border: none;
}

.btn-delete:hover {
    background-color: #c0392b;
}
</style>
