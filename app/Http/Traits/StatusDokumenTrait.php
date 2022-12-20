<?php
namespace App\Http\Traits;
use App\Models\StatusDokumen;

trait StatusDokumenTrait {
  
    public function jenisStatus() {
        // Fetch all the students from the 'student' table.
        $status = StatusDokumen::all();
        return $status;
    }
}