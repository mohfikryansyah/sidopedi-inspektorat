<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'laporan'];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
