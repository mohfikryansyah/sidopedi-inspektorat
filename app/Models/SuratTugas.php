<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'surat_tugas', 'judul'];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
