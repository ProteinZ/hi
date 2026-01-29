<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
</head>
<body>
<h2>Đăng ký tài khoản</h2>

<form action="{{ route('check.signin') }}" method="POST">
    @csrf
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    Repass: <input type="password" name="repass"><br><br>
    MSSV: <input type="text" name="mssv"><br><br>
    Lớp môn học: <input type="text" name="lopmonhoc"><br><br>
    Giới tính:
    <select name="gioitinh">
        <option value="nam">Nam</option>
        <option value="nu">Nữ</option>
    </select><br><br>

    <button type="submit">Sign In</button>
</form>
</body>
</html>
