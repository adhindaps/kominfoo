<?php

namespace App\Http\Controllers;

use App\Models\pengumumen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pengumumen::all();
        return view('data.pengumuman',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data.pengumumancreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pengumumanstore(Request $request)

        {
            if($request->hasFile('foto')){
                $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $data = pengumumen::create([
                'foto' => $request->file('foto')->getClientOriginalName(),
                'namakegiatan' => $request->namakegiatan,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
            $data->foto = $request->file('foto')->getClientOriginalName();
        }
            return redirect()->route('pengumumanindex')->with('success', 'Data Berhasil Di Tambahkan');
        }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function pengumumanedit($id)
    {
        $data = pengumumen::find($id);
        // $data = pengumumen::findOrfail($id);
        return view('data.pengumumanedit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function pengumumanupdate(Request $request, $id)
    {
        $data = pengumumen::where('id',$id);
        if($request->hasFile('foto')){
            $pindah = $request->file('foto')->move(public_path().'\storage', $request->file('foto')->getClientOriginalName());
            $data = pengumumen::find($id)->update([
               'foto' => $request->file('foto')->getClientOriginalName(),
               'namakegiatan' => $request->namakegiatan,
               'judul' => $request->judul,
               'deskripsi' => $request->deskripsi,
            ]);
        return redirect('pengumumanindex')->with('success','Updatedata!');
    }else{
        $data->update([
            'namakegiatan' => $request->namakegiatan,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('pengumumanindex')->with('success','Updatedata!');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletepengumuman($id)
    {
        $data = pengumumen::find($id);
        $data->delete();
        return redirect()->route('pengumumanindex')->with('success', 'Data Berhasil Dihapus');

    }
}
