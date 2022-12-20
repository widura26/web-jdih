<?php
namespace App\Http\Traits;
use App\Models\Kategori;
trait KategoriTrait {
  
    public function jenisDokumen() {
        // Fetch all the students from the 'student' table.
        $kategori = Kategori::all();
        return $kategori;
    }
}