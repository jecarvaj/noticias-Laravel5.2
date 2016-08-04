@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@section('content')
    <style>
        .someclass{
            border:5px solid yellow;
        }
        span{
            font-size: 20px
        }
    </style>
    <script type="text/javascript">
        function habilitar() {
            $('#newCategory').show();
            $('#categoriaExistente').hide();


        }
        function deshabilitar() {
            $('#newCategory').hide();
            $('#categoriaExistente').show();
        }

      /*  function getSelectionText() {
            var text = "";
            if (window.getSelection) {
                text = window.getSelection().toString();
            } else if (document.selection && document.selection.type != "Control") {
                text = document.selection.createRange().text;
            }
            alert(text);

        }

        $(document).ready(function() {
            $('#jBold').click(function() {
                document.execCommand('bold');
            });
        });

        $(function(){
            $('button.bolder').on("click",function(){
                document.execCommand('bold',false,true);
            })
        });

        $('#boton').click(function(){
            document.getElementById('#selectedtext').contentWindow.document.execCommand('bold', false, null);
        });
       */
    </script>




    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-success">


            <div class="panel-heading">Listado de noticias</div>
            <div class="panel-body"></div>


            {!! Form::open(['route'=>'admin.create.store','method'=>'POST','files'=>true]) !!}
            <div class="form-group">
                {!!Form::label('titulo','Título')  !!}
                {!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Título de la noticia', 'required']) !!}
            </div>

            <div class="form-group">
                {!!Form::label('cuerpo','Contenido')  !!}<br>
                {!! Form::textarea('cuerpo', null, ['class'=>'ckeditor','id'=>'cuerpo', 'placeholder'=>'Contenido de la noticia','contentEditable'=>'true', 'required']) !!}
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


            {{ Form::submit('Publicar!', ['class'=>'btn btn-success'])}}



                     </div>
                </div>
        </div>
    </div>

@endsection

