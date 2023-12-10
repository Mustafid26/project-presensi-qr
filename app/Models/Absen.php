<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pengurus()
    {
        return $this->hasOne(Pengurus::class, 'link_ig', 'ig_sudah_absen');
    }
}
