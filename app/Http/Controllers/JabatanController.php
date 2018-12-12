<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
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
        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = $request['nama_jabatan'];
        $jabatan->save();

        return response()->json($jabatan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan = Jabatan::find($id);

        return response()->json($jabatan);
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
        $jabatan = Jabatan::find($id);
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->update();

        return response()->json($jabatan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();

        return response()->json($jabatan);
    }
}
