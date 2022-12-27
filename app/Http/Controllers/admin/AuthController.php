<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\KategoriTrait;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use KategoriTrait;

    public function tambahAdmin()
    {
        return view('admin.tambah');
    }

    // public function storeAdmin(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'kode' => 'required|unique:barang',
    //         'nama' => 'required',
    //     ]);

    //     $data = new Barang();
    //     $data->kode = $request->selectBarang;
    //     $data->nama = $request->namaBarang;
    //     $data->kategori = $request->kategori;
    //     $data->stok = $request->stok;
    //     $data->save();

    //     return redirect()->route('barang.view')->with('info', 'Tambah barang berhasil');
    // }

    public function loginView()
    {   
        $category = $this->jenisDokumen();
        return view('auth.index', compact('category'), [
            "active" => "login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            // $request->session()->regenerate();
            Log::create([
                'aktivitas' => Auth::guard('web')->user()->name . ' telah login! ',
            ]);

            return redirect('admin/dashboard')->with('message', 'Signed in!');
        } else {

            return back()->with('message', 'Login gagal!');
        }

    }

    public function logout()
    {

        Log::create([
            'aktivitas' => Auth::guard('web')->user()->name . ' telah logout! ',
        ]);

        Auth::guard('web')->logout();
        return redirect('auth/login')->with('berhasil', 'Anda telah logout!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
