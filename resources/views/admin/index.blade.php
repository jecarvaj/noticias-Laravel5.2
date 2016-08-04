@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-success">

                    <div class="panel-heading">Listado de noticias</div>
                    <div class="panel-body"></div>

                    <div class=" table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>Titulo</th>
                                <th>Contenido</th>
                                <th>Fecha</th>
                                <th>Autor</th>
                                <th>Acciones</th>
                            </thead>

                            <tbody>
                                <tr>
                                    @foreach($noticias as $noticia)
                                    <td>{{$noticia->titulo}}</td>
                                    <td>
                                       <?php

                                       $variable =$noticia->cuerpo;

                                        echo substr($variable, 0, 150);
                                        if (strlen($variable)>150){echo "...";}   ?>
                                    </td>
                                    <td>{{$noticia->created_at->format('d-m-Y')}}</td>
                                        <td>{{$noticia->user->nombre}}</td>
                                        <td><a class="btn btn-primary" href="{{route('admin.create.edit',$noticia->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a class="btn btn-danger" href="{{route('admin.create.destroy',$noticia->id)}}" role="button" onclick="return confirm('Estás seguro?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">{{$noticias->links()}}</div>



                </div>
            </div>
        </div>
    </div>

@endsection