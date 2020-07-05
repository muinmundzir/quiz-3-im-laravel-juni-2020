<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtikelModel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = ArtikelModel::get_artikel();
        return view('articles', with(['articles' => $articles]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->judul);
        $this->validate(request(), [
            'judul' => 'required',
            'isi' => 'required',
            'tag' => 'required',
        ]);
        $artikel = ArtikelModel::save_artikel($request);

        return redirect('/artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = ArtikelModel::show_artikel($id);
        return view('show', with(['article' => $article]));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = ArtikelModel::edit_artikel($id);
        return view('edit', with(['article' => $article]));
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
        $articles = ArtikelModel::update_artikel($request, $id);
        return redirect('artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = ArtikelModel::delete_artikel($id);
        return redirect('artikel');
    }
}
