<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DokumenPengganti extends Pivot
{
    use HasFactory;

    protected $table = 'dokumen_pengganti';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id_dok_diganti',
        'id_dok_pengganti',
        'kode_pergantian'
    ];

    public function statusPergantian(){
        return $this->belongsTo(StatusPergantian::class, 'kode_pergantian', 'kode_pergantian');
    }
}
