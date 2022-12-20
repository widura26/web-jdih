<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusDokumen extends Model
{
    use HasFactory;

    protected $table = 'status_dokumen';
    protected $fillable = ['status'];
    
    public function dokumen(){
        return $this->hasMany(Dokumen::class);
    }


}
