<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\DisciplinaRequest;
use App\Models\Curso;
use App\Models\Disciplina;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $q = $request->q;

        if (isset($q)) {
            $disciplinas = Disciplina::where('nome', 'like', '%' . $request->q . '%')
                ->orWhere('descricao', 'like', '%' . $request->q . '%')
                ->orderBy('nome', 'ASC')
                ->paginate(3);
        } else {
            $disciplinas = Disciplina::orderBy('nome', 'ASC')
                ->paginate(3);
        }

        $data = [
            'disciplinas' => $disciplinas,
            'paginacao' => $disciplinas->links(),
        ];

        return view('painel.disciplinas.index')->with($data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cursos = Curso::orderBy('nome')->get();

        return view('painel.disciplinas.create', ['cursos' => $cursos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaRequest $request)
    {
        $attributes = [
            'curso_id' => $request->input('curso_id'),
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao')
        ];

        $cadastrado = Disciplina::create($attributes);

        if ($cadastrado) {
            return redirect(route('disciplinas.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
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
        $cursos = Curso::orderBy('nome')->get();

        $disciplina = Disciplina::find($id);

        return view('painel.disciplinas.edit', ['cursos' => $cursos, 'disciplina' => $disciplina]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplinaRequest $request, Disciplina $disciplina)
    {

        $attributes = [
            'curso_id' => $request->input('curso_id'),
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao')
        ];

        $atualizado = Disciplina::where('id', $disciplina->id)->update($attributes);

        if ($atualizado) {
            return redirect(route('disciplinas.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
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

        $disciplina = Disciplina::findOrFail($id);

        $excluido = $disciplina->delete();

        if ($excluido) {
            return redirect(route('disciplinas.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro excluído com Sucesso!</div>');
        } else {
            return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao excluir!</div>');
        }

    }
}
