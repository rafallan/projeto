<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $q = $request->q;

        if (isset($q)){
            $cursos = Curso::where('nome', 'like', '%'. $request->q . '%')
                ->orderBy('nome', 'ASC')
                ->paginate(3);
        }else{
            $cursos = Curso::orderBy('nome', 'ASC')
                ->paginate(3);
        }

        $data = [
            'cursos' => $cursos,
            'paginacao' => $cursos->links(),
        ];

        return view('painel.cursos.index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {

        $cadastrado = Curso::create($request->all());

        if ($cadastrado) {
            return redirect(route('cursos.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro realizado com Sucesso!</div>');
        } else {
            return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao cadastrar!</div>');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);

        return view('painel.cursos.edit', ['curso' => $curso]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, Curso $curso)
    {

       // dd($curso->id);

        $attributes = [
            'nome' => $request->input('nome'),
        ];

        $atualizado = Curso::where('id', $curso->id)->update($attributes);

        if ($atualizado) {
            return redirect(route('cursos.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro atualizado com Sucesso!</div>');
        } else {
            return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao cadastrar!</div>');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $curso = Curso::find($id);

        $excluido = $curso->delete();

        if ($excluido) {
            return redirect(route('cursos.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro excluído com Sucesso!</div>');
        } else {
            return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao excluir!</div>');
        }

    }
}
