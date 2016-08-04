@extends('layouts.front')
<style>
    body{
        background: url("{{asset('/theme/img/fondo_bg.png')}}");
    }
    .bg-noticia{
        background: url("{{asset('/theme/img/fondo_noticia.png')}}");
        padding-right: 1%;
        padding-left: 1%;
        padding-top: 2px;

        border-radius: 30px;
        border-bottom: 4px solid #42413C ;


    }
    hr.strong {
        max-width: 10%;
        margin: 15px auto;
        opacity: .3;
        border-width: 2px;
        border-color: #42413C;
    }
</style>
@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{asset($noticia->imagen)}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading " >
                    <div  style="background: url('{{asset('/theme/img/fondo_inicio.png')}}');border-radius: 15px;padding: 1%">
                    <h1>{{$noticia->titulo}}</h1>
                    <span class="meta">Publicado por  <b>{!! $noticia->user->nombre !!}</b> el {!! $noticia->created_at->format('d-m-Y') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
              <p><?php echo $noticia->cuerpo ?></p>
            </div>
        </div>
    </div>
</article>

<hr>

@endsection