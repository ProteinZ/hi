<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
@csrf

Tên: <input type="text" name="name"><br>

Danh mục cha:
<select name="parent_id">
    <option value="">-- None --</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select><br>

Ảnh: <input type="file" name="image"><br>

<button type="submit">Lưu</button>
</form>
