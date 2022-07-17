<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\DonHangChiTiet;
use App\Models\TinhTrang;
use Illuminate\Http\Request;


class DonHangController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getDanhSach()
	{
		$donhang = DonHang::orderBy('created_at', 'desc')->get();
		return view('admin.donhang.danhsach', compact('donhang'));
	}

	public function getDoanhThu()
	{
		$donhangchitiet = DonHangChiTiet::all();
		$doanhthu = 0;
		foreach($donhangchitiet as $value)
		{
		$doanhthu = ($value->dongiaban * $value->soluongban) + $doanhthu;
		}
		return view('admin.doanhthu.danhsach', compact('donhangchitiet', 'doanhthu'));
	}
	
	public function getThem()
	{
		// Đặt hàng bên Front-end
	}
	
	public function postThem(Request $request)
	{
		// Xử lý đặt hàng bên Front-end
	}
	
	public function getSua($id)
	{
		$donhang = DonHang::find($id);
		$tinhtrang = TinhTrang::all();
		return view('admin.donhang.sua', compact('donhang', 'tinhtrang'));
	}
	
	public function postSua(Request $request, $id)
	{
		$this->validate($request, [
			'tinhtrang_id' => ['required'],
			'dienthoaigiaohang' => ['required', 'string', 'max:20'],
			'diachigiaohang' => ['required', 'string', 'max:191'],
		]);
		
		$orm = DonHang::find($id);
		$orm->tinhtrang_id = $request->tinhtrang_id;
		$orm->dienthoaigiaohang = $request->dienthoaigiaohang;
		$orm->diachigiaohang = $request->diachigiaohang;
		$orm->save();
		
		return redirect()->route('admin.donhang');
	}
	
	public function getXoa($id)
	{
		$orm = DonHang::find($id);
		$orm->delete();
		
		$chitiet = DonHangChiTiet::where('donhang_id', $orm->id)->first();
		$chitiet->delete();
		
		return redirect()->route('admin.donhang');
	}
}
