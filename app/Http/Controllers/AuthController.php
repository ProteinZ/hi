<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function SignIn()
    {
        return view('signin');
    }

    public function CheckSignIn(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $repass   = $request->repass;
        $mssv     = $request->mssv;
        $lop      = $request->lopmonhoc;
        $gioitinh = $request->gioitinh;

        if (
            $username == 'ducnguyen' &&
            $password == '123456' &&
            $repass == '123456' &&
            $mssv == '0288667' &&
            $lop == '67pm2' &&
            $gioitinh == 'nam'
        ) {
            return "Đăng ký thành công!";
        }

        return "Đăng ký thất bại";
    }
}
