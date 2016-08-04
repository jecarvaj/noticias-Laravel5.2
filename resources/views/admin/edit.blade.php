@extends('layouts.app')
<script type="text/javascript">
    function habilitar() {
        $('#newCategory').show();
        $('#categoriaExistente').hide();


    }
    function deshabilitar() {
        $('#newCategory').hide();
        $('#categoriaExistente').show();
    }

    function negrita(){

    }
</script>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-success">

                    <div class="panel-heading">Listado de noticias</div>
                    <div class="panel-body"></div>


                    {!! Form::open(['route'=>['admin.create.update', $noticia],'method'=>'PUT','files'=>true]) !!}
                    <div class="form-group">
                        {!!Form::label('titulo','Título')  !!}
                        {!! Form::text('titulo', $noticia->titulo, ['class'=>'form-control', 'placeholder'=>'Título de la noticia', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!!Form::label('cuerpo','Contenido')  !!}<br>
                        {{'Negrita'}}
                        {!! Form::textarea('cuerpo', $noticia->cuerpo, ['class'=>'ckeditor','id'=>'cuerpo', 'placeholder'=>'Contenido de la noticia','contentEditable'=>'true', 'required']) !!}
                    </div>

                    {!!Form::label('categoria','Categoria')  !!}
                    <div class="form-inline">
                        <div class="form-group">

                            <div class="radio">
                                {!!  Form::radio('opcion', 'existente', true, ['onClick'=>'deshabilitar()']) !!} Categoría existente<br>
                                {!! Form::radio('opcion', 'nueva', false,['onClick'=>'habilitar()']) !!} Nueva categoría <br>
                            </div>

                            <div id="categoriaExistente">
                                {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control']) !!}
                            </div>

                            <div id="newCategory" style="display:none">
                                {!! Form::text('categoria_nueva', null, ['class'=>'form-control', 'placeholder'=>'Nueva categoría']) !!}
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        {!!Form::label('imagen','Imagen')  !!}
                        {!! Form::file('imagen',null,['class'=>'form-control'] )!!}
                    </div>






                    <div class="form-group">
                        {!! Form::hidden('user_id', Auth::user()->id) !!}
                    </div>


                    {{ Form::submit('Actualizar!', ['class'=>'btn btn-success'])}}



                </div>
            </div>
        </div>
    </div>

@endsection

