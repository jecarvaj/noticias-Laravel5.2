<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Noticia;
use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Requests;

class NoticiasController extends Controller
{

    public function index(){

        $categorias=Categoria::lists('nombre', 'id');
        return view('admin.create',compact('categorias') );
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){

        $noticia=new Noticia($request->all());

        if($request->opcion=="nueva"){

            $cat_nueva=$request->categoria_nueva;
            $categoria=new Categoria();
            $categoria->nombre=$cat_nueva;
            $categoria->save();

            $catbd=Categoria::where('nombre', $cat_nueva)->value('id');;
            $noticia->categoria_id=$catbd;


        }
        $file=$request->file('imagen');
        $nombre=$file->getClientOriginalName();
        $noticia->imagen='/images/'.$nombre;
        \Storage::disk('local')->put($nombre,  \File::get($file));
        $noticia->save();

        return redirect('admin')->with('status', 'Noticia publicada!!');


    }

    public function edit($id){
        $noticia=Noticia::find($id);
        $categorias=Categoria::lists('nombre', 'id');
         return view('admin.edit',compact('noticia', 'categorias'));

    }

    public function update(Request $request, $id){
        $noticia=Noticia::find($id);
        $noticia->fill($request->all());

        if($request->imagen!=null){
            $file=$request->file('imagen');
            $nombre=$file->getClientOriginalName();
            $noticia->imagen='/images/'.$nombre;
            \Storage::disk('local')->put($nombre,  \File::get($file));
        }
        if($request->opcion=="nueva"){

            $cat_nueva=$request->categoria_nueva;
            $categoria=new Categoria();
            $categoria->nombre=$cat_nueva;
            $categoria->save();

            $catbd=Categoria::where('nombre', $cat_nueva)->value('id');;
            $noticia->categoria_id=$catbd;
        }

        $noticia->save();
        return redirect('admin')->with('status', 'Noticia actualizada!!');
    }

    public function destroy($id){
        $noticia=Noticia::find($id);
        $noticia->delete();
        return redirect('admin')->with('status', 'Noticia eliminada!!');

    }


}
