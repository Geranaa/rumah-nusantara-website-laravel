<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use Illuminate\Http\Request;

class GuessController extends Controller
{
    public function index(){
        // $rumah = Rumah::all();
        $rumahs = Rumah::paginate(8);
        return view('index', compact('rumahs'));
    }
    public function kontak(){
        return view('kontak');
    }
    public function berita(){
        return view('berita');
    }
    public function berita_1(){
        return view('berita.berita_1');
    }
    public function rumah_detail($id){
        $rumah = Rumah::find($id);
        // $propertiSejenis = Rumah::where('nama', $rumah->deskripsi)->where('id', '!=', $id)->take(3)->get();
        $propertiSejenis = Rumah::where('id', '!=', $id)->inRandomOrder()->take(3)->get();
        return view('rumah.rumah_detail', compact('rumah', 'propertiSejenis'));
    }

}
