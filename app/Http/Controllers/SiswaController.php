<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswas.index',compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required|string',
            'kelas'=>'required|string',
            'jenis_kelamin'=>'required|in:laki_laki,perempuan',
            'alamat'=>'required|string',
        ]);
        Siswa::create($request->all());

        return redirect()->route('siswas.index')->with('success','berhasil tambah data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('siswas.edit',compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama'=>'required|string',
            'kelas'=>'required|string',
            'jenis_kelamin'=>'required|in:laki_laki,perempuan',
            'alamat'=>'required|string',
        ]);
        $siswa->update($request->all());
        return redirect()->route('siswas.index')->with('success','berhasil update data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswas.index')->with('success','berhasil hapus data!');
    }
}