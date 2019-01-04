<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\ArtigoRequest;
use App\Models\Artigo;
use App\Models\Disciplina;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArtigosController extends Controller
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
            $artigos = Artigo::where('titulo', 'like', '%' . $request->q . '%')
                ->orderBy('titulo', 'ASC')
                ->paginate(3);
        } else {
            $artigos = Artigo::orderBy('titulo', 'ASC')
                ->paginate(3);
        }

        $data = [
            'artigos' => $artigos,
            'paginacao' => $artigos->links(),
        ];

        return view('painel.artigos.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas = Disciplina::orderBy('nome')->get();

        $tags = Tag::orderBy('nome')->get();

        return view('painel.artigos.create', ['disciplinas' => $disciplinas, 'tags' => $tags]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtigoRequest $request)
    {
        $tags = $request->tags;

        $attributes = [
            'disciplina_id' => $request->input('disciplina_id'),
            'user_id' => Auth::user()->id,
            'titulo' => $request->input('titulo'),
            'subtitulo' => $request->input('subtitulo'),
            'conteudo' => $request->input('conteudo'),
        ];

        $cadastrado = Artigo::create($attributes);

        if ($cadastrado) {

            if ($tags) {
                $cadastrado->tags()->sync($tags);
            }

            return redirect(route('artigos.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
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
        $artigo = Artigo::find($id);

        $data = [
            'artigo' => $artigo,
        ];

        return view('painel.artigos.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $artigo = Artigo::find($id);

        if ((Auth::user()->id != $artigo->id_user) and (Auth::user()->nivel != 'Administrador')) {
            return redirect(route('artigos.index'))
                ->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i>
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Você não tem permissão para realizar essa operação!</div>');
        }

        $disciplinas = Disciplina::orderBy('nome', 'ASC')->get();

        $tags = Tag::all();

        $data = [
            'disciplinas' => $disciplinas,
            'tags' => $tags,
            'artigo' => $artigo,
        ];

        return view('painel.artigos.edit')->with($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtigoRequest $request, Artigo $artigo)
    {

        $artigo = Artigo::find($artigo->id);

        $tags = $request->tags;

        $attributes = [
            'disciplina_id' => $request->input('disciplina_id'),
            'user_id' => Auth::user()->id,
            'titulo' => $request->input('titulo'),
            'subtitulo' => $request->input('subtitulo'),
            'conteudo' => $request->input('conteudo')
        ];

        $atualizado = Artigo::where('id', $artigo->id)->update($attributes);

        if ($atualizado) {

            if ($tags) {
                $artigo->tags()->sync($tags);
            } else {
                $artigo->tags()->detach();
            }

            return redirect(route('artigos.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
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
        //
    }
}
