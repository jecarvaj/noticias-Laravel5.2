@extends('layouts.front')
<style>
    body{
        background: url("{{asset('/theme/img/fondo_bg.png')}}");
    }
    .bg-noticia{
        background: url("{{asset('/theme/img/fondo_noticia.png')}}");
        padding-right: 2%;
        padding-left: 2%;
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
    <header class="intro-header" style="background-image: url('{{ asset('/theme/img/home-bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>PuroNoticias</h1>
                        <hr class="small">
                        <span class="subheading">Puras noticias</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($noticias as $noticia)
                    <div class="post-preview bg-noticia">
                        <a  href="{{route('ver',$noticia->id)}}">
                            <h2 class="post-title text-center">
                                {!! $noticia->titulo !!}
                                <hr class="strong">
                            </h2>



                            <h3 class="post-subtitle">
                                <div class="row">
                                    <div class="col-md-4">
                                         <img src="{{asset($noticia->imagen)}}" height="200" width="170">
                                    </div>

                                    <div class="col-md-8">
                                        <?php

                                        $variable =$noticia->cuerpo;

                                        echo substr($variable, 0, 250);
                                        if (strlen($variable)>250){echo "<b>...</b>";}   ?>
                                    </div>
                                </div>
                            </h3>

                            <p class="post-meta">Publicado por  <b>{!! $noticia->user->nombre !!}</b> el {!! $noticia->created_at->format('d-m-Y') !!} </p>

                        </a><!-- <a class="btn btn-warning" href="#" role="button">Detalle</a> -->

                    </div>
                    <hr>
                    @endforeach
                            <!-- Pager -->


                    <div class="text-center lead">{{$noticias->links()}}</div>



            </div>
        </div>
    </div>

    <hr>
@endsection