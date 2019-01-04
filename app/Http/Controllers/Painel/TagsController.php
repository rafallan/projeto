<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
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
            $tags = Tag::where('nome', 'like', '%' . $request->q . '%')
                ->orderBy('nome', 'ASC')
                ->paginate(3);
        } else {
            $tags = Tag::orderBy('nome', 'ASC')
                ->paginate(3);
        }

        $data = [
            'tags' => $tags,
            'paginacao' => $tags->links(),
        ];

        return view('painel.tags.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {

        $attributes = [
            'nome' => $request->input('nome'),
        ];

        $cadastrado = Tag::create($attributes);

        if ($cadastrado) {
            return redirect(route('tags.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
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
        $tag = Tag::find($id);

        return view('painel.tags.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        // dd($curso->id);

        $attributes = [
            'nome' => $request->input('nome'),
        ];

        $atualizado = Tag::where('id', $tag->id)->update($attributes);

        if ($atualizado) {
            return redirect(route('tags.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
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
