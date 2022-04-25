<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PegawaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = pegawai::with('jabatanfungsi')->paginate(5);
        return view('pegawais.index', compact('pegawais')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jab = Jabatan::all();
        return view('pegawais.create', compact('jab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required', 
            'jabatan_id' => 'required', 
            'umur' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            
        ]);
        pegawai::create($data);
        return redirect()->route('pegawais.index')
            ->with('success', 'Pegawai Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(pegawai $pegawai)
    {
        $jab = Jabatan::all();
        $pegawais = pegawai::with('jabatanfungsi');
        return view('pegawais.edit', compact('pegawai', 'jab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required', 
            'jabatan_id' => 'required', 
            'umur' => 'required',
            'jk' => 'required',
            'alamat'=> 'required',    
        ]);
        $pegawai->update($request->all());
        return redirect()->route('pegawais.index')
            ->with('success', 'Update sukses.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawais.index')
        ->with('success', 'Delete Sukses.');
    }
}
