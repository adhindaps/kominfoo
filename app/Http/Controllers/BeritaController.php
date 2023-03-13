<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function beritaindex()
    {
        $data=Berita::all();
        return view('data.berita',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function beritacreate()
    {
        return view('data.beritacreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function beritastore(Request $request)
    {
        if($request->hasFile('foto')){
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
        $data = Berita::create([
            'foto' => $request->file('foto')->getClientOriginalName(),
            'namaberita'=> $request->namaberita,
            'catatan' => $request->catatan,
        ]);
        $data->foto = $request->file('foto')->getClientOriginalName();
    }
        return redirect()->route('beritaindex')->with('success', 'Data Berhasil Di Tambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function beritaedit($id)
    {
        $data = Berita::find($id);
        $data = Berita::findOrfail($id);
        return view('data.beritaedit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function beritaupdate($id,Request $request)
    {
        $data = DB::table('beritas')->where('id',$id);
        if($request->hasFile('foto')){
            $pindah = $request->file('foto')->move(public_path().'\storage', $request->file('foto')->getClientOriginalName());
            $data = Berita::find($id)->update([
                'foto' => $request->file('foto')->getClientOriginalName(),
               'namaberita' => $request->namaberita,
               'catatan'=> $request->catatan,
            ]);
        return redirect('beritaindex')->with('sukses','Updatedata!');
    }else{
        $data->update([
            'namaberita' => $request->namaberita,
            'catatan'=> $request->catatan,
        ]);
        return redirect('beritaindex')->with('sukses','Updatedata!');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function beritahapus($id)
    {
        $data = Berita::find($id);
        $data->delete();
        return redirect('/beritaindex')->with('sukses', 'Data Berhasil Dihapus');
    }
}
