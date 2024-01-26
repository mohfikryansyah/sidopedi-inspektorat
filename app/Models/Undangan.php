<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Undangan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['judul', 'undangan', 'dibuat_pada'];

    public static function hariIni()
    {
        self::create([
            'waktu' => Carbon::now()->format('Y-m-d H:i:s'), // Format timestamp
        ]);
    }

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
