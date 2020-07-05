<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArtikelModel extends Model
{
    public static function get_artikel(){
        $artikel = DB::table('artikel')->get();
        return $artikel;
    }

    public static function save_artikel($data){
        unset($data["_token"]);
        $slug = strtolower($data->judul);
        $slug = str_replace(' ', '-', $slug);
        $artikel = DB::table('artikel')->insert([
            'judul' => $data->judul,
            'isi' => $data->isi,
            'slug' => $slug,
            'tag' => $data->tag
        ]);
        return $artikel;
    }
    
    public static function show_artikel($id){
        $artikel = DB::table('artikel')->where('id', $id)->first();
        return $artikel;
    }
    
    public static function edit_artikel($id){
        $artikel = DB::table('artikel')->where('id', $id)->first();
        return $artikel;
    }

    public static function update_artikel($request, $id){
        unset($request["_token"]);
        $slug = strtolower($request->judul);
        $slug = str_replace(' ', '-', $slug);
        $artikel = DB::table('artikel')->where('id', $id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'slug' => $slug,
            'tag' => $request->tag
        ]);
        return $artikel;
    }

    public static function delete_artikel($id){
        $artikel = DB::table('artikel')->where('id', $id)->delete();
        return $artikel;
    }
}
