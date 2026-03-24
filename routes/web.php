<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     //return view('welcome');
//     return 'Hello World!';

// });

Route::get('/', function () {
    return view('home');
});
Route::prefix('product')->group(function () {

    // URL: /product
    Route::get('/', function () {
        return view('product.index');
    })->name('product.index');

    // URL: /product/add
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    // URL: /product/{id}
    Route::get('/{id?}', function ($id = '123') {
        return "Product ID: " . $id;
    })->where('id', '[A-Za-z0-9]+');

});

Route::get('/sinhvien/{name?}/{mssv?}', function (
    $name = 'Nguyễn Văn Đức',
    $mssv = '0288667'
) {
    return "
        <h1>Thông tin sinh viên</h1>
        <p>Tên: $name</p>
        <p>MSSV: $mssv</p>
    ";
});

Route::get('/banco/{n}', function ($n) {
    return view('banco', compact('n'));
});

use App\Http\Controllers\AuthController;

Route::get('/signin', [AuthController::class, 'SignIn']);
Route::post('/check-signin', [AuthController::class, 'CheckSignIn'])
        ->name('check.signin');

Route::get('/age', function () {
    return view('age');
});

Route::post('/save-age', function (\Illuminate\Http\Request $request) {
    session(['age' => $request->age]);
    return redirect('/home');
});

Route::get('/home', function () {
    return "Chào mừng bạn đủ 18 tuổi!";
})->middleware('check.age');


use App\Http\Controllers\CategoryController;

Route::prefix('category')->name('category.')->group(function () {

    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');

});


