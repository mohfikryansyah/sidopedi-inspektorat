<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['undangan'];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
