<a href="{{ route('category.create') }}">Thêm mới</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Parent</th>
    <th>Action</th>
</tr>

@foreach($categories as $cat)
<tr>
    <td>{{ $cat->id }}</td>
    <td>{{ $cat->name }}</td>
    <td>{{ optional($cat->parent)->name }}</td>
    <td>
        <a href="{{ route('category.edit', $cat->id) }}">Sửa</a>
        <a href="{{ route('category.delete', $cat->id) }}">Xóa</a>
    </td>
</tr>
@endforeach
</table>
