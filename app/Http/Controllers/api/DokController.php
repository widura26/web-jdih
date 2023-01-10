<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;

class DokController extends Controller
{
    public function index(){
        
        // $category = $this->jenisDokumen();
        $dokumen = Dokumen::all();
        return response()->json([
            'data' => $dokumen
        ], 200);
    }
}
