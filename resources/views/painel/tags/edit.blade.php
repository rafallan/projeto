@extends('painel.templates.template')

@section('content-header')
    <section class="content-header">
        <h1>
            Blog
            <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Tags</li>
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

                {!! Form::open(['role' => 'form', 'class' => 'form-horizontal', 'method' => 'PUT', 'route' => ['tags.update', $tag->id], 'files' => true]) !!}

                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('nome', 'Nome *', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('nome', $tag->nome, ['class' => 'form-control', 'placeholder' => 'Nome da Tag']) !!}
                            {!! $errors->first('nome') !!}
                        </div>
                    </div>

                </div><!-- box-body -->

                <div class="box-footer col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Atualizar Tag</button>
                </div><!-- box-footer -->

                {!! Form::close() !!}

            </div><!-- box box-primary -->
        </div><!-- col-md-12 -->
    </div><!-- row -->


@endsection