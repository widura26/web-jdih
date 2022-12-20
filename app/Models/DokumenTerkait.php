<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenTerkait extends Model
{
    use HasFactory;

    protected $table = 'dokumen_terkait';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'id_dokumen_utama',
        'id_dokumen_terkait',
    ];
}
