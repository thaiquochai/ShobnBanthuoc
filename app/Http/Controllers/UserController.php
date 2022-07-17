<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\DonHang;
use App\Models\DonHangChiTiet;
use App\Models\User;



class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getHome()
	{
		return view('user.index');
	}
	
	public function getDonHang()
	{
		$donhang = DonHang::where('user_id',Auth::user()->id)
		->orderBy('created_at', 'desc')->get();
		return view('user.donhang',compact('donhang'));
	}
	
	public function getDonHangChiTiet($id)
	{
		$donhangchitiet = DonHangChiTiet::where('donhang_id', $id)
			->orderBy('created_at', 'desc')->get();
		return view('user.donhangchitiet', compact('donhangchitiet'));
	}
	
	public function getMatKhau()
	{
		return view('user.doimatkhau');
	}
	
	public function getHoSo()
	{
		$nguoidung = User::where('id', Auth::user()->id)
			->orderBy('created_at', 'desc')->get();
		return view('user.hoso', compact('nguoidung'));
	}
	public function getSuaHoSo($id)
	{
		$nguoidung = User::find($id);
		return view('user.sua_hoso', compact('nguoidung'));
	}
	
	public function postSuaHoSo(Request $request)
	{
		$request->validate([
			'name' => ['required', 'string', 'max:100'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->id],
			'role' => ['required'],
			'password' => ['confirmed'],
		]);
		
		$orm = User::find($request->id);
		$orm->name = $request->name;
		$orm->username = Str::before($request->email, '@');
		$orm->email = $request->email;
		$orm->role = $request->role;
		if(!empty($request->password)) $orm->password = Hash::make($request->password);
		$orm->save();
		
		return redirect()->route('user.hoso');
	}
	public function getSearch(request $req)
	{
		$product = product::where('name','like','%'.$req->key.'%');
		return  view('user.search', compact('product'));
	}
	
}