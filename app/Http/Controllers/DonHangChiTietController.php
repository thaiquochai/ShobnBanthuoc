<?php

namespace App\Http\Controllers;

use App\Models\DonHangChiTiet;
use Illuminate\Http\Request;

class DonHangChiTietController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getDanhSach()
	{
		// Xử lý chung với DonHang
	}
	
	public function getThem()
	{
		// Xử lý chung với DonHang
	}
	
	public function postThem(Request $request)
	{
		// Xử lý chung với DonHang
	}
	
	public function getSua($id)
	{
		// Xử lý chung với DonHang
	}
	
	public function postSua(Request $request, $id)
	{
		// Xử lý chung với DonHang
	}
	
	public function getXoa($id)
	{
		// Xử lý chung với DonHang
	}
}