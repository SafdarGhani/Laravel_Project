<h2>{{ $title }}</h2>

<div class="table-container">
    <div class="button-wrap">
        <a href="{{ route('categories.create', ['parent_id' => $parentId]) }}" class="btn-add">
            @if($parentId == null)
                Add New Category
            @else
                Add New Subcategory
            @endif
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->slug }}</td>
                    <td>{{ $cat->description }}</td>
                    <td><img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->name }}" width="100"></td>
                    <td class="actions-cell">
                        @if($parentId == null)
                            <a href="{{ route('categories.show', $cat->id) }}" class="btn-action">View</a>
                        @endif

                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn-action">Edit</a>

                        <form action="{{ route('categories.destroy', $cat->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this category?');">
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
/* General Page Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    color: #333;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 28px;
    font-weight: 700;
}

/* Table Container */
.table-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

/* Add Button */
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
    border-radius: 5px;
    transition: background 0.3s ease;
}

.btn-add:hover {
    background-color: #0056b3;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
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

/* Actions Cell Styling */
.actions-cell {
    display: flex;
    gap: 10px;
    justify-content: center;
    align-items: center;
    border-left: none;
    border-right: none;
    border-bottom: none;
}

/* Action Buttons */
.btn-action {
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    background-color: #f1f1f1;
    border: 1px solid #ccc;
    cursor: pointer;
    transition: background 0.3s ease;
    font-size: 14px;
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

/* Table Images */
td img {
    border-radius: 5px;
    object-fit: cover;
}
</style>
