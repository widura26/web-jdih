<?php

namespace App\Http\Controllers\public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Http\Traits\KategoriTrait;
use App\Http\Traits\StatusDokumenTrait;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\PDF;

class PublicController extends Controller
{
    use KategoriTrait;
    use StatusDokumenTrait;

    public function public(){
        $category = $this->jenisDokumen();
        return view('template.public', [
            "active" => "home",
            "category" => $category
        ]);
    }

    public function viewFile($id, $dokumen){
        $document = Dokumen::find($id);
        return view('public.review', compact('document'));
    }


    public function dashboard(){
        
        $category = $this->jenisDokumen();
        $dokumen = Dokumen::latest()->limit(6)->get();
        return view('public.dashboard_new', compact('dokumen', 'category'), [
            "title" => "Dasboard",
            "active" => "home"
        ]);
    }

    public function semuaDokumen(){
        // dd(request('search'));q
        $category = $this->jenisDokumen();
        
        return view('public.semuaDokumen', compact('category'), [
            "title" => "Semua Dokumen",
            "active" => "home",
            "dokumen" => Dokumen::latest()->filter(request(['search', 'kategori']))->paginate(9)
        ] );
    }

    public function detailDokumen($id, Dokumen $judul)
    {   

        $category = $this->jenisDokumen();
        $document = Dokumen::find($id);
        $dokumen = DB::table('dokumen')->where('id', '!=', $id)->get();
        // $download = Storage::download($dokumen);
        return view('public.detail', compact('document'), [
            
            "title" => $document->judul,
            "category" => $category,
            "dokumenTerkait" => $document->dokumenTerkait,
            "dikaitkanDengan" => $document->dikaitkanDengan,
            "dokumenPengganti" => $document->dokumenPengganti,
            "dokYangDiganti" => $document->dokYangDiganti,
            "status" => $document->statusDokumen->status,
            "active" => "home",
            "dokumen" => $dokumen
        ]);
    }

    public function dokBasedKategori(Kategori $kategori){

        return view('public.dokBasedKategori', [
            "title" => "Kategori | $kategori->singkatan", 
            "dokumenAll" => $kategori->dokumen->load('kategori'),
            "active" => "kategori"
        ]);
    }

    public function contactView(){

        return view('public.contact', [
            "title" => "contact",
            "active" => "contact",
        ]);
    }

    public function download($id){
        $file = DB::table('dokumen')->where('id', $id)->first();
        $filepath = public_path("storage/{$file->dokumen}");
        return Response::download($filepath);

    }
}
