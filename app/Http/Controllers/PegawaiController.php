<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Jabatan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $pegawai = Pegawai::leftJoin('jabatan', 
            'jabatan.id_jabatan', '=', 'pegawai.id_jabatan')->get();

        return response()->json($pegawai);
    }

    public function create()
    {
        $jabatan = Jabatan::all();
        return response()->json($jabatan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = new Pegawai;
        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namafile = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $namafile);
        }
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->id_jabatan = $request->id_jabatan;
        $pegawai->keterangan = $request->keterangan;
        $pegawai->foto = $namafile;
        $pegawai->save();

        return response()->json($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        $jabatan = Jabatan::all();

        return response()->json(compact('jabatan', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        $ubahfile = false;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namafile = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $namafile);
            $ubahfile = true;
        }
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->id_jabatan = $request->id_jabatan;
        $pegawai->keterangan = $request->keterangan;
        if ($ubahfile) {
            if ($pegawai->foto != null) {
                if (file_exists(public_path() . '/images/' . $pegawai->foto)) {
                    unlink(public_path() . '/images/' . $pegawai->foto);
                }
            }
            $pegawai->foto = $namafile;
        }
        $pegawai->update();

        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        if ($pegawai->foto != null) {
            if (file_exists(public_path() . '/images/' . $pegawai->foto)) {
                unlink(public_path() . '/images/' . $pegawai->foto);
            }
        }
        $pegawai->delete();

        return response()->json($pegawai);
    }
}
