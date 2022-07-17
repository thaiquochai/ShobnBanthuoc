<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\DonHang;
use App\Mail\DatHangEmail;
use App\Models\DonHangChiTiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Cart;
use Auth;
class HomeController extends Controller
{
	public function getHome()
	{
		$sanpham = SanPham::where('hienthi', 1)->paginate(20);
		return view('frontend.index', compact('sanpham'));
	}
	
	public function getSanPham($id)
	{
		$danhmucsanpham = SanPham::where('loaisanpham_id', $id)
			->orderBy('created_at', 'desc')->get();
		return view('frontend.sanpham', compact('danhmucsanpham'));
	}
	
	public function getSanpham_ChiTiet($tenloai_slug, $tensanpham_slug)
	{
		$loaisanpham_chitiet = LoaiSanPham::where('tenloai_slug', $tenloai_slug)
			->orderBy('created_at', 'desc')->get();

		$sanpham_chitiet = SanPham::where('tensanpham_slug', $tensanpham_slug)
			->orderBy('created_at', 'desc')->get();

		return view('frontend.sanpham_chitiet', compact('sanpham_chitiet','loaisanpham_chitiet'));

	}
	
	public function getDangKy()
	{
		return view('frontend.dangky');
	}
	
	public function getDangNhap()
	{
		return view('frontend.dangnhap');
	}
	
	public function getGioHang()
	{
		if(Cart::count()>0)
			return view('frontend.giohang');
		else	
			return view('frontend.giohang_rong');	
		
	}
	
	public function getGioHang_Them($tensanpham_slug)
	{
		$sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
		
		Cart::add([
			'id'=> $sanpham->id ,
			'name'=> $sanpham->tensanpham,
			'price'=> $sanpham->dongia,
			'qty'=>1 ,
			'weight'=> 0,
			'options'=> [
				'image'=> $sanpham->hinhanh,
			]

		]);
		return redirect()->route('home');
	}
	
	public function getGioHang_Xoa($row_id)
	{
		Cart::remove($row_id);
		return redirect()->route('giohang');
	}
	 
	public function getGioHang_XoaTatCa()
	{
		Cart::destroy();
		return redirect()->route('giohang');
	}
	 
	 public function getGioHang_Giam($row_id)
	{
		$row = Cart::get($row_id);
		if($row->qty > 1)
		{
			Cart::update($row_id, $row->qty - 1);
		}
		return redirect()->route('giohang');
	}
	 
	 public function getGioHang_Tang($row_id)
	{
		$row = Cart::get($row_id);
		if($row->qty < 100)
		{
			Cart::update($row_id, $row->qty + 1);
		}
		return redirect()->route('giohang');
	}

	
	public function getDatHang()
	{
		return view('frontend.dathang');
	}
	public function postDatHang(Request $request)
	{
		$this->validate($request, [
		'diachigiaohang' => ['required', 'max:255'],
		'dienthoaigiaohang' => ['required', 'max:255'],
	]);
	 
		 // Lưu vào đơn hàng
		$dh = new DonHang();
		$dh->user_id = Auth::user()->id;
		$dh->tinhtrang_id = 1;
		$dh->diachigiaohang = $request->diachigiaohang;
		$dh->dienthoaigiaohang = $request->dienthoaigiaohang;
		$dh->save();
	 
	 // Lưu vào đơn hàng chi tiết
	foreach(Cart::content() as $value)
	{
		$ct = new DonHangChiTiet();
		$ct->donhang_id = $dh->id;
		$ct->sanpham_id = $value->id;
		$ct->soluongban = $value->qty;
		$ct->dongiaban = $value->price;
		$ct->save();
	}
	 
		return redirect()->route('dathangthanhcong');
	}
	 
	public function getDatHangThanhCong()
	{
		Cart::destroy();
		$datlich = DonHang::orderBy('id', 'DESC')->first();
		Mail::to(Auth::user()->email)->send(new DatHangEmail($datlich));
		return view('frontend.dathangthanhcong');
	}
	public function search(Request $request) 
	{
		$keywords=$request->keywords_submit;

		$search_sanpham= sanpham::where('tensanpham','like','%'.$keywords.'%')->orWhere('dongia',$keywords)->get();
		return view('frontend.search', compact('search_sanpham'));
	}
	public function postSanPham(Request $request)
	{
		if($request->sapxep == 'popularity') 
		{
			$sanpham = SanPham::leftJoin('donhangchitiet', 'sanpham.id', '=', 'donhangchitiet.sanpham_id')
			->selectRaw('sanpham.*, coalesce(sum(donhangchitiet.soluongban), 0) tongsoluongban')
			->groupBy('sanpham.id')
			->orderBy('tongsoluongban', 'desc')
			->paginate(999);
			
			session()->put('sapxep', 'popularity');
		}
		elseif($request->sapxep == 'date') 
		{
			$sanpham = SanPham::orderBy('created_at', 'desc')->paginate(999);
			session()->put('sapxep', 'date');
		}
		elseif($request->sapxep == 'price') 
		{
			$sanpham = SanPham::orderBy('dongia', 'asc')->paginate(999);
			session()->put('sapxep', 'price');
		}
		elseif($request->sapxep == 'price-desc') 
		{
			$sanpham = SanPham::orderBy('dongia', 'desc')->paginate(999);
			session()->put('sapxep', 'price-desc');
		}
		else
		{
			$sanpham = SanPham::paginate(999);
			session()->put('sapxep', 'default');
		}
			return view('frontend.index', compact('sanpham'));
	}
	
}