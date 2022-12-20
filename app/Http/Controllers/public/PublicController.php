<?php

namespace App\Http\Controllers\public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Http\Traits\KategoriTrait;
use App\Http\Traits\StatusDokumenTrait;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    use KategoriTrait;
    use StatusDokumenTrait;

    public function dashboard(){
        
        $category = $this->jenisDokumen();
        $dokumen = Dokumen::all();
        return view('public.dashboard', compact('dokumen', 'category'), ["title" => "Dasboard"]);
    }

    public function detailDokumen($id, Dokumen $judul)
    {   

        $category = $this->jenisDokumen();
        $document = Dokumen::find($id);
        
        return view('public.detailDokumen', compact('document'), [
            
            "title" => $document->judul,
            "category" => $category,
            "dokumenTerkait" => $document->dokumenTerkait,
            "dikaitkanDengan" => $document->dikaitkanDengan,
            "dokumenPengganti" => $document->dokumenPengganti,
            "dokYangDiganti" => $document->dokYangDiganti,
            "status" => $document->statusDokumen->status,
        ]);
    }

    public function dokBasedKategori(Kategori $kategori){

        return view('public.dokBasedKategori', [
            "title" => "Kategori | $kategori->jenis", 
            "dokumenAll" => $kategori->dokumen->load('kategori')
        ]);
    }
}
