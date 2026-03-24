<form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
@csrf

Tên: <input type="text" name="name" value="{{ $category->name }}"><br>

Danh mục cha:
<select name="parent_id">
    <option value="">-- None --</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}"
            {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select><br>

<button type="submit">Update</button>
</form>
