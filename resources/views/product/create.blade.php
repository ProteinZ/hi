<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
@csrf

Tên: <input type="text" name="name"><br>

Danh mục:
<select name="category_id">
    <option value="">--None--</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select><br>

Giá: <input type="number" name="price"><br>
Giá giảm: <input type="number" name="sale_price"><br>
Stock: <input type="number" name="stock"><br>

Ảnh: <input type="file" name="image"><br>

<button type="submit">Lưu</button>
</form>
