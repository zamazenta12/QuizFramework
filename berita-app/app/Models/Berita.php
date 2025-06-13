<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'admin_id',
        'judul',
        'isi',
        'penulis',
        'foto',
    ];

    public function admin_id()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
