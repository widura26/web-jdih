<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Log;
use App\Models\Kategori;
use App\Models\Dokumen;
use App\Models\StatusPergantian;
use App\Models\DokumenTerkait;
use App\Models\DokumenPengganti;
use App\Http\Traits\KategoriTrait;
use App\Http\Traits\StatusDokumenTrait;
use GuzzleHttp\Promise\Create;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use KategoriTrait;
    use StatusDokumenTrait;

    public function dashboardView()
    {
        $category = $this->JenisDokumen();
        return view('admin/dashboard', [
            'title' => 'Dasboard',
            'category' => $category
        ]);
    }

    public function daftarDokumen() {
        $dokumen = Dokumen::latest()->get();
        return view('admin.dokumen.view_document', [
            'title' => 'Semua Dokumen',
            'dokumen' => $dokumen
        ]);
    }

    public function detailDokumen($id, Dokumen $judul)
    {   

        $category = $this->jenisDokumen();
        $dokumen = $this->allDokumen();
        $document = Dokumen::find($id);
        return view('admin.detail_dokumen', compact('document'), [
            
            "title" => $document->judul,
            "category" => $category,
            "dokumenTerkait" => $document->dokumenTerkait,
            "dikaitkanDengan" => $document->dikaitkanDengan,
            "dokumenPengganti" => $document->dokumenPengganti,
            "dokYangDiganti" => $document->dokYangDiganti,
            "status" => $document->statusDokumen->status,
        ]);
    }

    public function tambahDokumen() {
        
        $category = $this->JenisDokumen();
        $statusDokumen = $this->jenisStatus();
        return view('admin.dokumen.add_document', [
            'title' => 'Tambah Dokumen',
            'category' => $category,
            'statusDokumen' => $statusDokumen,
        ]);
    }

    public function tambahDokumenProses(Request $request){
        $validatedData = $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            // 'dokumen_id' => 'required',
            'nomor' => 'required',
            'dokumen' => ['nullable','file', 'mimes:pdf'],
            'tanggal_pengesahan' => 'required',
            'status_dokumen_id' => 'required'
        ]);
        if($request->file('dokumen')){
            $validatedData['dokumen'] = $request->file('dokumen')->store('post-dokumen');
        }
        Dokumen::create($validatedData);
        return redirect()->route('admin.semuaDokumen')->with('info', 'Tambah dokumen berhasil');
        // $data = new Dokumen();
        // $data->judul = $request->judul;
        // $data->kategori_id = $request->kategori_id;
        // $data->nomor = $request->nomor;
        // $data->dokumen = $request->file('dokumen')->store('post-dokumen');
        // $data->status_dokumen_id = $request->status_dokumen_id;
        // $data->tanggal_pengesahan = $request->tanggal_pengesahan;
        // $data->save();
    }

    public function ubahDokumen($id)
    {   
        $document = Dokumen::find($id);
        $category = $this->jenisDokumen();
        $statusDokumen = $this->jenisStatus();

        return view('admin.dokumen.edit_document_view', [
            'title' => 'edit | ' . $document->judul,
            'category' => $category,
            'document' => $document,
            'statusDokumen' => $statusDokumen
        ]);
    }

    public function ubahDokumenProses(Request $request, $id){   
        $data = [
            'judul' => 'required',
            'kategori_id' => 'required',
            'nomor' => 'required',
            'dokumen' => ['nullable','file', 'mimes:pdf'],
            'tanggal_pengesahan' => 'required',
            'status_dokumen_id' => 'required'
        ];
        $validatedData = $request->validate($data);

        if($request->file('dokumen')){
            if($request->oldDokumen){
                Storage::delete($request->oldDokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('post-dokumen');
        }
        DB::table('dokumen')->where('id', $id)->update($validatedData);
        return redirect()->route('admin.semuaDokumen')->with('success', 'update berhasil'); 
    }

    public function hapusDokumen($id){
        //dd('berhasil masuk controller user edit');
        $delete = Dokumen::find($id);
        $delete->delete();

        return redirect()->route('admin.semuaDokumen');
    }

    function dokumenTerkait(Request $request, $idDokumen){

        $dokumenUtama = Dokumen::find($idDokumen);
        $judul = $dokumenUtama->judul;

        $data = [
            "idDokumen" => $idDokumen
        ];

        $keyword   = $request->input('search');

        if (!empty($keyword)) {
            // TODO: Dokumen yang sudah diatur sebagai dokumen terkait dengan dokumen utama harus di-exclude-kan juga dari hasil pencarian
            $pilihanDokumenTerkait = Dokumen::where('judul', 'like', "%{$keyword}%")
            ->where('id', '!=', $idDokumen)
            ->orderBy('tanggal_pengesahan')
            ->get();

            $data["kataKunci"]      = $keyword;
            $data["pilihanDokumen"] = $pilihanDokumenTerkait;
        }

        return view('admin.dokumen.dokumenTerkait', $data, ["title" => $judul]);
        
    }

    function dokumenTerkaitProses(Request $request, $idDokumen){
        $data = [];
        foreach ($request->input('dokumen_terkait') as $idDokumenTerkait) {
            $data[] = ['id_dokumen_utama' => $idDokumen, 'id_dokumen_terkait' 
            => $idDokumenTerkait];
        }
        DokumenTerkait::upsert($data, ['id_dokumen_utama', 'id_dokumen_terkait']);
        return redirect()->route('admin.dokumenTerkait', ['id' => $idDokumen]);
    }

    function dokumenPengganti(Request $request, $idDokumen){

        $dokumenUtama = Dokumen::find($idDokumen);
        $judul = $dokumenUtama->judul;
        $statusPengganti = StatusPergantian::all();

        $data = [
            "idDokumen" => $idDokumen,
            "status" => $statusPengganti
        ];

        $keyword   = $request->input('search');

        if (!empty($keyword)) {
            // TODO: Dokumen yang sudah diatur sebagai dokumen terkait dengan dokumen utama harus di-exclude-kan juga dari hasil pencarian
            $pilihanDokumenPengganti = Dokumen::where('judul', 'like', "%{$keyword}%")
            ->where('id', '!=', $idDokumen)
            ->orderBy('tanggal_pengesahan')
            ->get();

            $data["kataKunci"]      = $keyword;
            $data["pilihanDokumen"] = $pilihanDokumenPengganti;
        }

        return view('admin.dokumen.dokumenPengganti', $data, ["title" => $judul]);
        
    }

    function dokumenPenggantiProses(Request $request, $idDokumen){
        
        $data = [];
        $pengganti = new DokumenPengganti();
        $pengganti->kode_pergantian = $request->kode_pergantian;

        foreach ($request->input('dokumen_pengganti') as $idDokumenPengganti) {
            $data[] = ['id_dok_diganti' => $idDokumen, 'id_dok_pengganti' => $idDokumenPengganti, 
            'kode_pergantian' => $pengganti->kode_pergantian];
        }
        DokumenPengganti::upsert($data, ['id_dok_diganti', 'id_dok_pengganti', 'kode_pergantian']);
        return redirect()->route('admin.dokumenPengganti', ['id' => $idDokumen]);
    }

    public function adminView() {

        $data = [
            'users' => User::where('username', '!=', 'superadmin')->get(),
        ];

        
        return view('admin/administrator/view_admin', $data, ["title" => "Admin"]);
    }

    public function viewRegisterAdmin() {

        $data = [
            'roles' => Role::all(),
        ];

        return view('admin/administrator/add_admin', $data, ["title" => "Tambah Admin"]);
    }

    public function registerAdmin(Request $request) {
        $user = User::create([
            'name' => $request->nama,
            'username' => $request->userName,
            'password' => bcrypt($request->userName),
            'alamat' => $request->alamat,
            'no_telp' => $request->noTelp,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('adminView')->with('info', 'Admin berhasil ditambahkan!');

    }

    public function viewEditAdmin($id) {
        $data = [
            'editAdmin' => User::find($id),
            'roles' => Role::all(),
        ];

        return view('admin/administrator/edit_admin', $data);
    }

    public function updateAdmin($id, Request $request) {
        User::where('id', $request->id)->update([
            'name' => $request->nama,
            'username' => $request->userName,
            'alamat' => $request->alamat,
            'no_telp' => $request->noTelp,
        ]);

        $user = User::find($id);

        $user->syncRoles($request->role);

        return redirect()->route('adminView')->with('info', 'Data berhasil diperbaharui!');
    }


    public function deleteAdmin($id)
    {
        $delete = User::find($id);
        $delete->delete();

        return redirect()->route('adminView')->with('info', 'Admin berhasil dihapus!');
    }

    public function viewAktivitas() {

        $data = [
            'logs' => Log::all(),
        ];

        return view('admin.administrator.log_admin', $data,[
            "title" => "Aktivitas Admin"
        ]);
    }

    
}
