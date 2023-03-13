<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=About::where('id','=',1)->firstOrFail();
        return view('about.aboutindex',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.aboutcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('foto')){
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
        $data = About::create([
            'foto' => $request->file('foto')->getClientOriginalName(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        $data->foto = $request->file('foto')->getClientOriginalName();
    }
        return redirect()->route('aboutindex')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function aboutupdate(Request $request)
    {
        $data=About::find($request->id);
        $data->update($request->all());
        return redirect('aboutindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
