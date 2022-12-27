<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = "dokumen";
    protected $dates = ['tanggal_pengesahan'];
    protected $with = ['kategori'];

    protected $guarded = [
        'id'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function statusDokumen(){
        return $this->belongsTo(StatusDokumen::class);
    }

    public function dokumenTerkait(){
        return $this->belongsToMany(Dokumen::class, 'dokumen_terkait', 
        'id_dokumen_utama', 'id_dokumen_terkait', );
    }

    public function dikaitkanDengan(){
        return $this->belongsToMany(Dokumen::class, 'dokumen_terkait', 
        'id_dokumen_terkait', 'id_dokumen_utama', );
    }

    public function dokumenPengganti(){
        return $this->belongsToMany(Dokumen::class, 'dokumen_pengganti', 
        'id_dok_diganti', 'id_dok_pengganti')
        ->using(DokumenPengganti::class)
        ->withPivot('kode_pergantian');
    }

    public function dokYangDiganti(){
        return $this->belongsToMany(Dokumen::class, 'dokumen_pengganti', 
        'id_dok_pengganti', 'id_dok_diganti')
        ->using(DokumenPengganti::class)
        ->withPivot('kode_pergantian');
    }
}
