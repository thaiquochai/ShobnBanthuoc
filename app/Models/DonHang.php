<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
	protected $table = 'donhang';
 
	public function TinhTrang()
	{
		return $this->belongsTo(TinhTrang::class, 'tinhtrang_id', 'id');
	} 
	public function User()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	} 
	public function DonHangChiTiet()
	{
		return $this->hasMany(DonHangChiTiet::class, 'donhang_id', 'id');
	}
}
