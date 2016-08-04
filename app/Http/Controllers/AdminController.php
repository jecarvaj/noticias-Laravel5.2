<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Noticia;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index(){
        $noticias=Noticia::orderBy('id','DESC')->simplePaginate(7);
        return view('admin.index', compact('noticias'));
    }

    public function create(){
        return "prueba admin en create";
    }
}
