<form method="GET">
    <input type="text" name="keyword" placeholder="Search...">

    <select name="category_id">
        <option value="">All</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>

    <button>Tìm</button>
</form>

<a href="{{ route('product.create') }}">Thêm</a>

<table border="1">
<tr>
    <th>Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Action</th>
</tr>

@foreach($products as $p)
<tr>
    <td>{{ $p->name }}</td>
    <td>{{ optional($p->category)->name }}</td>
    <td>{{ $p->price }}</td>
    <td>{{ $p->stock }}</td>
    <td>
        <a href="{{ route('product.edit', $p->id) }}">Edit</a>
        <a href="{{ route('product.delete', $p->id) }}">Delete</a>
    </td>
</tr>
@endforeach
</table>
