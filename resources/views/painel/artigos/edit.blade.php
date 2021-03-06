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
                    <h5 class='pull-right text-danger'>Os campos com * são obrigatórios.</h5>
                </div><!-- box-header -->

                {!! Form::open(['role' => 'form', 'method' => 'PUT', 'route' => ['artigos.update', $artigo->id] ]) !!}

                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('titulo', 'Título *') !!}
                        {!! Form::text('titulo', $artigo->titulo, ['class' => 'form-control', 'placeholder' => 'Título do Post']) !!}
                        {!! $errors->first('titulo') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('subtitulo', 'Subtítulo') !!}
                        {!! Form::text('subtitulo', $artigo->subtitulo, ['class' => 'form-control', 'placeholder' => 'Subtítulo do Post']) !!}
                        {!! $errors->first('subtitulo') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('conteudo', 'Conteúdo *') !!}
                        {!! Form::textarea('conteudo', $artigo->conteudo, ['class' => 'form-control ckeditor', 'placeholder' => 'Conteúdo']) !!}
                        {!! $errors->first('conteudo') !!}
                    </div>

                    <div class="form-group">
                        <label for="disciplina_id">Disciplina *</label>
                        <select name="disciplina_id" id="disciplina_id" class="form-control">
                            <option value="">Selecione</option>
                            @foreach($disciplinas as $disciplina)
                                @if($disciplina->id == $artigo->disciplina_id)
                                    <option value="{{ $disciplina->id }}" selected>{{ $disciplina->nome }}</option>
                                @else
                                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                @endif
                            @endforeach
                        </select>
                        {!! $errors->first('disciplina_id') !!}
                    </div>

                    <div class="form-group">
                        <label for="tagLabel">Tags</label>
                        <select name="tags[]" class="js-example-basic-multiple form-control" id="tagLabel" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                        @if($artigo->tags->contains($tag->id)) selected @endif>{{ $tag->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                </div><!-- box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Atualizar Artigo</button>
                </div><!-- box-footer -->
                {!! Form::close() !!}
            </div><!-- box -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->


@endsection

@section('js')

    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                tokenSeparators: [',', ''],
                allowClear: true,
                theme: "classic",
            });
        });

    </script>

@endsection
