<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\HangSanXuatController;
use App\Http\Controllers\TinhTrangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\DonHangChiTietController;
use App\Http\Controllers\NguoiDungController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	Auth::routes();

	// Trang chủ Front-end
	Route::get('/', [HomeController::class, 'getHome'])->name('home');
	//tìm kiếm
	Route::post('/search', [HomeController::class, 'search'])->name('timkiem');
	Route::get('/mail', [HomeController::class, 'getDatHangDemo']);

	// Trang sản phẩm
	Route::get('/sanpham', [HomeController::class, 'getSanPham'])->name('sanpham');
	Route::post('/san-pham', [HomeController::class, 'postSanPham'])->name('frontend.sanpham');
	Route::get('/sanpham/{id}', [HomeController::class, 'getSanPham'])->name('sanpham.danhmuc');
	Route::get('/sanpham/{tenloai_slug}/{tensanpham_slug}', [HomeController::class, 'getSanPham_ChiTiet'])->name('sanpham.chitiet');
	
	// Trang giỏ hàng
	Route::get('/giohang', [HomeController::class, 'getGioHang'])->name('giohang');
	Route::get('/giohang/them/{tensanpham_slug}', [HomeController::class, 'getGioHang_Them'])->name('giohang.them');
	Route::get('/giohang/xoa', [HomeController::class, 'getGioHang_XoaTatCa'])->name('giohang.xoatatca');
	Route::get('/giohang/xoa/{row_id}', [HomeController::class, 'getGioHang_Xoa'])->name('giohang.xoa');
	Route::get('/giohang/giam/{row_id}', [HomeController::class, 'getGioHang_Giam'])->name('giohang.giam');
	Route::get('/giohang/tang/{row_id}', [HomeController::class, 'getGioHang_Tang'])->name('giohang.tang');

	// Trang đặt hàng
	Route::get('/dathang', [HomeController::class, 'getDatHang'])->name('dathang');
	Route::post('/dathang', [HomeController::class, 'postDatHang'])->name('dathang');
	Route::get('/dathangthanhcong', [HomeController::class, 'getDatHangThanhCong'])->name('dathangthanhcong');

	// Trang khách hàng
	Route::get('/dangky', [HomeController::class, 'getDangKy'])->name('dangky');
	Route::get('/dangnhap', [HomeController::class, 'getDangNhap'])->name('dangnhap');

	// Trang tài khoản khách hàng
	Route::prefix('user')->name('user.')->group(function() {
	// Trang chủ tài khoản khách hàng
	Route::get('/', [UserController::class, 'getHome'])->name('home');
	
	// Xem và cập nhật trạng thái đơn hàng
	Route::get('/donhang', [UserController::class, 'getDonHang'])->name('donhang');
	Route::get('/donhang/{id}', [UserController::class, 'getDonHangChiTiet'])->name('donhangchitiet');
	Route::post('/donhang/{id}', [UserController::class, 'postDonHangChiTiet'])->name('donhangchitiet');
	
	// Xem và cập nhật mật khẩu
	Route::get('/matkhau', [UserController::class, 'getMatKhau'])->name('matkhau');
	Route::post('/matkhau', [UserController::class, 'postMatKhau'])->name('matkhau');
	
	// Xem và cập nhật thông tin tài khoản
	Route::get('/hoso', [UserController::class, 'getHoSo'])->name('hoso');
    Route::get('/sua_hoso/{id}', [UserController::class, 'getSuaHoSo'])->name('sua_hoso');
    Route::post('/sua_hoso/{id}', [UserController::class, 'postSuaHoSo'])->name('sua_hoso');
});
	
	// Trang quản trị
	Route::prefix('admin')->name('admin.')->group(function() {
	// Trang chủ quản trị
	Route::post('/search', [AdminController::class, 'search'])->name('timkiem');
	Route::get('/', [AdminController::class, 'getHome'])->name('home');

	
	// Quản lý Loại sản phẩm
	Route::get('/loaisanpham', [LoaiSanPhamController::class, 'getDanhSach'])->name('loaisanpham');
	Route::get('/loaisanpham/them', [LoaiSanPhamController::class, 'getThem'])->name('loaisanpham.them');
	Route::post('/loaisanpham/them', [LoaiSanPhamController::class, 'postThem'])->name('loaisanpham.them');
	Route::get('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'getSua'])->name('loaisanpham.sua');
	Route::post('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'postSua'])->name('loaisanpham.sua');
	Route::get('/loaisanpham/xoa/{id}', [LoaiSanPhamController::class, 'getXoa'])->name('loaisanpham.xoa');
	
	// Quản lý Hãng sản xuất
	Route::get('/hangsanxuat', [HangSanXuatController::class, 'getDanhSach'])->name('hangsanxuat');
	Route::get('/hangsanxuat/them', [HangSanXuatController::class, 'getThem'])->name('hangsanxuat.them');
	Route::post('/hangsanxuat/them', [HangSanXuatController::class, 'postThem'])->name('hangsanxuat.them');
	Route::get('/hangsanxuat/sua/{id}', [HangSanXuatController::class, 'getSua'])->name('hangsanxuat.sua');
	Route::post('/hangsanxuat/sua/{id}', [HangSanXuatController::class, 'postSua'])->name('hangsanxuat.sua');
	Route::get('/hangsanxuat/xoa/{id}', [HangSanXuatController::class, 'getXoa'])->name('hangsanxuat.xoa');
	Route::post('/hangsanxuat/nhap', [HangSanXuatController::class, 'postNhap'])->name('hangsanxuat.nhap');
	Route::get('/hangsanxuat/xuat', [HangSanXuatController::class, 'getXuat'])->name('hangsanxuat.xuat');
	
	// Quản lý Tình trạng đơn hàng
	Route::get('/tinhtrang', [TinhTrangController::class, 'getDanhSach'])->name('tinhtrang');
	Route::get('/tinhtrang/them', [TinhTrangController::class, 'getThem'])->name('tinhtrang.them');
	Route::post('/tinhtrang/them', [TinhTrangController::class, 'postThem'])->name('tinhtrang.them');
	Route::get('/tinhtrang/sua/{id}', [TinhTrangController::class, 'getSua'])->name('tinhtrang.sua');
	Route::post('/tinhtrang/sua/{id}', [TinhTrangController::class, 'postSua'])->name('tinhtrang.sua');
	Route::get('/tinhtrang/xoa/{id}', [TinhTrangController::class, 'getXoa'])->name('tinhtrang.xoa');
	
	// Quản lý Sản phẩm
	Route::get('/sanpham', [SanPhamController::class, 'getDanhSach'])->name('sanpham');
	Route::get('/sanpham/them', [SanPhamController::class, 'getThem'])->name('sanpham.them');
	Route::post('/sanpham/them', [SanPhamController::class, 'postThem'])->name('sanpham.them');
	Route::get('/sanpham/sua/{id}', [SanPhamController::class, 'getSua'])->name('sanpham.sua');
	Route::post('/sanpham/sua/{id}', [SanPhamController::class, 'postSua'])->name('sanpham.sua');
	Route::get('/sanpham/xoa/{id}', [SanPhamController::class, 'getXoa'])->name('sanpham.xoa');
	Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap');
	Route::get('/sanpham/xuat', [SanPhamController::class, 'getXuat'])->name('sanpham.xuat');
	
	// Quản lý Đơn hàng
	Route::get('/donhang', [DonHangController::class, 'getDanhSach'])->name('donhang');
	Route::get('/donhang/them', [DonHangController::class, 'getThem'])->name('donhang.them');
	Route::post('/donhang/them', [DonHangController::class, 'postThem'])->name('donhang.them');
	Route::get('/donhang/sua/{id}', [DonHangController::class, 'getSua'])->name('donhang.sua');
	Route::post('/donhang/sua/{id}', [DonHangController::class, 'postSua'])->name('donhang.sua');
	Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getXoa'])->name('donhang.xoa');
	
	// Quản lý Đơn hàng chi tiết
	Route::get('/donhangchitiet', [DonHangChiTietController::class, 'getDanhSach'])->name('donhangchitiet');
	Route::get('/donhangchitiet/sua/{id}', [DonHangChiTietController::class, 'getSua'])->name('donhangchitiet.sua');
	Route::post('/donhangchitiet/sua/{id}', [DonHangChiTietController::class, 'postSua'])->name('donhangchitiet.sua');
	Route::get('/donhangchitiet/xoa/{id}', [DonHangChiTietController::class, 'getXoa'])->name('donhangchitiet.xoa');
	
	// Quản lý Tài khoản người dùng
	Route::get('/nguoidung', [NguoiDungController::class, 'getDanhSach'])->name('nguoidung');
	Route::get('/nguoidung/them', [NguoiDungController::class, 'getThem'])->name('nguoidung.them');
	Route::post('/nguoidung/them', [NguoiDungController::class, 'postThem'])->name('nguoidung.them');
	Route::get('/nguoidung/sua/{id}', [NguoiDungController::class, 'getSua'])->name('nguoidung.sua');
	Route::post('/nguoidung/sua/{id}', [NguoiDungController::class, 'postSua'])->name('nguoidung.sua');
	Route::get('/nguoidung/xoa/{id}', [NguoiDungController::class, 'getXoa'])->name('nguoidung.xoa');

	Route::get('/doanhthu', [DonHangController::class, 'getDoanhThu'])->name('doanhthu');
});