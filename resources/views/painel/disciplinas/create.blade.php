@extends('painel.templates.template')

@section('content-header')
    <section class="content-header">
        <h1>
            Blog
            <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Disciplinas</li>
        </ol>
    </section>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h5 class='pull-right text-danger'>Os campos com * são obrigatórios.</h5>
                    <br>
                    <br>
                    @if(Session('mensagem'))
                        {!! Session('mensagem') !!}
                    @endif
                </div><!-- box-header -->

                {!! Form::open(['role' => 'form', 'class' => 'form-horizontal', 'method' => 'POST', 'route' => 'disciplinas.store', 'files' => true]) !!}

                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('curso_id', 'Curso *', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-6">
                            <select name="curso_id" id="curso_id" class="form-control select">
                                <option value="">Selecione o Curso</option>
                                @foreach($cursos as $curso)
                                    @if(old('curso_id') == $curso->id )
                                        <option selected value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                    @else
                                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {!! $errors->first('curso_id') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('nome', 'Disciplina *', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome da disciplina']) !!}
                            {!! $errors->first('nome') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('descricao', 'Descrição *', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-6">
                            {!! Form::textarea('descricao', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Nome da disciplina']) !!}
                            {!! $errors->first('descricao') !!}
                        </div>
                    </div>

                </div><!-- box-body -->

                <div class="box-footer col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Cadastrar Disciplina</button>
                </div><!-- box-footer -->

                {!! Form::close() !!}

            </div><!-- box box-primary -->
        </div><!-- col-md-12 -->
    </div><!-- row -->


@endsection