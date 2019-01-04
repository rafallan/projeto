@extends('painel.templates.template')

@section('content-header')
    <section class="content-header">
        <h1>
            Blog
            <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Cursos</li>
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

                {!! Form::open(['role' => 'form', 'class' => 'form-horizontal', 'method' => 'POST', 'route' => 'cursos.store', 'files' => true]) !!}

                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('nome', 'Nome *', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome do curso']) !!}
                            {!! $errors->first('nome') !!}
                        </div>
                    </div>

                </div><!-- box-body -->

                <div class="box-footer col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Cadastrar Curso</button>
                </div><!-- box-footer -->

                {!! Form::close() !!}

            </div><!-- box box-primary -->
        </div><!-- col-md-12 -->
    </div><!-- row -->


@endsection