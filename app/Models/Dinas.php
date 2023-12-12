<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'start', 'end'];
    protected $casts = [
        'perjalanan_dinas' => 'boolean'
    ];
    public function pegawai()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
