<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
	protected $table = 'loaisanpham';
		
		public function SanPham()
		{
			return $this->hasMany(SanPham::class, 'loaisanpham_id', 'id');
		}
}
