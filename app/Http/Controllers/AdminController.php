<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getHome()
	{
		return view('admin.index');
	}
	public function search(Request $request) 
	{
		$keywords=$request->keywords_submit;

		$search_sanpham= sanpham::where('tensanpham','like','%'.$keywords.'%')->orWhere('dongia',$keywords)->get();
		return view('admin.sanpham.search', compact('search_sanpham'));
	}
}