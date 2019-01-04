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
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Artigos ({{ $artigos->total() }})
                        <a href="{{ route('artigos.create') }}" class="pull-right"><span
                                    class="fa fa-plus-circle"></span></a>
                    </h3>

                    <div>

                        <form class="form-inline" method="get"
                              action="{{ route('artigos.index')}}">
                            <div class="form-group">
                                {{ Form::text('q',old('q'), ['class' => 'form-control','size' => '50','placeholder' => 'Pesquisar....']) }} {!! $errors->first('q') !!}
                            </div>

                            <button type="submit" class="btn btn-warning"><i class="fa fa-search"
                                                                             aria-hidden="true"></i></button>
                            <a href="{{ route('artigos.index')}}"
                               class="btn btn-primary">Listar Todos</a>
                        </form>

                    </div>
                    <br>

                    @include('painel.includes.mensagem')

                </div><!-- box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>

                                <th class="text-center">Título</th>
                                <th class="text-center">Subtitulo</th>
                                <th class="text-center">Disciplina</th>
                                <th class="text-center">Autor</th>
                                <th class="text-center">Data de Publicação</th>

                                <th class="text-center" colspan="2" width="10%">Ações</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($artigos as $artigo)
                                <tr>
                                    <td class="text-center">{{ $artigo->titulo }}</td>
                                    <td class="text-center">{{ $artigo->subtitulo }}</td>
                                    <td class="text-center">{{ $artigo->disciplina->curso->nome }} / {{ $artigo->disciplina->nome }}</td>

                                    <td class="text-center">{{ $artigo->autor->nome }}</td>

                                    <td class="text-center">{{ date('d/m/Y H:i:s', strtotime($artigo->created_at)) }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('artigos.show', $artigo->id) }}"
                                           class="btn btn-info btn-xs" title="Visualizar"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('artigos.edit',$artigo->id) }}"
                                           class="btn-primary btn btn-xs"
                                           title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                    </td>

                                    <td class="text-center">
                                        {!! Form::open(['method' => 'delete', 'route' => ['artigos.destroy', $artigo->id] ]) !!}

                                        <button type="submit" value="Excluir" class="btn btn-danger btn-xs"
                                                onclick="return confirm('Você deseja excluir o Artigo?')">
                                            <i class="fa fa-fw fa-trash-o"></i></button>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- box-body -->
                <div class="box-footer">
                    <div class="pagination pagination-sm no-margin pull-right">
                        {{ $paginacao }}
                    </div>
                </div><!-- box-footer -->
            </div><!-- box -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->

@endsection
