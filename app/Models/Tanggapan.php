<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $fillable = ['id','pengaduan_id', 'tgl_tanggapan', 'tanggapan', 'user_id'];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
