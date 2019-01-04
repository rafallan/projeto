@extends('painel.templates.template')

@section('content-header')
    <section class="content-header">
        <h1>
            Blog
            <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Artigos</li>
        </ol>
    </section>

@endsection


@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="text-center">
                        {{ $artigo->titulo }}
                    </h2>
                    @if($artigo->subtitulo)
                        <p class="text-center">
                            {{ $artigo->subtitulo }}
                        </p>
                    @endif
                    <p class="pull-right">
                        @if ($artigo->created_at == $artigo->updated_at)
                            Criado em {{date("d/m/Y", strtotime($artigo->created_at)) }}
                            às {{ date("H:i", strtotime($artigo->created_at)) }} Por: {{ $artigo->autor->nome }}
                        @else
                            Atualizado em {{date("d/m/Y", strtotime($artigo->updated_at)) }}
                            às {{ date("H:i", strtotime($artigo->updated_at)) }} Por: {{ $artigo->autor->nome }}
                        @endif
                    </p>
                </div><!-- box-header -->
                <div class="box-body">
                    <p>
                        {!! $artigo->conteudo !!}
                    </p>

                </div><!-- box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                        @if(count($artigo->tags) > 0)
                            <span class="text-warning">Tags:</span>
                            @foreach($artigo->tags as $tag)
                                <a href="/sipat/painel/artigos/tag/{{ $tag->id }}/{{ str_slug($tag->nome) }}">{{ $tag->nome }}</a>
                                &nbsp;&nbsp;
                            @endforeach

                        @endif
                    </div>
                </div><!-- box-footer -->
            </div><!-- box -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->


@endsection