<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPergantian extends Model
{
    use HasFactory;

    protected $table = 'status_pergantian';
    protected $fillable = [

        'kode_pergantian',
        'nama_pergantian'
    ];

    public function dokumenPengganti(){
        return $this->hasMany(DokumenPengganti::class);
    }
}
