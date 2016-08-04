<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontController extends Controller
{
    public function index(){
        $noticias=Noticia::orderBy('created_at','DESC')->paginate(7);
        return view('index',compact('noticias'));
    }

    public function show($id){
        $noticia=Noticia::find($id);
        return view('ver', compact('noticia'));
    }
}
