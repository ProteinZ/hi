<form action="/save-age" method="POST">
    @csrf
    Nhập tuổi: <input type="text" name="age">
    <button type="submit">Lưu</button>
</form>
